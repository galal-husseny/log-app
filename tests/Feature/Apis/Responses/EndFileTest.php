<?php

namespace Tests\Feature\Apis\Responses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EndFileTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_end_file_returns_a_successfull_response()
    {
        $response = $this->post('/api/file/end',['path'=>"C:\\xampp.v.8.0.3\apache\logs\access.log"]);

        $response->assertStatus(200)->assertJson([
            'data'=>[]
        ]);
    }
}
