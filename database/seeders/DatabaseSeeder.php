<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Film::create([
            'name' => 'La Rosa Púrpura del Cairo',
            'year' => 1985,
            'genre' => 'Drama',
            'country' => 'Estados Unidos',
            'duration' => 85,
            'img_url' => 'https://es.web.img2.acsta.net/medias/nmedia/18/79/45/34/20253823.jpg'
        ]);
        Film::create([
            'name' => 'El Club de los Cinco',
            'year' => 1985,
            'genre' => 'Comedia',
            'country' => 'Estados Unidos',
            'duration' => 100,
            'img_url' => 'https://pics.filmaffinity.com/El_club_de_los_cinco-192309838-large.jpg'
        ]);
        Film::create([
            'name' => 'Forrest Gump',
            'year' => 1994,
            'genre' => 'Drama',
            'country' => 'Estados Unidos',
            'duration' => 142,
            'img_url' => 'https://pics.filmaffinity.com/Forrest_Gump-212765827-large.jpg'
        ]);
        Film::create([
            'name' => 'Arrival',
            'year' => 2016,
            'genre' => 'Ciencia Ficción',
            'country' => 'Estados Unidos',
            'duration' => 116,
            'img_url' => 'https://pics.filmaffinity.com/La_llegada-686966912-large.jpg'
        ]);
        Film::create([
            'name' => 'As Bestas',
            'year' => 2022,
            'genre' => 'Drama',
            'country' => 'España',
            'duration' => 137,
            'img_url' => 'https://pics.filmaffinity.com/As_bestas-275688233-large.jpg'
        ]);
    }
}
