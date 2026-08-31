<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class userModel extends Authenticatable 
{
    use Notifiable;

    protected $table = 'usuario';

    protected $fillable = [
        'id','nome','email','senha',
    ];

    protected $hidden = ['senha',];

    public function tarefas()
    {
        return $this->hasMany(tarefaModel::class, 'usuario_id');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}