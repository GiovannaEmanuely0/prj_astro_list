<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adm')->insert([
            ['nome'=> 'administrador1', 'email'=>'admintarefas@gmail.com', 'senha'=>'adm123'],
            ['nome'=> 'administrador2', 'email'=>'adminusuario@gmail.com', 'senha'=>'adm123'],
            
        ]);
    }
}
