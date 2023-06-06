<?php
use Tests\TestCase;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;

class LoginRequestTest extends TestCase
{
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

    public function testAuthenticate()
    {
        // Simule a autenticação bem-sucedida
        Auth::shouldReceive('attempt')->once()->andReturn(true);
        RateLimiter::shouldReceive('clear')->once();

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
            'remember' => true,
        ]);

        $request->authenticate();

        // Faça asserções adicionais conforme necessário
    }

    public function testAuthenticateFailed()
    {
        // Simule a autenticação falha
        Auth::shouldReceive('attempt')->once()->andReturn(false);
        RateLimiter::shouldReceive('hit')->once();
        RateLimiter::shouldReceive('availableIn')->once()->andReturn(60);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
            'remember' => false,
        ]);

        $this->expectException(ValidationException::class);

        $request->authenticate();
    }

    public function testEnsureIsNotRateLimited()
    {
        // Simule que a requisição não esteja limitada
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(false);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $request->ensureIsNotRateLimited();

        // Faça asserções adicionais conforme necessário
    }

    public function testEnsureIsRateLimited()
    {
        // Simule que a requisição esteja limitada
        RateLimiter::shouldReceive('tooManyAttempts')->once()->andReturn(true);
        RateLimiter::shouldReceive('availableIn')->once()->andReturn(60);

        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $this->expectException(ValidationException::class);

        $request->ensureIsNotRateLimited();
    }

    public function testThrottleKey()
    {
        $request = new LoginRequest();
        $request->merge([
            'email' => 'test@example.com',
        ]);

        $throttleKey = $request->throttleKey();

        // Faça asserções sobre o valor esperado do throttleKey
    }
}