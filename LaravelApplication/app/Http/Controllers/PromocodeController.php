<?php

namespace App\Http\Controllers;

use App\Repositories\PromocodeRepository;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    private $repository;

    public function __construct(PromocodeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * return discount associated with the promocode
     *
     * @param Illuminate\Http\Request $request
     *
     * @return discount percentage, for invalid promocode returns 0
     */
    public function index(Request $request)
    {
        $promocode = $request['promocode'];
        $promocode = $this->repository->findByName($promocode);
        if($promocode)
        {
            return $promocode['discount'];
        }
        return 0;
    }
}
