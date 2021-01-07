<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = "nota";

    public function listaTurmas(){
        return $this->belongsToMany("App\Models\Turma","turma_aluno","aluno","turma");
    }

    public function listaAlunos(){
        return $this->belongsToMany("App\Models\Aluno","turma_aluno","turma","aluno");
    }
    
}
