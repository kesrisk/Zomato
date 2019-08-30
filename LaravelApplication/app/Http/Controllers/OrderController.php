<?php

namespace App\Http\Controllers;

use App\Http\Tasks\OrderTask\CreateOrderTask;
use App\Jobs\SendEmailJob;
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

    /**
     *get all orders
     *
     * @return collection of all orders
     */
    public function index()
    {

        return $this->repository->orders();
    }

    /**
     * Show order details
     *
     * @param order $id
     *
     * @return collection of cuisines.
     */
    public function show($id)
    {
        $order = $this->repository->find($id);

        return $order->cuisines;
    }

    /**
     *store cuisine

     * @param Illuminate\Http\Request $request
     * @param App\Http\Tasks\OrderTask\CreateOrderTask $task
     *
     * @return response 'success' with status code
     */
    public function store(Request $request, CreateOrderTask $task)
    {

        $data = $task->handle($request->all());

        dispatch(new SendEmailJob($data['orders'], $data['cuisines']))->onQueue('email');

        return response('success', 200);
    }

}
