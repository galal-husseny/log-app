<?php

namespace Tests\Feature\Apis\Responses;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PreviousLinesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_previous_lines_returns_a_successfull_response()
    {
        $response = $this->post('/api/file/previous',['path'=>"C:\\xampp.v.8.0.3\apache\logs\access.log","lastIndex"=>0]);

        $response->assertStatus(200)->assertJson([
            'data'=>[]
        ]);
    }
}
