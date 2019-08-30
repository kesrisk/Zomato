<?php

namespace App\Http\Controllers;

use App\District;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Tasks\CreateRestaurantTask;
use App\Repositories\RestaurantRepository;
use Illuminate\Http\Request;
use App\Restaurant;
use App\State;
use App\Traits\AttachmentTrait;
use App\Transformers\RestaurantTransformer;

class RestaurantController extends Controller
{
    use AttachmentTrait;

    private $transformer;
    private $repository;

    public function __construct(RestaurantTransformer $transformer, RestaurantRepository $repository)
    {
        $this->transformer = $transformer;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->repository->all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request, CreateRestaurantTask $task)
    {

        return $task->handle($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cuisines($id)
    {

        $data = $this->repository->find($id)->cuisines()->paginate(1);

        return $this->transformer->transformPaginationList($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    public function attachments($id)
    {

        return $this->repository->attachments($id);
    }


    public function address($id)
    {

        return $this->repository->address($id);
    }


    public function addReview($id, Request $request)
    {

        return $this->repository->addReview($id, $request->all());
    }

    public function addAttachment(Request $request, $id)
    {
        return $this->create($this->repository->find($id), $request['image_url']);
    }
}
