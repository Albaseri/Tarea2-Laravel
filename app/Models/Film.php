<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion', 'imagen'];

    // Relación N:M
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Función para devolver como array los IDs de los tags
    public function devolverIdFilmTag()
    {
        $filmTag = [];

        foreach ($this->tags as $item) {
            $filmTag[] = $item->id;
        }
        return $filmTag;
    }
}
