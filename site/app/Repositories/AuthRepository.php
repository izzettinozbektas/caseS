<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
  public function userCreate($data)
  {
      $data['password'] = bcrypt($data['password']);
      User::create($data);
      return true;
  }
  public function userLogin($data)
  {
      if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
          return true;
      } else{
          return false;
      }
  }

}
