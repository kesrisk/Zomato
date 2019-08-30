<?php

namespace App\Http\Controllers;

use App\Http\Tasks\OrderTask\CreateOrderTask;
use App\Order;
use App\Promocode;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    private $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

        return $this->repository->orders();
    }


    public function show($id)
    {
        $order = $this->repository->find($id);

        return $order->cuisines;
    }


    public function store(Request $request, $restaurant_id, CreateOrderTask $task)
    {

        return $task->handle($request->all(), intval($restaurant_id));
    }

}
