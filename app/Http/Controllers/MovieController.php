<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Movies;
use App\Models\Producers;
use App\Services\MovieServiceContract;
use App\Utils\QueryBuilderUtils;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MovieController extends Controller
{
    public function __construct(protected MovieServiceContract $movieService)
    {
    }

    public function show() {
        $genres = Genres::all();
        $producers = Producers::all();

        $movies = $this->movieService->search(\request()->query());

        return view('search', ['genres'=> $genres, 'producers' => $producers, 'movies' => $movies]);

    }
}
