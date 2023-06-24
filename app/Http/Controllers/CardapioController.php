<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    
    public function index()
    {
        $cardapioQuery = Cardapio::query();
        $cardapioQuery->where('nome', 'like', '%'.request('q').'%');
        $cardapios = $cardapioQuery->paginate(25);

        return view('cardapios.index', compact('cardapios'));
    }

 
    public function create()
    {

        return view('cardapios.create');
    }

   
    public function store(Request $request)
    {
        $newCardapio = $request->validate([
            'nome'         => 'required|max:60',
            'valor'        => 'required|regex:/\d{1,6}(\,\d{0,2})/',
            'ingredientes' => 'required|max:500',
            'status'       => 'required|in:pendente,pronto',
        ]);
        
        $newCardapio['valor'] = str_replace(',', '.', $newCardapio['valor']);
        $cardapio = Cardapio::create($newCardapio);
        
        return redirect()->route('cardapios.show', $cardapio);
        
    }
    

    public function show(Cardapio $cardapio)
    {
        return view('cardapios.show', compact('cardapio'));
    }

  
    public function edit(Cardapio $cardapio)
    {
        return view('cardapios.edit', compact('cardapio'));
    }


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