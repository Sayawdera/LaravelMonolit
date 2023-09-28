<?php

namespace Tests\Feature\Country;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getCountryIndexRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Country_get_request(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
