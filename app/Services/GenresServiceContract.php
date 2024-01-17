<?php

namespace App\Services;

interface GenresServiceContract
{
    /**
     * Checks if all the ids exist...
     *
     * @param array $ids
     *   The array of ids that we need to check.
     * @return bool
     *   TRUE - all the records exist
     *   FALSE - one of the records does not exist.
     */
    function checkIfIdsExist(array $ids) : bool;
}
