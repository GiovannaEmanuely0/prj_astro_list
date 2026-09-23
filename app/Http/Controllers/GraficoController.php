<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\tarefaModel;
use Illuminate\Http\Request;


class GraficoController extends Controller
{
    public function index()
    {
        return view('nivelUsuario.dashboardGraficos');
    }

    public function tarefasPorPrioridade()
    {
        $tarefas = tarefaModel::where('usuario_id', auth()->id())->get();

        $prioridades = $tarefas
            ->groupBy('prioridade')
            ->map(function ($tarefas) {
                return $tarefas->count();
            });

        return response()->json($prioridades);
    }

    public function tarefasPorCategoria()
    {
        $tarefas = tarefaModel::where('usuario_id', auth()->id())->get();

        $categorias = $tarefas
            ->groupBy('categoria')
            ->map(function ($tarefas) {
                return $tarefas->count();
            });

        return response()->json($categorias);
    }

    public function tarefasPorStatus()
    {
        $tarefas = tarefaModel::where('usuario_id', auth()->id())->get();

        $status = $tarefas
            ->groupBy('status')
            ->map(function ($tarefas) {
                return $tarefas->count();
            });

        return response()->json($status);
    }

    public function tarefasPorData()
    {
        $tarefas = tarefaModel::where('usuario_id', auth()->id())
            ->orderBy('dataInicio')
            ->get();

        $datas = $tarefas
            ->groupBy('dataInicio')
            ->map(function ($tarefas) {
                return $tarefas->count();
            });

        return response()->json($datas);
    }
}
