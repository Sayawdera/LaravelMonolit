<?php

namespace Tests\Feature\Country;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class postCountryStoreRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Country_post_request(): void
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }
}
