<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $table = "turma";

    public function listaAlunos(){
        return $this->belongsToMany("App\Models\Aluno","turma_aluno","turma","aluno");
    }
}
