<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            ['nome'=> 'Penelope', 'email'=>'penelope20@gmail.com', 'senha'=>'Odisseu20'],
            ['nome'=> 'Pepino Gentille da Silva', 'email'=>'leguminoso67@gmail.com', 'senha'=>'12345678'],
            ['nome'=> 'Anna Baptista', 'email'=>'aninhazl@gmail.com', 'senha'=>'12345678'],
            ['nome'=> 'Giovanna', 'email'=>'giovanna@gmail.com', 'senha'=>'12345678'],
            ['nome'=> 'Taylor Swift', 'email'=>'swift1989@gmail.com', 'senha'=>'Sh4k3It0ff'],
            ['nome'=> 'Olivia Isabel Rodrigo', 'email'=>'imjustasourgirl@gmail.com', 'senha'=>'Driv3rsLic3ns3'],
            ['nome'=> 'Harry Styles', 'email'=>'harryzinho@gmail.com', 'senha'=>'StylesHarry'],
            ['nome'=> 'Bruno Mars', 'email'=>'brunomoon@gmail.com', 'senha'=>'DieWithASmile'],
            ['nome'=> 'Albert Eistain', 'email'=>'apenasumcararelativo@gmail.com', 'senha'=>'Interestelar'],
            ['nome'=> 'Leonardo Da Vinci', 'email'=>'codigoda20@gmail.com', 'senha'=>'vitruviano'],
            
        ]);
    }
}
