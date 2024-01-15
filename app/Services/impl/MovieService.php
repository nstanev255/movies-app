<?php

namespace App\Services\impl;

use App\Models\Movies;
use App\Services\GenresServiceContract;
use App\Services\MovieServiceContract;
use App\Services\ProducerServiceContract;
use Illuminate\Database\Eloquent\Builder;
use function Laravel\Prompts\warning;
use function Psy\debug;

class MovieService implements MovieServiceContract
{

    public function __construct(
        protected GenresServiceContract $genresService,
        protected ProducerServiceContract $producerService
    ) {}

    /**
     * Validate query params...
     *
     * @param $query_params
     *   Query params...
     * @return void
     */
    private function validate($query_params) {

        // Validate if all of the given genres exist...
        if(array_key_exists('genres', $query_params) && !is_null($query_params['genres'])) {
            $genres = $query_params['genres'];
            $all_genres_exist = $this->genresService->checkIfIdsExist($genres);
            if(!$all_genres_exist) {
                throw new \Exception("Some of the genres do not exist...");
            }
        }

        // Validate if all of the given producers exist...
        if(array_key_exists('producers', $query_params) && !is_null($query_params['producers'])) {
            $producers = $query_params['producers'];
            if($this->producerService->checkIfAllIdsExist($producers)) {
                throw new \Exception("Some of the producers do not exist..");
            }

        }

        // Validate if the year is in correct format...
        if(array_key_exists('year', $query_params) && !is_null($query_params['year'])) {
            $year = $query_params['year'];
            if(!preg_match("^(18|19|20)\d{2}$^", $year)) {
                throw new \Exception("Year needs to be between 1800 and 2099...");
            }
        }
    }
    function create_query(array $queryParams){
        $query = Movies::query();

        if(array_key_exists('year', $queryParams) && !is_null($queryParams['year'])) {
            $query->whereYear('aired', $queryParams['year']);
        }

        if(array_key_exists('title', $queryParams) && !is_null($queryParams['title'])) {
            $query->where('title', 'like', $queryParams['title'] . '%');
        }

        if(array_key_exists('genres', $queryParams) && !is_null($queryParams['genres'])) {
            $genres = $queryParams['genres'];
            $query->whereHas('genres', function (Builder $q) use($genres) {
                $q->distinct()->whereIn('genres.id', $genres);
            }, '=', count($genres));
        }

        if(array_key_exists('producers', $queryParams) && !is_null($queryParams['producers'])) {
            $producers = $queryParams['producers'];
            $query->whereHas('producers', function (Builder $builder) use($producers) {
                $builder->distinct()->whereIn('producers.id', $producers);
            }, '=', count($producers));
        }

        return $query;
    }

    function search(array $queryParams)
    {
        // Validate that the request is fine...
        $this->validate($queryParams);

        return $this->create_query($queryParams)->paginate(10);
    }
}
