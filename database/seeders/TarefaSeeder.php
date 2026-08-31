<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class tarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarefa')->insert([
            
            ['titulo'=> 'Estudar POO', 'descricao'=>'Aprender herança, encapsulamento, classes e método...', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'38'],

            ['titulo'=> 'Aula de violão', 'descricao'=>'Estudar os acordes de A, B e F', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'39'],

            ['titulo'=> 'Lavar Louça', 'descricao'=>'lavar pratos, copos e garrafas', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Cuidado', 'usuario_id'=>'40'],

            ['titulo'=> 'Relatório mensal', 'descricao'=>'Preparar o relatório de maio', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'41'],

            ['titulo'=> 'Check-up equipe', 'descricao'=>'Reunião de alinhamento semanal', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'42'],

            ['titulo'=> 'Compor', 'descricao'=>'Compor músicas para o próximo álbum', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Música', 'usuario_id'=>'43'],

            ['titulo'=> 'ENEM', 'descricao'=>'último dia de estudo para o ENEM', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'44'],

            ['titulo'=> 'Fotos', 'descricao'=>'Seção de fotos para o novo single', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'45'],

            ['titulo'=> 'Gravar Vídeo', 'descricao'=>'Gravar vídeo para o intagram', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-09-25', 'status'=>'Pendente', 'prioridade'=>'Baixa', 'categoria'=>'Lazer', 'usuario_id'=>'45'],

            ['titulo'=> 'Pintar', 'descricao'=>'Pintar a próxima Mona Lisa', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Lazer', 'usuario_id'=>'47'],
            
        ]);
    }
}
