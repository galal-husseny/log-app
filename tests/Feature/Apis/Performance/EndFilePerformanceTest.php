<?php

namespace Tests\Feature\Apis\Performance;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EndFilePerformanceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_check_performance_for_end_of_file()
    {
        $startMemoryUsage = memory_usage();
        $response = $this->post('/api/file/end',['path'=>"C:\\xampp.v.8.0.3\apache\logs\access.log"]);
        $endMemoryUsage = memory_usage();
        $memoryUsage = $endMemoryUsage - $startMemoryUsage ;
        if($memoryUsage >= 3 ){
            $response->assertStatus(500);
        }else{
            $response->assertStatus(200);
        }
    }
}
