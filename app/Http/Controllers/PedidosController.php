<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Cardapio;
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

        return view('pedidos.index', compact('pedidos'));
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
        return view('pedidos.create', compact('cardapios'));
    }

    /**
     * Store a newly created pedidos in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //$this->authorize('create', new Pedidos);
        
        $pedidosData = $request->validate([
            'numero_mesa' => 'required',
            'status' => 'required',
            'cardapio_id' => 'required',
        ]);
    
        $newPedidos = $pedidosData; // Atribui os valores validados a $newPedidos
    
   
        $pedido = Pedidos::create($newPedidos);
        return redirect()->route('pedidos.show', $pedido);
    }
    

    /**
     * Display the specified pedidos.
     *
     * @param  \App\Models\Pedidos  $pedidos
     * @return \Illuminate\View\View
     */
    public function show(Pedidos $pedido)
    {
        return view('pedidos.show', compact('pedido'));
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
    public function update(Request $request, Pedidos $pedido)
    {
        //$this->authorize('update', $pedidos);

        $pedidosData = $request->validate([
            'numero_mesa' => 'required',
            'status' => 'required',
            'cardapio_id' => 'required',
        ]);
        $pedido->update($pedidosData);

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
