<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    /**
     * Display a listing of the cardapio.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cardapioQuery = Cardapio::query();
        $cardapioQuery->where('nome', 'like', '%'.request('q').'%');
        $cardapios = $cardapioQuery->paginate(25);

        return view('cardapios.index', compact('cardapios'));
    }

    /**
     * Show the form for creating a new cardapio.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //$this->authorize('create', new Cardapio);

        return view('cardapios.create');
    }

    /**
     * Store a newly created cardapio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //$this->authorize('create', new Cardapio);
        $newCardapio = $request->validate([
            'nome'         => 'required|max:60',
            'valor'        => 'required|regex:/\d{1,6}(\,\d{0,2})/',
            'ingredientes' => 'required|max:500',
            'status'       => 'required|in:pendente,pronto',
            // 'imagem'       => 'required|mimes:jpeg,jpg,png',
            // Adiciona a validação para imagem (opcional e tamanho máximo de 2MB)
        ]);
        
        $newCardapio['valor'] = str_replace(',', '.', $newCardapio['valor']);
        
        // if ($request->hasFile('imagem')) {
        //     $imagemPath = $request->file('imagem')->store('imagens', 'public');
        //     $newCardapio['imagem'] = $imagemPath;
        // }
        
        $cardapio = Cardapio::create($newCardapio);
        
        return redirect()->route('cardapios.show', $cardapio);
        
    }
    

    /**
     * Display the specified cardapio.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return \Illuminate\View\View
     */
    public function show(Cardapio $cardapio)
    {
        return view('cardapios.show', compact('cardapio'));
    }

    /**
     * Show the form for editing the specified cardapio.
     *
     * @param  \App\Models\Cardapio  $cardapio
     * @return \Illuminate\View\View
     */
    public function edit(Cardapio $cardapio)
    {
        //$this->authorize('update', $cardapio);

        return view('cardapios.edit', compact('cardapio'));
    }

    /**
     * Update the specified cardapio in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardapio  $cardapio
     * @return \Illuminate\Routing\Redirector
     */
    
    public function update(Request $request, Cardapio $cardapio)
    {
        $cardapioData = $request->validate([
            'nome'         => 'required|max:60',
            'valor'        => 'required|regex:/\d{1,6}(\,\d{0,2})/',
            'ingredientes' => 'required|max:500',
            'status'       => 'required|in:pendente,pronto',
        ]);

        $cardapioData['valor'] = str_replace(',', '.', $cardapioData['valor']);

      

        $cardapio->update($cardapioData);

        return redirect()->route('cardapios.show', $cardapio);
    }


    /**
     * Remove the specified cardapio from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardapio  $cardapio
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Cardapio $cardapio)
    {
        //$this->authorize('delete', $cardapio);

        $request->validate(['cardapio_id' => 'required']);

        if ($request->get('cardapio_id') == $cardapio->id && $cardapio->delete()) {
            return redirect()->route('cardapios.index');
        }

        return back();
    }
}