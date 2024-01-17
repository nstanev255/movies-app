<?php

namespace App\Services\impl;

use App\Models\Producers;
use App\Services\ProducerServiceContract;

class ProducerService implements ProducerServiceContract
{

    public function checkIfAllIdsExist(array $ids): bool
    {
        if(count($ids) === 0) {
            throw new \Exception("the ids are empty");
        }

        $found_producers_count = Producers::query()->whereIn('id', $ids)->count();
        return $found_producers_count === count($ids);
    }
}
