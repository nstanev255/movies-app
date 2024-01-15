<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Movies;
use App\Utils\QueryBuilderUtils;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show() {

        $queryParams = \request()->query->all();
        $search_query = QueryBuilderUtils::transform_query_params($queryParams);

        $query = Movies::query();
        if(in_array('where', $queryParams)) {
            $whereQueries = $queryParams['where'];
            $query->where($whereQueries);
        }

        if(in_array('producer', $queryParams)) {
            $producer = $queryParams['producer'];
            $query->whereRelation('producers', $producer);
        }

        if(in_array('actor', $queryParams)) {

        }

    }
}
