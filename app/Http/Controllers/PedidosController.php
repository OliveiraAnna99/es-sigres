<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\Pedidos;
use App\Models\Cardapio;
use App\Models\FormaPagamento;

use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the pedidos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pedidos = Pedidos::all();
        $cardapios = Cardapio::all();

        return view('pedidos.index', compact('pedidos', 'cardapios'));
    }

    /**
     * Show the form for creating a new pedidos.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //$this->authorize('create', new Pedidos);
        $cardapios = Cardapio::all();
        $fps = FormaPagamento::all();
        return view('pedidos.create', compact('cardapios', 'fps'));
    }

    /**
     * Store a newly created pedidos in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
 
     public function store(PedidoRequest $request)
     {
         $validatedData = $request->validated();
         $pedido = Pedidos::create($validatedData);
     
         $cardapioIds = $request->input('cardapio_id');
         $pedido->cardapios()->attach($cardapioIds);

     
         return redirect()->route('pedidos.show', compact('pedido'));
     }
     
    /**
     * Display the specified pedidos.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\View\View
     */
    public function show(Pedidos $pedido)
    {
        $cardapios = Cardapio::all();
        return view('pedidos.show', compact('pedido', 'cardapios'));
    }

    /**
     * Show the form for editing the specified pedidos.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\View\View
     */
    public function edit(Pedidos $pedido)
    {
        //$this->authorize('update', $pedidos);
        $cardapios = Cardapio::all();

        return view('pedidos.edit', compact('pedido', 'cardapios'));
    }

    /**
     * Update the specified pedidos in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Routing\Redirector
     */
    public function update(PedidoRequest $request,  $id)
    {
            $cardapioIds = $request->input('cardapio_id');
            $pedido = Pedidos::findOrFail($id);
            $pedido->numero_mesa = $request->input('numero_mesa');
            $pedido->forma_pagamento = $request->input('forma_pagamento');
            $pedido->cardapio_id = intval(implode(',', $cardapioIds));
            $pedido->status = $request->input('status');
            $pedido->obs = $request->input('obs');

            $pedido->save();

        return redirect()->route('pedidos.show', $pedido);
    }

    /**
     * Remove the specified pedidos from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Pedidos $pedido)
    {
        //$this->authorize('delete', $pedidos);

        $request->validate(['pedido_id' => 'required']);

        if ($request->get('pedido_id') == $pedido->id && $pedido->delete()) {
            return redirect()->route('pedidos.index');
        }

        return back();
    }
}
