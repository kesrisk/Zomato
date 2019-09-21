<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Tasks\AttachmentTask\AddAttachmentTask;
use App\Http\Tasks\CreateRestaurantTask;
use App\Repositories\RestaurantRepository;
use Illuminate\Http\Request;
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

        $data = $this->repository->find($id)->cuisines()->paginate(20);

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

    /**
     * get restaurants attachments
     *
     * @param restaurant_id $id
     *
     * @return collection of attachment associated with restaurant
     */
    public function attachments($id)
    {

        return $this->repository->attachments($id);
    }


    /**
     * get restaurant address
     *
     * @param restaurant_id $id
     *
     * @return address object
     */
    public function address($id)
    {

        return $this->repository->address($id);
    }


    /**
     * add review to restaurant
     *
     * @param Illuminate\Http\Request $request
     * @param restaurant_id $id
     *
     * @return response 'success' with status code
     */
    public function addReview($id, Request $request)
    {

        $this->repository->addReview($id, $request->all());
        return response('success', 200);
    }


    /**
     * add attachment to the restaurant
     *
     * @param Illuminate\Http\Request $request
     * @param restaurant_id $id
     * @param App\Http\Tasks\AttachmentTask\AddAttachmentTask $task
     *
     * @return response 'success' and response code
     */
    public function addAttachment(Request $request, $id, AddAttachmentTask $task)
    {
        $task->handle($this->repository->find($id), $request['image_url']);

        return response('success', 200);
    }
}
