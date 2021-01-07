@extends("template.app")

@section("nome_tela","Turma")

@section("cadastro")
    <h1 class="text-uppercase font-weight-bold text-center ">Cadastro de Turmas</h1>
    <form action="/turma" method="POST" class="row">
        <div class="form-group col-7">
            <label>Nome do turma:</label>
            <input type="text" name="nome_turma" value="{{ $turma->nome_turma }}" class="form-control"/>
        </div>
        <div class="form-group col-3" >
            <label>Nome do curso:</label>
            <input type="text" name="nome_curso" value="{{ $turma->nome_curso }}" class="form-control"/>
        </div>
        <div class="form-group col-6">
			@csrf
			<input type="hidden" name="id" value="{{ $turma->id }}" class="form-control" />
			<button type="submit" class="btn btn-success botao">
				<i class="fa fa-save"></i> Salvar
			</button>
			<a href="/turma" class="btn btn-primary botao">
				<i class="fa fa-plus"></i> Novo
			</a>
		</div>        
    </form>
@endsection

@section ("listagem")

		<table class="table table-striped">
			<thead>
				<tr>
					<th >Nome</th>
					<th >Curso</th>
				</tr>
			</thead>
			<tbody">
				@foreach ($turmas as $turma)
					<tr >
						<td >{{ $turma->nome_turma }}</td>
						<td >{{ $turma->nome_curso }}</td>
						<td >
							<a href="/turma/{{$turma->id}}/edit" class="btn btn-warning">
								<i class="fa fa-edit"></i> Editar
							</a>
						</td>
						<td >
							@if($turma->listaAlunos()->count()==0)
								<form action="/turma/{{$turma->id}}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="delete" />
									<button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente exlcuir?');">
										<i class="fa fa-trash"></i> Excluir
									</button>
								</form>
							@else
								Aluno vinculado a essa turma!
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

@endsection