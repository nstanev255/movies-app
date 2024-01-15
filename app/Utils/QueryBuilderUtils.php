<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class QueryBuilderUtils
{
    /**
     * This function takes the request's query params and returns a workable query for the search functionality.
     *
     * @param array $params
     *   The $request->query->all() array.
     * @return array
     *   The where array for the db query.
     */
    public static function transform_query_params(array $params): array {
        $where = array();

        if(count($params) == 0) {
            return $where;
        }

        if(in_array('title', $params)) {
            $where['where'][] = ['title', 'like', $params['title'] . '%'];
        }

        if(in_array('producer', $params)) {
            $where['producers'] = ['name', 'like', $params['producer'] . '%'];
        }

        if(in_array('actors', $params)) {
            $where['actors'] = ['name', 'like', $params['actors'] . '%'];
        }

        if(in_array('type', $params)) {
            $where['type'] = ['type', 'like', $params['type']. '%'];
        }

        return $where;
    }
}
