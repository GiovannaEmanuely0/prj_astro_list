<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarefaModel extends Model
{
    use HasFactory;

    protected $table = 'tarefa';

    public $fillable = ['id','titulo','descricao','dataInicio','dataTermino','status','prioridade','categoria','usuario_id','created_at','updated_at'];

    public $timestamps = false;

}
