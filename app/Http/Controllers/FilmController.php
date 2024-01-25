<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::orderBy('id', 'desc')->paginate(5);
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::select('id', 'nombre')->orderBy('nombre')->get();
        return view('films.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'titulo' => ['required', 'string', 'min:4', 'unique:films,titulo'],
            'descripcion' => ['string', 'min:5'],
            'imagen' => ['nullable', 'image', 'max:2048'],
            'tags' => ['required', 'array', 'min:1', 'exists:tags,id']
        ]);

        $films = Film::create([
            'titulo' => ucfirst($request->titulo),
            'descripcion' => ucfirst($request->descripcion),
            'imagen' => ($request->imagen) ? $request->imagen->store('films') : 'default.jpg'

        ]);

        $films->tags()->attach($request->tags);

        return redirect()->route('films.index')->with('mensaje', 'Película creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.detail', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $filmTag = $film->devolverIdFilmTag();

        $tags = Tag::select('id', 'nombre')->orderBy('nombre')->get();

        return view('films.update', compact('film', 'tags', 'filmTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:4', 'unique:films,titulo,' . $film->id],
            'descripcion' => ['string', 'min:5'],
            'imagen' => ['nullable', 'image', 'max:2048'],
            'tags' => ['required', 'array', 'min:1', 'exists:tags,id']
        ]);

        // Almaceno la imagen actual del film
        $imagen = $film->film;

        // Compruebo si hay una imagen subida
        if ($request->imagen) {
            // Si la imagen es distinta a la de por defecto...
            if (basename($film->imagen) != "default.jpg") {
                Storage::delete($film->imagen); //La elimino
            }

            // Imagen será ahora la nueva imagen subida que se almacenará en films 
            $imagen = $request->imagen->store('films');
        }

        $film->update([
            'titulo' => ucfirst($request->titulo),
            'descripcion' => ucfirst($request->descripcion),
            'imagen' => ($request->imagen) ? $request->imagen->store('films') : 'default.jpg'
        ]);

        $film->tags()->sync($request->tags);

        return redirect()->route('films.index')->with('mensaje', 'Película actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        // Si la foto no es la default, la borramos
        if (basename($film->imagen) != "default.jpg") {
            Storage::delete($film->imagen);
        }
        // Se borra el objeti
        $film->delete();

        return redirect()->route('films.index')->with('mensaje', 'Película eliminada');
    }
}
