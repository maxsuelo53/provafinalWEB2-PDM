<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $table = "aluno";

    public function listaTurmas(){
        return $this->belongsToMany("App\Models\Turma","turma_aluno","aluno","turma");
    }
}
