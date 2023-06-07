<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules\Password;
use Tests\TestCase;

class RegisteredUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_view_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    public function test_new_users_can_register()
    {
        Notification::fake();

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        $this->assertTrue(Auth::check());
    }
}
