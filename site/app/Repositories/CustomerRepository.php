<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Http\Request;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function customerCreate(Request $request)
    {
        $data = $request->all();
        $data['contactInformation'] = json_encode($data['contactInformation']);
        Customer::create($data);
        return true;
    }
    public function customerAll()
    {
        return Customer::paginate(5);
    }
    public function customerFind($id)
    {
        return Customer::find($id);
    }
    public function customerUpdate(Request $request, $id)
    {
        $customer = Customer::find($id);
        $data = $request->all();
        $data['contactInformation'] = json_encode($request['contactInformation']);
        $customer->update($data);
        return true;
    }
    public function customerDestroy($id)
    {
        Customer::find($id)->delete();
        return true;
    }
}
