<?php

namespace App\Http\Controllers;

use App\Models\FormaPagamento;
use Illuminate\Http\Request;

class FormaPagamentoController extends Controller
{
   
    public function index()
    {
        $formaPagamentoQuery = FormaPagamento::query();
        $formaPagamentoQuery->where('nome', 'like', '%'.request('q').'%');
        $formaPagamentos = $formaPagamentoQuery->paginate(25);

        return view('forma_pagamentos.index', compact('formaPagamentos'));
    }

    public function create()
    {

        return view('forma_pagamentos.create');
    }

   
    public function store(Request $request)
    {
      //  $this->authorize('create', new FormaPagamento);

        $newFormaPagamento = $request->validate([
            'nome'        => 'required|max:60',
        ]);
        $newFormaPagamento['creator_id'] = auth()->id();

        $formaPagamento = FormaPagamento::create($newFormaPagamento);

        return redirect()->route('forma_pagamentos.show', $formaPagamento);
    }

    /**
     * Display the specified formaPagamento.
     *
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return \Illuminate\View\View
     */
    public function show(FormaPagamento $formaPagamento)
    {
        return view('forma_pagamentos.show', compact('formaPagamento'));
    }

    /**
     * Show the form for editing the specified formaPagamento.
     *
     * @param  \App\Models\FormaPagamento  $formaPagamento
     * @return \Illuminate\View\View
     */
    public function edit(FormaPagamento $formaPagamento)
    {

        return view('forma_pagamentos.edit', compact('formaPagamento'));
    }

  
    public function update(Request $request, FormaPagamento $formaPagamento)
    {

        $formaPagamentoData = $request->validate([
            'nome'        => 'required|max:60',
        ]);
        $formaPagamento->update($formaPagamentoData);

        return redirect()->route('forma_pagamentos.show', $formaPagamento);
    }

   
    public function destroy(Request $request, FormaPagamento $formaPagamento)
    {
        $formaPagamento->delete();


            return redirect()->route('forma_pagamentos.index');

    }
}
