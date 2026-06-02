<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    public $fillable = ['id','nome','email','senha','created_at','updated_at'];

    public $timestamps = false;
}
