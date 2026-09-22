<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        DB::table('tarefa')->insert([
            
            ['titulo'=> 'Estudar POO', 'descricao'=>'Aprender herança, encapsulamento, classes e método...', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'1'],

            ['titulo'=> 'Aula de violão', 'descricao'=>'Estudar os acordes de A, B e F', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'2'],

            ['titulo'=> 'Lavar Louça', 'descricao'=>'lavar pratos, copos e garrafas', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Cuidado', 'usuario_id'=>'3'],

            ['titulo'=> 'Relatório mensal', 'descricao'=>'Preparar o relatório de maio', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'4'],

            ['titulo'=> 'Check-up equipe', 'descricao'=>'Reunião de alinhamento semanal', 'dataInicio'=>'2026-03-23', 'dataTermino'=>'2026-03-30', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'5'],

            ['titulo'=> 'Compor', 'descricao'=>'Compor músicas para o próximo álbum', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Música', 'usuario_id'=>'6'],

            ['titulo'=> 'ENEM', 'descricao'=>'último dia de estudo para o ENEM', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Estudos', 'usuario_id'=>'7'],

            ['titulo'=> 'Fotos', 'descricao'=>'Seção de fotos para o novo single', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Trabalho', 'usuario_id'=>'8'],

            ['titulo'=> 'Gravar Vídeo', 'descricao'=>'Gravar vídeo para o intagram', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-09-25', 'status'=>'Pendente', 'prioridade'=>'Baixa', 'categoria'=>'Lazer', 'usuario_id'=>'9'],

            ['titulo'=> 'Pintar', 'descricao'=>'Pintar a próxima Mona Lisa', 'dataInicio'=>'2026-09-24', 'dataTermino'=>'2026-10-24', 'status'=>'Pendente', 'prioridade'=>'Alta', 'categoria'=>'Lazer', 'usuario_id'=>'10'],

                ['titulo' => 'Planejar Sprint Semanal', 'descricao' => 'Definir as tarefas e metas da equipe para a próxima sprint de desenvolvimento.', 'dataInicio' => '2026-09-25', 'dataTermino' => '2026-09-26', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Trabalho', 'usuario_id' => '1'],
                
                ['titulo' => 'Treinamento de Cardio', 'descricao' => 'Realizar 45 minutos de corrida moderada na esteira e alongamento.', 'dataInicio' => '2026-09-24', 'dataTermino' => '2026-09-24', 'status' => 'Pendente', 'prioridade' => 'Média', 'categoria' => 'Saúde', 'usuario_id' => '2'],
                
                ['titulo' => 'Comprar Mantimentos', 'descricao' => 'Ir ao supermercado comprar frutas, verduras, ovos e itens de limpeza.', 'dataInicio' => '2026-09-23', 'dataTermino' => '2026-09-23', 'status' => 'Pendente', 'prioridade' => 'Baixa', 'categoria' => 'Casa', 'usuario_id' => '3'],
                
                ['titulo' => 'Ler Livro de Arquitetura Limpa', 'descricao' => 'Avançar do capítulo 4 ao capítulo 6 sobre princípios SOLID.', 'dataInicio' => '2026-09-26', 'dataTermino' => '2026-10-02', 'status' => 'Pendente', 'prioridade' => 'Média', 'categoria' => 'Estudos', 'usuario_id' => '4'],
                
                ['titulo' => 'Revisar Declaração de Impostos', 'descricao' => 'Conferir os documentos fiscais pendentes antes do prazo final.', 'dataInicio' => '2026-09-27', 'dataTermino' => '2026-09-29', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Finanças', 'usuario_id' => '5'],
                
                ['titulo' => 'Configurar Servidor de Produção', 'descricao' => 'Instalar Docker, configurar Nginx e subir os containers da aplicação.', 'dataInicio' => '2026-09-28', 'dataTermino' => '2026-09-30', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Trabalho', 'usuario_id' => '6'],
                
                ['titulo' => 'Consulta Médica de Rotina', 'descricao' => 'Comparecer à consulta anual com o cardiologista.', 'dataInicio' => '2026-10-01', 'dataTermino' => '2026-10-01', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Saúde', 'usuario_id' => '7'],
                
                ['titulo' => 'Manutenção do Carro', 'descricao' => 'Levar o veículo para troca de óleo e alinhamento.', 'dataInicio' => '2026-09-25', 'dataTermino' => '2026-09-25', 'status' => 'Pendente', 'prioridade' => 'Média', 'categoria' => 'Casa', 'usuario_id' => '8'],
                
                ['titulo' => 'Curso de Inglês Avançado', 'descricao' => 'Assistir às aulas de phrasal verbs e realizar os exercícios práticos.', 'dataInicio' => '2026-09-22', 'dataTermino' => '2026-09-28', 'status' => 'Pendente', 'prioridade' => 'Média', 'categoria' => 'Estudos', 'usuario_id' => '9'],
                
                ['titulo' => 'Organizar Investimentos', 'descricao' => 'Aportar na carteira de ações e revisar a renda fixa.', 'dataInicio' => '2026-09-29', 'dataTermino' => '2026-09-30', 'status' => 'Pendente', 'prioridade' => 'Baixa', 'categoria' => 'Finanças', 'usuario_id' => '10'],
                
                ['titulo' => 'Desenvolver API RESTful', 'descricao' => 'Criar rotas de autenticação com JWT e documentar com Swagger.', 'dataInicio' => '2026-09-23', 'dataTermino' => '2026-09-30', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Trabalho', 'usuario_id' => '3'],
                
                ['titulo' => 'Pintura da Sala de Estar', 'descricao' => 'Comprar tinta, fita crepe e iniciar a pintura da parede principal.', 'dataInicio' => '2026-10-03', 'dataTermino' => '2026-10-05', 'status' => 'Pendente', 'prioridade' => 'Baixa', 'categoria' => 'Casa', 'usuario_id' => '1'],
                
                ['titulo' => 'Preparar Apresentação de Vendas', 'descricao' => 'Montar os slides com as métricas do último trimestre para a diretoria.', 'dataInicio' => '2026-09-24', 'dataTermino' => '2026-09-25', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Trabalho', 'usuario_id' => '5'],
                
                ['titulo' => 'Maratona de Yoga', 'descricao' => 'Completar 5 sessões semanais de yoga para flexibilidade e foco.', 'dataInicio' => '2026-09-22', 'dataTermino' => '2026-09-28', 'status' => 'Pendente', 'prioridade' => 'Baixa', 'categoria' => 'Saúde', 'usuario_id' => '8'],
                
                ['titulo' => 'Estudar Algoritmos de Grafos', 'descricao' => 'Praticar resolução de problemas utilizando busca em largura (BFS) e profundidade (DFS).', 'dataInicio' => '2026-09-26', 'dataTermino' => '2026-10-04', 'status' => 'Pendente', 'prioridade' => 'Alta', 'categoria' => 'Estudos', 'usuario_id' => '2'],
            
        ]);
    }
}
