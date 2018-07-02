<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }
    public function testpincodeinfo()
    {
        $response=$this->get('/560076');
        $response->assertStatus(200)
                ->assertJson([
                'districtname' => 'Bengaluru',
            ]);
        $response=$this->get('/abcd');
        $response->assertStatus(404);
        $response=$this->get('/6666666');
        $response->assertStatus(404);
        $response=$this->get('/');
        $response->assertStatus(404);
        $response=$this->get('/44abs');
        $response->assertStatus(404);






    }
    public function testlocationinfo()
    {
        $response=$this->get('/info?districtname=Bengaluru&statename=Karnataka');
        $response->assertStatus(200)
            ->assertJsonFragment([
                'pincode' => 560103,
            ]);
        $response=$this->get('/info?districtname=&statename=Karnataka');
        $response->assertStatus(200)
            ->assertJsonFragment([
                "pincode"=>560103,
                "divisionname"=> "Bengaluru East",
                "districtname"=>"Bengaluru",
                "statename"=>"KARNATAKA",
            ]);
        $response=$this->get('/info?districtname=Bengaluru&statename=');
        $response->assertStatus(200)
            ->assertJsonFragment([
                "pincode"=>560103,
                "divisionname"=> "Bengaluru East",
                "districtname"=>"Bengaluru",
                "statename"=>"KARNATAKA",
            ]);
        $response=$this->get('/info?districtname=&statename=');
        $response->assertStatus(404);
        $response=$this->get('/info?districtname=abcd&statename=efgh');
        $response->assertStatus(404);
        $response=$this->get('/info?districtname=123&statename=456');
        $response->assertStatus(404);
        $response=$this->get('/info?districtname=&statename=ANDHRA%20PRADESH');
        $response->assertStatus(200)
                 ->assertJsonFragment([
                     "pincode"=>518004,
                 ]);







    }
}
