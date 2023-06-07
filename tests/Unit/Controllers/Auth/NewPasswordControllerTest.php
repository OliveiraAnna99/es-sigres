<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use App\Models\User;

class NewPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Registra as rotas necessárias para o teste
        Route::get('/login', function () {
            return 'Login page';
        })->name('login');
    }

    public function testCreateMethodReturnsView()
    {
        $controller = new NewPasswordController();

        $request = new Request();

        $response = $controller->create($request);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }

    public function testStoreMethodRedirectsToLoginWithSuccessStatus()
    {
        // Cria um usuário de exemplo
        $user = User::factory()->create();

        // Gera um token de redefinição de senha para o usuário
        $token = Password::broker()->createToken($user);

        // Cria uma URL de redefinição de senha para o token
        $resetUrl = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(60),
            ['token' => $token, 'email' => $user->email]
        );

        // Gera uma nova senha
        $newPassword = 'newpassword';

        $controller = new NewPasswordController();

        $request = new Request([
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        // Define o hash da nova senha
        Hash::shouldReceive('make')
            ->once()
            ->with($newPassword)
            ->andReturn('hashed_password');

        // Mock do evento PasswordReset
        Event::fake();

        // Chama o método store
        $response = $controller->store($request);

        // Verifica se a resposta é uma instância de RedirectResponse
        $this->assertInstanceOf(RedirectResponse::class, $response);

        // Verifica se a resposta redireciona para a rota de login
        $this->assertEquals(route('login'), $response->getTargetUrl());

        // Verifica se a mensagem de status está presente na sessão
        $this->assertSessionHas('status', trans('passwords.reset'));

        // Verifica se a senha do usuário foi atualizada no banco de dados
        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));

        // Verifica se o evento PasswordReset foi disparado
        Event::assertDispatched(PasswordReset::class, function ($event) use ($user) {
            return $event->user->id === $user->id;
        });
    }
}