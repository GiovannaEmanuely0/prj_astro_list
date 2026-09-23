<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tarefaModel;
use App\Models\UserModel;

//Arquivos CSV
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class tarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Auth::user()->tarefas();

        if ($request->filled('busca')) {
            $query->where('titulo', 'like', '%' . $request->busca . '%');
        }

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('dataInicioFiltro') && $request->filled('dataFimFiltro')) {
            $query->whereBetween('dataInicio', [
                $request->dataInicioFiltro,
                $request->dataFimFiltro,
            ]);
        } elseif ($request->filled('dataInicioFiltro')) {
            $query->whereDate('dataInicio', '>=', $request->dataInicioFiltro);
        } elseif ($request->filled('dataFimFiltro')) {
            $query->whereDate('dataInicio', '<=', $request->dataFimFiltro);
        }

        $tarefas = $query->orderBy('dataInicio')->get();

        $categoriasDisponiveis = Auth::user()->tarefas()
            ->select('categoria')
            ->distinct()
            ->pluck('categoria');

        return view('dashboard', compact('tarefas', 'categoriasDisponiveis'));
    }

    public function indexApi(Request $request)
    {
        $query = tarefaModel::query();

        if ($request->busca) {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->busca . '%')
                ->orWhere('descricao', 'like', '%' . $request->busca . '%');
            });
        }

        if ($request->categoria) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->prioridade) {
            $query->where('prioridade', $request->prioridade);
        }

        $tarefas = $query->get();

        $categorias = tarefaModel::select('categoria')
            ->distinct()
            ->pluck('categoria');

        return response()->json([
            'tarefas' => $tarefas,
            'categorias' => $categorias
        ]);
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
        $validated = $request->validate([
            'titulo'       => 'required|string|max:255',
            'descricao'    => 'required|string',
            'dataInicio'   => 'required|date',
            'dataTermino'  => 'required|date|after_or_equal:dataInicio',
            'prioridade'   => 'required|in:Alta,Média,Baixa',
            'status'       => 'required|in:Em Andamento,Concluída,Pendente',
            'categoria'    => 'required|string|max:100',
        ]);

        Auth::user()->tarefas()->create($validated);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa cadastrada com sucesso!');
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
        $tarefa = Auth::user()->tarefas()->findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa removida.');
    }

    public function destroyApi($id)
    {
        return response()->json([
            'id_recebido' => $id,
            'mensagem' => 'Chegou no destroyApi'
        ]);
    }

    public function download(){
        $sql = 'select * from tarefa';

        $queryJson = DB::select($sql);

        //Nome do arquivo CSV
        $filename = 'tarefas.csv';

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
        $col3 = "Descricao";

        $escreve = fwrite($file, "$col1;$col2;$col3;");

            foreach($queryJson as $d){
                $data1 = $d->id;
                $data2 = mb_convert_encoding($d->titulo,"ISO-8859-1");
                $data3 = $d->descricao;
                $escreve = fwrite($file, "\n$data1;$data2;$data3;");
            }
            fclose($file);
        };

        //Retorna o arquivo pra download
        return Response::stream($callback, 200, $headers);
    }

    public function listaPorIdAPI($id){
        $tarefa = tarefaModel::where('id', '=',$id)->get();

        return response()->json($tarefa);
    }
}
