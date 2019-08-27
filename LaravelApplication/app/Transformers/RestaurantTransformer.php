<?php

namespace App\Transformers;

use App\State;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class RestaurantTransformer
{
    public function store($data)
    {
        return [
            'name'          => $data['restaurant']->name,
            'description'   => $data['restaurant']->description,
            'phone_number'  => $data['restaurant']->phone_number,
            'state'         => State::findOrFail($data['address']->state_id)->name,
            'district'      => State::findOrFail($data['address']->district_id)->name,
            'street'        => $data['address']->street,
        ];
    }

    public function transformCollection(Collection $items, array $relations = [], $includeExtras = false)
    {

        // // return $cuisines;
        // $page = $cuisines;

        $data =  $items->map(function($cuisine){
            return [
                'id'            => $cuisine['id'],
                'name'          => $cuisine['name'],
                'description'   => $cuisine['description'],
                'cost'          => $cuisine['pivot']->cost,
            ];
        });
        return $data;
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
