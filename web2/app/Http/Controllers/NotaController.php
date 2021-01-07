<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Nota;

class NotaController extends Controller
{

    public function index()
    {
        $nota = new Nota();
        $notas = Nota::All();
        $turmas = Turma::All();
        $alunos = Aluno::All();

        return view("nota.index",[
            "nota" => $nota,
            "notas" => $notas,
            "turmas" => $turmas,
            "alunos" => $alunos

        ]);
    }


    public function store(Request $request)
    {
        $validacao = $request->validate([
            "nota_aluno"=>"required"
        ],[
            "*.required"=>"(:attribute) é obrigatório!"
        ]);

        if($request->get("id")==""){
            $nota = new Nota();
		}else {
            $nota = Nota::find($request->get("id"));
        }
        $nota->nota_aluno = $request->get("nota_aluno");
        $nota->aluno = $request->get("aluno");
        $nota->save();

        $nota -> listaTurmas() ->detach();

        $request->Session()->flash("salvar","Nota salva com sucesso!");
        
        return redirect("/nota");
    }

    public function edit($id)
    {
        $nota = Nota::find($id);
        $notas = Notas::All();
        $turmas = Turma::All();
        $alunos = Alunos::All();

        return view("nota.index",[
            "nota" => $nota,
            "notas" => $notas,
            "turmas" => $turmas,
            "alunos" => $alunos

        ]);
    }

    public function destroy(Request $request, $id)
    {
        $nota = Nota::find($id);
        $nota -> listaTurmas() ->detach();
        Nota::destroy($id);

        $request->Session()->flash("excluir","Nota excluido com sucesso!");
		return redirect("/nota");
    }
}
