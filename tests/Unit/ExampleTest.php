<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_landing_page(){
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
