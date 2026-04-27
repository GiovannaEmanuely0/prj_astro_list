<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cadastroModel;
use Illuminate\Support\Facades\Hash;
use App\Models\userModel;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivelCadastro.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'txNome' => 'required|string|max:255',
            'txEmail'=> 'required|email|unique:usuario,email',
            'txSenha'=> 'required|min:8|confirmed',
        ]);

        $cadastro = new cadastroModel();

        $cadastro->nome = $request->txNome;
        $cadastro->email = $request->txEmail;
        $cadastro->senha = Hash::make($request->txSenha);
        //$cadastro->created_at = $request->date('Y-m-d H:i:s');
        //$cadastro->updated_at = $request->date('Y-m-d H:i:s');

        $cadastro->save();

        return redirect('/usuario/' . $cadastro->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = userModel::findOrFail($id);

        return view('nivelUsuario.usuario', compact('usuario'));
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

}
