<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Acción' => '#B0E2FF', 
            'Aventura' => '#A2FFB4', 
            'Comedia' => '#FFEBB5', 
            'Drama' => '#FFC0CB'              
          
        ];

        foreach ($tags as $nombre => $color) {
            Tag::create(compact('nombre', 'color'));
        }
    }
}
