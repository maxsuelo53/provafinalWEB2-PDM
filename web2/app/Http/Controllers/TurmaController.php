<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{

    public function index()
    {
        $turma = new Turma();
        $turmas = Turma::All();

        return view("turma.index",[
            "turma" => $turma,
            "turmas" => $turmas

        ]);
    }

  
    public function store(Request $request)
    {
        $validacao = $request->validate([
            "nome_turma"=>"required",
            "nome_curso"=> "required"
        ],[
            "*.required"=>"(:attribute) é obrigatório!"
        ]);

        if($request->get("id")==""){
            $turma = new Turma();
		}else {
            $turma = Turma::find($request->get("id"));
        }
        $turma->nome_turma = $request->get("nome_turma");
        $turma->nome_curso = $request->get("nome_curso");
        $turma->save();

        $request->Session()->flash("salvar","turma salvo com sucesso!");
        
        return redirect("/turma");
    }

    public function edit($id)
    {
        $turma = Turma::find($id);
        $turmas = Turma::All();

        return view("turma.index",[
            "turma" => $turma,
            "turmas" => $turmas
        ]);
    }

    public function destroy(Request $request, $id)
    {
        Turma::destroy($id);

        $request->Session()->flash("excluir","Turma excluido com sucesso!");
		return redirect("/turma");
    }
}
