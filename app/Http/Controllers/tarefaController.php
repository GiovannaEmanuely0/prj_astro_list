<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tarefaModel;

class tarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefa = tarefaModel::all();
        return view('Dashboard')->with('Dashboard',$tarefa);
    }

    public function indexApi()
    {
        return tarefaModel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $tarefa = new tarefaModel();
        $tarefa->fill($request->all());
        $tarefa->save();

        return redirect('/')->with('success', 'Tarefa cadastrada com sucesso!');

    }

    public function storeApi(Request $request)
    {
        $tarefa = new tarefaModel();
        $tarefa->fill($request->all());
        $tarefa->save();

        return response()->json([
            "message" => "Tarefa cadastrada com sucesso!",
            "tarefa" => $tarefa
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateApi(Request $request, string $id)
    {
        $validarDados = $request->validate([
            'titulo' => 'required|min:5',
            'descricao' => 'required|max:150',
            'categoria' => 'nullable|max:15',
            'status' => 'nullable|string',
            'prioridade' => 'nullable|string',
        ]);

        $tarefa = tarefaModel::findOrFail($id);
        $tarefa->update($validarDados);

        return response()->json([
            "message"=>'Seus dados foram alterados com sucesso!',
            "tarefa"=>$tarefa
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function destroyApi(string $id)
    {
        tarefaModel::where('id',$id)->delete();
        return response()->json([
            'message'=>"Tarefa Excluída",'code'=>200
        ]);
    }
}
