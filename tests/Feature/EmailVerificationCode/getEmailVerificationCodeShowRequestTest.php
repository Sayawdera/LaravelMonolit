<?php

namespace Tests\Feature\EmailVerificationCode;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getEmailVerificationCodeShowRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_EmailVerificationCode_get_request(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
