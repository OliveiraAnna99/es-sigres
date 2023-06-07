<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Cardapio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class CardapioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_cardapio_has_name_link_attribute()
    {
        $cardapio = Cardapio::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $cardapio->name, 'type' => __('cardapio.cardapio'),
        ]);
        $link = '<a href="'.route('cardapios.show', $cardapio).'"';
        $link .= ' title="'.$title.'">';
        $link .= $cardapio->name;
        $link .= '</a>';

        $this->assertEquals($link, $cardapio->name_link);
    }

    /** @test */
   
}