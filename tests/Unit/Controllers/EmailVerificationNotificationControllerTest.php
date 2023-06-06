<?php
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Tests\TestCase;

class EmailVerificationNotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_method_redirects_to_intended_route_when_email_is_already_verified()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $response = $this->actingAs($user)->post('/email/verification-notification');

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_store_method_sends_email_verification_notification_and_redirects_back_with_status()
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/email/verification-notification');

        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertRedirect('/');
        $response->assertSessionHas('status', 'verification-link-sent');
    }
}