<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class deleteUsersDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Users_delete_request(): void
    {
        $response = $this->delete('/');

        $response->assertStatus(200);
    }
}
