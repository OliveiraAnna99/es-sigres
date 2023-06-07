<?php

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testValidationRules()
    {
        $request = new LoginRequest();

        $rules = $request->rules();

        $this->assertArrayHasKey('email', $rules);
        $this->assertArrayHasKey('password', $rules);

        $this->assertTrue(in_array('required', $rules['email']));
        $this->assertTrue(in_array('string', $rules['email']));
        $this->assertTrue(in_array('email', $rules['email']));

        $this->assertTrue(in_array('required', $rules['password']));
        $this->assertTrue(in_array('string', $rules['password']));
    }

   

    public function testAuthenticateFailed()
    {
        $this->expectException(ValidationException::class);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
            'remember' => false,
        ]);

        $request->authenticate();
    }

    public function testEnsureIsNotRateLimited()
    {
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $request->ensureIsNotRateLimited();

        $this->assertTrue(true); // Apenas para verificar que não houve exceção
    }

    public function testEnsureIsRateLimited()
    {
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(true);
        RateLimiter::shouldReceive('availableIn')->once()->andReturn(60);

        $this->expectException(ValidationException::class);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $request->ensureIsNotRateLimited();
    }

   
}