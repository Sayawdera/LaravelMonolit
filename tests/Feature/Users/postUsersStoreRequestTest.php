<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class postUsersStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Users_post_request(): void
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }
}
