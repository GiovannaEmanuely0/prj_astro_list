<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminModel extends Model
{
    use HasFactory;

    protected $table = 'adm';

    public $fillable = ['id','nome','email','senha','created_at','updated_at'];

    
}
