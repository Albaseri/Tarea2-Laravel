<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creo 30
        $film = Film::factory(30)->create();
       
        foreach ($film as $item) {
            $item->tags()->attach($this->devolverIdTagRandom());
        }
    }

    // Método que devolverá un número aleatorio de los IDs del tag
    public function devolverIdTagRandom()
    {
        $tags = [];

        $arrayTags = Tag::pluck('id')->toArray();

        $arrayIndices = array_rand($arrayTags, random_int(2, count($arrayTags)));

        foreach ($arrayIndices as $indice) {
            $tags[] = $arrayTags[$indice];
        }
        return $tags;
    }
}
