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