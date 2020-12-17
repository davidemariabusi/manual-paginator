<?php

namespace Dmb\Manualpaginator;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    public static function paginate($collection, $perPage = 15)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = static::getCurrentItems($collection, $perPage, $currentPage);

        return new LengthAwarePaginator($currentItems, count($collection), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);
    }

    protected static function getCurrentItems($collection, $perPage, $currentPage)
    {
        if (gettype($collection) === 'array') {
            return array_slice($collection, $perPage * ($currentPage - 1), $perPage);
        }

        return $collection->slice($perPage * ($currentPage - 1), $perPage);
    }
}
