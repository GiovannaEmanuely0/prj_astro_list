<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adminModel;
use App\Models\userModel;

//Arquivos CSV
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = userModel::latest()->take(10)->get();
        $adm = adminModel::first();
        return view('nivelAdm.adm',compact('adm', 'usuario'));
        
    }

    public function indexApi()
    {
        return adminModel::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivelAdmCadastro.cadastroAdm');
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
            'nome' => 'required|string|max:255',
            'email'=> 'required|email|unique:usuario,email',
            'senha'=> 'required|min:8|confirmed',
        ]);

        $adm = new adminModel();

        $adm->nome = $request->nome;
        $adm->email = $request->email;
        $adm->senha = Hash::make($request->senha);
        $adm->created_at = $request->date('Y-m-d H:i:s');
        $adm->updated_at = $request->date('Y-m-d H:i:s');

        $adm->save();

        return redirect('/admin');
    }

    public function storeApi(Request $request)
    {
        $adm = new adminModel();

        $adm->nome = $request->nome;
        $adm->email = $request->email;
        $adm->senha = Hash::make($request->senha);
        $adm->created_at = $request->date('Y-m-d H:i:s');
        $adm->updated_at = $request->date('Y-m-d H:i:s');

        $adm->save();
        
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

    public function updateApi(Request $request, $id)
    {
        $validarDados = $request->validate([
            'nome'=>'min:3',
            'email'=>'max:40',
            'senha'=>'max:40',
        ]);
            $adm = adminModel::findOrFail($id);
            $adm -> update($validarDados);
            return response()->json(
        [
        "mensagem" => 'Dados alterados com sucesso',
        "admin" => $adm
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
        adminModel::where('id', $id)->delete();
        return response()->json([
            'message'=>"Admin excluído",'code'=>200
        ]);
    }

    public function download(){
        $sql = 'select * from usuario';

        $queryJson = DB::select($sql);

        //Nome do arquivo CSV
        $filename = 'usuarios.csv';

        //Cabeçalho
        $headers = [
            'Content-Type' => 'text/csv;charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $file = fopen('php://output', 'w');

        fclose($file);

        //Gerar o arquivo CSV
        $callback = function () use ($queryJson) {

        $file = fopen('php://output', 'w');

        //Cabeçalho2
        $col1 = "ID";
        $col2 = "Nome";
        $col3 = "Email";

        $escreve = fwrite($file, "$col1;$col2;$col3;");

            foreach($queryJson as $d){
                $data1 = $d->id;
                $data2 = mb_convert_encoding($d->nome,"ISO-8859-1");
                $data3 = $d->email;
                $escreve = fwrite($file, "\n$data1;$data2;$data3;");
            }
            fclose($file);
        };

        //Retorna o arquivo pra download
        return Response::stream($callback, 200, $headers);
    }
}
