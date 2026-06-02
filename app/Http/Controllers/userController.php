<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = userModel::where('email', $request->txEmail)->first();

        return view('nivelUsuario.usuario', compact('usuario'));

    }
    public function indexApi()
    {
        // $usuario = userModel::where('email', $request->txEmail)->first();
        $usuario = userModel::all();
        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivelUsuario.usuario', compact('usuario'));
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

        $usuario = new userModel();

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = Hash::make($request->senha);
        $usuario->created_at = $request->date('Y-m-d H:i:s');
        $usuario->updated_at = $request->date('Y-m-d H:i:s');

        $usuario->save();

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
                'nome'=>'min:3',
                'email'=>'max:40',
                'senha'=>'max:40',
            ]);
                $usuario = userModel::findOrFail($id);
                $usuario -> update($validarDados);
                return response()->json(
            [
            "mensagem" => 'Dados alterados com sucesso',
            "usuario" => $usuario
            ],
            200
            );
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
        userModel::where('id', $id)->delete();
        return response()->json([
            'message'=>"Usuário excluído",'code'=>200
        ]);
    }
}
