<?php

namespace App\Services;

interface ProducerServiceContract
{
    public function checkIfAllIdsExist(array $ids) : bool;
}
