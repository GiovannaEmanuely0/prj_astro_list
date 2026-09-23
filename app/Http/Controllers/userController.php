<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
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
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:6',
        ]);

        $usuario = userModel::create([
            'nome'  => $validated['nome'],
            'email' => $validated['email'],
            'senha' => bcrypt($validated['senha']),
        ]);

        return redirect('/login')->with(
            'success',
            'Cadastro realizado com sucesso! Faça login para continuar.'
        );
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

    public function fazerLogin(Request $request){

        if(!Auth::attempt($request->only(['email', 'password']))){

        return redirect('/login');

        }

        else{

        return redirect('dashboard');

        }

    }

    public function fazerLogOut(Request $request){

        Auth::logout();

        return redirect('/login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ((int) $id !== Auth::id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $usuario = Auth::user();

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

    public function listaPorIdAPI($id){

        $usuario = userModel::where('id', '=',$id)->get();
        
        return response()->json($usuario);
    }

    public function listaPorNomeAPI($nome){
        $usuario = userModel::where('nome', 'like', '%' . $nome . '%')->get();
        
        return response()->json($usuario);
    }
}
