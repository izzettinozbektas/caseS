<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Requests\CustomerCreateRequest;
use App\Requests\CustomerUpdateRequest;
use App\Resources\Customer;
use App\Response\Response;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    private $response;
    private $customerRepository;
    public function __construct(CustomerRepository $repository,Response $response)
    {
        $this->customerRepository = $repository;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = $this->customerRepository->customerAll();
        return new Customer($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerCreateRequest $request)
    {
        if($this->customerRepository->customerCreate($request)){
            return $this->response->sendResponse([]);
        }
        return $this->response->sendError("operation failed");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->customerRepository->customerFind($id);
        return new Customer($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        if($this->customerRepository->customerUpdate($request,$id)){
            return $this->response->sendResponse([]);
        }
        return $this->response->sendError("operation failed");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if($this->customerRepository->customerDestroy($id)){
            return $this->response->sendResponse([]);
        }
        return $this->response->sendError("operation failed");
    }
}
