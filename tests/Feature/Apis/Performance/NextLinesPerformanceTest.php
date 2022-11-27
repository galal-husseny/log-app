<?php

namespace Tests\Feature\Apis\Performance;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NextLinesPerformanceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_performance_for_next_lines()
    {
        $startMemoryUsage = memory_usage();
        $response = $this->post('/api/file/next',['path'=>"C:\\xampp.v.8.0.3\apache\logs\access.log",'lastIndex'=>0]);
        $endMemoryUsage = memory_usage();
        $memoryUsage = $endMemoryUsage - $startMemoryUsage ;
        if($memoryUsage >= 3 ){
            $response->assertStatus(500);
        }else{
            $response->assertStatus(200);
        }
    }
}
