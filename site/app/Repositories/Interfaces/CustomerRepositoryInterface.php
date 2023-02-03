<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
interface CustomerRepositoryInterface
{
    public function customerCreate(Request $request);
    public function customerFind($id);
    public function customerAll();
    public function customerUpdate(Request $data,$id);
    public function customerDestroy($id);
}
