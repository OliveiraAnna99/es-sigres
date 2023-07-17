<?php
namespace Tests\Feature;

use App\Models\Pedidos;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ManagePedidosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_pedidos_list_in_pedidos_index_page()
    {
        $pedidos = Pedidos::factory()->create();

        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('pedidos.index'))
            ->assertSee($pedidos->name);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'numero_mesa' => 1,
            'status' => 1,
            'obs' => 'Pedido de teste',
            // adicione outros campos necessários aqui
        ], $overrides);
    }

    /** @test */
    public function user_can_create_a_pedidos()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get(route('pedidos.index'))
            ->click(__('pedidos.create'))
            ->seeRouteIs('pedidos.create')
            ->submitForm(__('pedidos.create'), $this->getCreateFields())
            ->seeRouteIs('pedidos.show', Pedidos::first())
            ->seeInDatabase('pedidos', $this->getCreateFields());
    }

    /** @test */
    public function user_can_delete_a_pedidos()
    {
        $user = User::factory()->create();
        $pedidos = Pedidos::factory()->create();
        Pedidos::factory()->create();

        $this->actingAs($user)
            ->get(route('pedidos.edit', $pedidos))
            ->click('del-pedidos-'.$pedidos->id)
            ->seeRouteIs('pedidos.edit', [$pedidos, 'action' => 'delete'])
            ->press(__('app.delete_confirm_button'))
            ->dontSeeInDatabase('pedidos', [
                'id' => $pedidos->id,
            ]);
    }

    // Resto dos testes...

    // ...
}
