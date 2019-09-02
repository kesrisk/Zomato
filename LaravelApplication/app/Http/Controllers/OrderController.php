<?php

namespace App\Http\Controllers;

use App\Http\Tasks\OrderTask\CreateOrderTask;
use App\Http\Tasks\OrderTask\ShowOrderTask;
use App\Jobs\SendEmailJob;
use App\Order;
use App\Repositories\OrderRepository;
use App\Transformers\OrderDetailsTransformer;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    private $repository;
    private $transformer;

    public function __construct(OrderRepository $repository, OrderDetailsTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
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
    public function show($id, ShowOrderTask $task)
    {
        $data = $task->handle($id);

        return $this->transformer->transform($data['cuisines'], $data['address']);

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
