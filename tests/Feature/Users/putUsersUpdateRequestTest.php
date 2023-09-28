<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class putUsersUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Users_put_request(): void
    {
        $response = $this->put('/');

        $response->assertStatus(200);
    }
}
