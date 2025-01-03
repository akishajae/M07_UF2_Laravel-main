<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
    public static function readFilms()
    {
        // $films = Storage::json('/public/films.json');
        $films = Film::all();
        return $films;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film->year < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas (o filtra x año o categoría.)
     */
    public function listFilms()
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($films))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            $films_filtered[] = $film;

            // if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
            //     $title = "Listado de todas las pelis filtrado x categoria y año";
            //     $films_filtered[] = $film;
            // }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista pelis por año
     * @param mixed $year
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis filtradas por año";
        $films = FilmController::readFilms();

        //if year is null
        if (is_null($year)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        //list based on year informed
        foreach ($films as $film) {
            if ((!is_null($year) && $film['year'] == $year)) {
                $films_filtered[] = $film;
            }
        }

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista pelis por género
     * @param mixed $genre
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis filtradas por género";
        $films = FilmController::readFilms();

        //if genre is null
        if (is_null($genre)) {
            return view('films.list', ["films" => $films, "title" => $title]);
        }

        //list based on genre informed
        foreach ($films as $film) {
            if (!is_null($genre) && $film['genre'] == $genre || strtolower($film['genre']) == strtolower($genre)) {
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Lista pelis ordenadas por año (más nuevo a más antiguo)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sortFilms()
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis ordenadas por año";
        $films = FilmController::readFilms();

        $films_array = $films->toArray();

        usort($films_array, function ($a, $b) {
            return $b['year'] - $a['year'];
        });

        foreach ($films_array as $film) {
            $films_filtered[] = $film;
        }

        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    /**
     * Muestra la cuenta de pelis registradas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function countFilms()
    {
        $count_films = 0;

        $title = "Contador de pelis";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            $count_films++;
        }

        return view("films.counter", ["films" => $films, "countFilms" => $count_films, "title" => $title]);
    }

    public function isFilm(string $filmName)
    {
        return Film::where('name', $filmName)->exists();
    }


    public function createFilm(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'year' => 'required|integer',
            'genre' => 'required',
            'country' => 'required',
            'duration' => 'required|integer'
            // img
        ]);

        // validate if film exists
        if (!($this->isFilm($request->name))) {
            Film::create($request->all());
            // to fix listFilms
            return redirect()->route('listFilms');
        } else {
            // to add error message
            return redirect()->route('welcome')->with('success', 'This film already exists.');
        }
    }
}
