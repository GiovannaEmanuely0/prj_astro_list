<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefa', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->date('dataInicio');
            $table->date('dataTermino');
            $table->enum('status',['Pendente', 'Em Progresso', 'Concluída']);
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta']);
            $table->string('categoria');
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa');
    }
};
