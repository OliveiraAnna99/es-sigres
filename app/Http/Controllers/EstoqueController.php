<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Display a listing of the estoque.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $estoqueQuery = Estoque::query();
        $estoqueQuery->where('name', 'like', '%' . request('q') . '%');
        $estoques = $estoqueQuery->paginate(25);

        return view('estoques.index', compact('estoques'));
    }

    /**
     * Show the form for creating a new estoque.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $this->authorize('create', new Estoque);

        return view('estoques.create');
    }

    /**
     * Store a newly created estoque in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // $this->authorize('create', new Estoque);

        $newEstoque = $request->validate([
            'item'        => 'required|max:255',
            'quant'        => 'required',
            'date'        => 'required',

        ]);
        $newEstoque['creator_id'] = auth()->id();

        $estoque = Estoque::create($newEstoque);

        return redirect()->route('estoques.show', $estoque);
    }

    /**
     * Display the specified estoque.
     *
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\View\View
     */
    public function show(Estoque $estoque)
    {
        return view('estoques.show', compact('estoque'));
    }

    /**
     * Show the form for editing the specified estoque.
     *
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\View\View
     */
    public function edit(Estoque $estoque)
    {
        // $this->authorize('update', $estoque);

        return view('estoques.edit', compact('estoque'));
    }

    /**
     * Update the specified estoque in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Estoque $estoque)
    {
        // $this->authorize('update', $estoque);

        $estoqueData = $request->validate([
            'item'        => 'required|max:255',
            'quant'        => 'required',
            'date'        => 'required',
        ]);
        $estoque->update($estoqueData);

        return redirect()->route('estoques.show', $estoque);
    }

    /**
     * Remove the specified estoque from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Estoque $estoque)
    {
        // $this->authorize('delete', $estoque);

        $request->validate(['estoque_id' => 'required']);

        if ($request->get('estoque_id') == $estoque->id && $estoque->delete()) {
            return redirect()->route('estoques.index');
        }

        return back();
    }
}
