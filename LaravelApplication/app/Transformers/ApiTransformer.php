<?php

namespace App\Transformers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class ApiTransformer{

    public function transformCollection(Collection $items, array $relations = [], $includeExtras = false)
    {
        return $items->transform(function($item, $key) use ($relations, $includeExtras){

            return $this->transform($item, $relations, $includeExtras);
        });
    }


    public function transformPaginationList(LengthAwarePaginator $lengthAwarePaginator, array $relations = [], $includeExtras = false){
        {
            return [
                'current_page'  => $lengthAwarePaginator->currentPage(),
                'from'          => $lengthAwarePaginator->firstItem(),
                'last_page'     => $lengthAwarePaginator->lastPage(),
                'next_page_url' => $lengthAwarePaginator->nextPageUrl(),
                'per_page'      => $lengthAwarePaginator->perPage(),
                'prev_page_url' => $lengthAwarePaginator->previousPageUrl(),
                'to'            => $lengthAwarePaginator->lastItem(),
                'total'         => $lengthAwarePaginator->total(),
                'data'          => $this->transformCollection($lengthAwarePaginator->getCollection(), $relations, $includeExtras),
            ];
        }
    }

}
