<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmaAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_aluno', function (Blueprint $table) {
            $table->unsignedBigInteger("turma");
            $table->unsignedBigInteger("aluno");
            $table->foreign("turma")->references("id")->on("turma");
            $table->foreign("aluno")->references("id")->on("aluno");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_aluno');
    }
}
