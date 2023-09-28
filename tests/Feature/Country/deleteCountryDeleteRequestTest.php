<?php

namespace Tests\Feature\Country;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class deleteCountryDeleteRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Country_delete_request(): void
    {
        $response = $this->delete('/');

        $response->assertStatus(200);
    }
}
