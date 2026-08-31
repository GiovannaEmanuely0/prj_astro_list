<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\cadastroModel;
use App\Models\userModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'senha' => 'required|min:6',
        ]);

        $usuario = userModel::create([
            'nome'     => $validated['nome'],
            'email'    => $validated['email'],
            'senha' => bcrypt($validated['senha']),
        ]);

        Auth::login($usuario);

        return redirect('/usuario/' . $usuario->id);
    }

    public function storeApi(Request $request){
        $usuario = new userModel();

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = Hash::make($request->senha);
        $usuario->created_at = $request->date('Y-m-d H:i:s');
        $usuario->updated_at = $request->date('Y-m-d H:i:s');

        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $usuario = userModel::findOrFail($id);

    //     return view('nivelUsuario.usuario', compact('usuario'));
    // }


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
