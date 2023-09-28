<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getUsersIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Users_get_request(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
