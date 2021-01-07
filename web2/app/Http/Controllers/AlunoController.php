<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno = new Aluno();
        $alunos = Aluno::All();
        $turmas = Turma::All();

        return view("aluno.index",[
            "aluno" => $aluno,
            "alunos" => $alunos,
            "turmas" => $turmas

        ]);
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $request->validate([
            "nome_aluno"=>"required",
            "email_aluno"=> "required",
            "matricula" => "required|numeric"
        ],[
            "*.required"=>"(:attribute) é obrigatório!"
        ]);

        if($request->get("id")==""){
            $aluno = new Aluno();
		}else {
            $aluno = Aluno::find($request->get("id"));
        }
        $aluno->nome_aluno = $request->get("nome_aluno");
        $aluno->email_aluno = $request->get("email_aluno");
        $aluno->matricula = $request->get("matricula");
        $aluno->save();

        $aluno -> listaTurmas() ->detach();

        foreach($request->get("turma") as $turma){
            $aluno -> listaTurmas() ->attach($turma);
        }

        $request->Session()->flash("salvar","Aluno salvo com sucesso!");
        
        return redirect("/aluno");
    }


    public function edit($id)
    {
        $aluno = Aluno::find($id);
        $alunos = Aluno::All();
        $turmas = Turma::All();

        return view("aluno.index",[
            "aluno" => $aluno,
            "alunos" => $alunos,
            "turmas" => $turmas

        ]);
    }

   

    public function destroy(Request $request, $id)
    {
        $aluno = Aluno::find($id);
        $aluno -> listaTurmas() ->detach();
        Aluno::destroy($id);

        $request->Session()->flash("excluir","Aluno excluido com sucesso!");
		return redirect("/aluno");
    }
}
