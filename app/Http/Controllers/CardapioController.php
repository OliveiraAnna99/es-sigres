<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;
use App\Http\Requests\CardapioRequest;
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

   
    public function store(CardapioRequest $request)
    {
        $newCardapio = $request->validated();
        
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


    public function update(CardapioRequest $request, Cardapio $cardapio)
    {
        
        $cardapioData = $request->validated();
        $cardapioData['valor'] = str_replace(',', '.', $cardapioData['valor']);

        $cardapio->update($cardapioData);

        return redirect()->route('cardapios.show', $cardapio);
    }


    public function destroy(Request $request, Cardapio $cardapio)
    {

        $request->validate(['cardapio_id' => 'required']);

        if ($request->get('cardapio_id') == $cardapio->id && $cardapio->delete()) {
            return redirect()->route('cardapios.index');
        }

        return back();
    }
}