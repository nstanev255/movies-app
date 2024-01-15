<?php

namespace App\Services\impl;

use App\Models\Genres;
use App\Services\GenresServiceContract;

class GenreService implements GenresServiceContract
{

    function checkIfIdsExist(array $ids) : bool
    {
        if(count($ids) === 0) {
            throw new \Exception("the ids are empty");
        }

        $found_genres_count = Genres::query()->whereIn('id', $ids)->count();

        return $found_genres_count === count($ids);
    }
}
