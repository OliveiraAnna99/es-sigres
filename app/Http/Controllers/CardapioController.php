<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardapioRequest;
use App\Models\Cardapio;
use App\Models\Estoque;
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

        $estoques = Estoque::all();
        return view('cardapios.create', compact('estoques'));
    }

   
  
    public function store(CardapioRequest $request)
    {
        $validatedData = $request->validated();
    
        // Substitui ',' por '.' em 'valor'
        $validatedData['valor'] = str_replace(',', '.', $validatedData['valor']);
    
        $cardapio = Cardapio::create($validatedData);
        $estoqueIds = $request->input('estoque_id');
        
        foreach ($estoqueIds as $estoqueId) {
            // Obter o estoque pelo ID
            $estoque = Estoque::find($estoqueId);
            
            if ($estoque) {
                // Diminuir a quantidade disponível em 1
                $estoque->quant -= 1;
                $estoque->save();
            }
        }
    
        return redirect()->route('cardapios.show', $cardapio);
    }
    

    public function show(Cardapio $cardapio)
    {
        $estoques = Estoque::all();
        return view('cardapios.show', compact('cardapio', 'estoques'));
    }

  
    public function edit(Cardapio $cardapio)
    {
        $estoques = Estoque::all();

        return view('cardapios.edit', compact('cardapio', 'estoques'));
    }


    public function update(CardapioRequest $request, Cardapio $cardapio)
{
    $validatedData = $request->validated();

    // Substitui ',' por '.' em 'valor'
    $validatedData['valor'] = str_replace(',', '.', $validatedData['valor']);

    $cardapio->update($validatedData);
    $estoqueIds = $request->input('estoque_id');

    // Restaura as quantidades originais dos estoques associados ao cardápio
    foreach ($cardapio->estoques as $estoque) {
        $estoque->quant += 1;
        $estoque->save();
    }

    // Atualiza os estoques associados ao cardápio com as novas seleções
    foreach ($estoqueIds as $estoqueId) {
        $estoque = Estoque::find($estoqueId);

        if ($estoque) {
            $estoque->quant -= 1;
            $estoque->save();
        }
    }

    return redirect()->route('cardapios.show', $cardapio);
}



    public function destroy(Request $request, Cardapio $cardapio)
    {
        $request->validate(['cardapio_id' => 'required']);
    
        if ($request->get('cardapio_id') == $cardapio->id) {
            // Remover as referências na tabela 'cardapio_estoque'
            $cardapio->estoques()->detach();
    
            // Excluir o cardápio
            $cardapio->delete();
    
            return redirect()->route('cardapios.index');
        }
    
        return back();
    }
    
}