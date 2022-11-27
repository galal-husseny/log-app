<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PreviousLinesPerformanceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_performance_for_previous_lines()
    {
        $startMemoryUsage = memory_usage();
        $response = $this->post('/api/file/previous',['path'=>"C:\\xampp.v.8.0.3\apache\logs\access.log",'lastIndex'=>0]);
        $endMemoryUsage = memory_usage();
        $memoryUsage = $endMemoryUsage - $startMemoryUsage ;
        if($memoryUsage >= 3 ){
            $response->assertStatus(500);
        }else{
            $response->assertStatus(200);
        }
    }
}
