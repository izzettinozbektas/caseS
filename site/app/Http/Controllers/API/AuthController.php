<?php

namespace App\Http\Controllers\API;

use App\Requests\LoginRequest;
use App\Requests\RegisterRequest;
use App\Response\Response;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AuthRepository;

class AuthController extends Response
{
    private $authRepository;
    public function __construct(AuthRepository $repository)
    {
        $this->authRepository = $repository;
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();

        if($this->authRepository->userCreate($data)){
            return $this->sendResponse([]);
        }
        return  $this->sendError("operation failed");

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $data = $request->all();
        if($this->authRepository->userLogin($data)){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;;
            $success['tokenType'] = "Bearer";
            return $this->sendResponse($success);
        }else{
            return $this->sendError('Login faild');
        }
    }
}
