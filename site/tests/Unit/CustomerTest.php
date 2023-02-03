<?php

namespace Tests\Unit;

use App\Models\Customer;
use App\Models\User;
use Tests\TestCase;
class CustomerTest extends TestCase
{
    public function test_register()
    {
        $response = $this->call('POST','/api/register', [
            'name' => 'UnitTestt',
            'email' => 'test@test.com',
            'password' => '12345',
            'c_password' => '12345'
        ]);
        $response->assertStatus($response->status(), 200);
    }
    public  function test_login()
    {
        $response = $this->call('POST','/api/login', [
            'email' => 'test@test.com',
            'password' => '12345'
        ]);

        $response->assertStatus($response->status(), 200);
        return $response['data']['token'];
    }
    public function test_add_customer()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->test_login())
        ->json('POST', '/api/customer', [
            "name"=>"TestNameS",
            "lastName" =>"Bir",
            "company" =>"Test Firma",
            "photo" => "test-url-photo",
            "contactInformation" => [
                "phoneNumber" => "05355355353",
                "emailAddres" => "test@test.com",
                "location" => [
                    "lang" => 41.0812416,
                    "lat" => 28.9734656
                ]
            ]
        ]);
        $response->assertStatus($response->status(), 200);
    }
    public function test_all_customer()
    {
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->test_login())
            ->json('GET', '/api/customer');
        $response->assertStatus($response->status(), 200);
    }
    public function test_show_customer()
    {
        $data = Customer::where('name','TestNameS')->get();
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->test_login())
            ->json('GET', '/api/customer/'.$data[0]->id);

        $this->assertEquals($response->getOriginalContent(),$data[0]);
    }
    public function test_update_customer()
    {
        $data = Customer::where('name','TestNameS')->get();
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->test_login())
            ->json('PUT', '/api/customer/'.$data[0]->id, [
                "name"=>"TestNameSUpdate",
                "lastName" =>"Bir",
                "company" =>"Test Firma",
                "photo" => "test-url-photo",
                "contactInformation" => [
                    "phoneNumber" => "05355355353",
                    "emailAddres" => "test@test.com",
                    "location" => [
                        "lang" => 41.0812416,
                        "lat" => 28.9734656
                    ]
                ]
            ]);
        $response->assertStatus($response->status(), 200);
        $updateData = Customer::find($data[0]->id);
        $this->assertEquals($updateData['name'],'TestNameSUpdate');
    }
    public function test_destroy_customer()
    {
        $token = $this->test_login();
        $data = Customer::where('name','TestNameSUpdate')->get();
        foreach ($data as $dt){
            $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                ->json('DELETE', '/api/customer/'.$dt->id);
            $response->assertStatus($response->status(), 200);
        }
        $count = Customer::where('name','TestNameSUpdate')->count();
        $this->assertEquals($count,0);
    }
    public function test_admin_destroy()
    {
        $admin = User::where("name","UnitTestt")->first();
        $this->assertTrue($admin->delete());
    }
}

