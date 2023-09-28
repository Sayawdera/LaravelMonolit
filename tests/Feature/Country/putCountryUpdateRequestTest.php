<?php

namespace Tests\Feature\Country;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class putCountryUpdateRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Country_put_request(): void
    {
        $response = $this->put('/');

        $response->assertStatus(200);
    }
}
