<?php

namespace Tests\Feature\Controllers\Auth;

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class VerifyEmailControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    /**
     * Test if email is marked as verified for a user.
     *
     * @return void
     */
    public function testMarkEmailAsVerified()
    {
        Event::fake();

        $user = $this->createUser(['email_verified_at' => null]);

        $request = $this->createEmailVerificationRequest($user);

        $controller = new VerifyEmailController();

        $response = $controller->__invoke($request);

        $this->assertNotNull($user->fresh()->email_verified_at);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        Event::assertDispatched(Verified::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    /**
     * Test if email is already verified for a user.
     *
     * @return void
     */
    public function testAlreadyVerifiedEmail()
    {
        $user = $this->createUser(['email_verified_at' => now()]);

        $request = $this->createEmailVerificationRequest($user);

        $controller = new VerifyEmailController();

        $response = $controller->__invoke($request);

        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    /**
     * Create a new EmailVerificationRequest instance.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Foundation\Auth\EmailVerificationRequest
     */
    protected function createEmailVerificationRequest($user)
    {
        $url = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]
        );

        return new \Illuminate\Foundation\Auth\EmailVerificationRequest([
            'id' => $user->id,
            'hash' => sha1($user->getEmailForVerification()),
            'url' => $url,
        ]);
    }

    /**
     * Create a new user.
     *
     * @param  array  $overrides
     * @return \App\Models\User
     */
    protected function createUser(array $overrides = [])
    {
        return User::factory()->create($overrides);
    }
}

