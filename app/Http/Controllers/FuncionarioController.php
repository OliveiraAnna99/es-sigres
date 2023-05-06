<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the funcionario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $funcionarioQuery = Funcionario::query();
        $funcionarioQuery->where('nome', 'like', '%'.request('q').'%');
        $funcionarios = $funcionarioQuery->paginate(25);

        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new funcionario.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $this->authorize('create', new Funcionario);

        return view('funcionarios.create');
    }

    /**
     * Store a newly created funcionario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // $this->authorize('create', new Funcionario);

        $newFuncionario = $request->validate([
            'nome'        => 'required|max:60',
            'cpf'         => 'required|min:11|max:14',
            'endereco'    => 'required|max:200',
            'contato'     => 'required|max:14',
            'rg'          => 'required|max:14',
            'funcao'      => 'required|max:60',
            'login'       => 'required|max:100',
        ]);
        $newFuncionario['creator_id'] = auth()->id();

        $funcionario = Funcionario::create($newFuncionario);

        return redirect()->route('funcionarios.show', $funcionario);
    }

    /**
     * Display the specified funcionario.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\View\View
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified funcionario.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\View\View
     */
    public function edit(Funcionario $funcionario)
    {
        // $this->authorize('update', $funcionario);

        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified funcionario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        // $this->authorize('update', $funcionario);

        $funcionarioData = $request->validate([
            'nome'        => 'required|max:60',
            'cpf'         => 'required|min:11|max:14',
            'endereco'    => 'required|max:200',
            'contato'     => 'required|max:14',
            'rg'          => 'required|max:14',
            'funcao'      => 'required|max:60',
            'login'       => 'required|max:100',
        ]);
        $funcionario->update($funcionarioData);

        return redirect()->route('funcionarios.show', $funcionario);
    }

    /**
     * Remove the specified funcionario from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Funcionario $funcionario)
    {
        // $this->authorize('delete', $funcionario);

        $request->validate(['funcionario_id' => 'required']);

        if ($request->get('funcionario_id') == $funcionario->id && $funcionario->delete()) {
            return redirect()->route('funcionarios.index');
        }

        return back();
    }
}
