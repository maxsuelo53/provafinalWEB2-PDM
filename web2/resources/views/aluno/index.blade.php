@extends("template.app")

@section("nome_tela","Aluno")

@section("cadastro")
    <h1 class="text-uppercase font-weight-bold text-center ">Cadastro de alunos</h1>
    <form action="/aluno" method="POST" class="row">
        <div class="form-group col-7">
            <label>Nome do aluno:</label>
            <input type="text" name="nome_aluno" id="nome" value="{{ $aluno->nome_aluno }}" class="form-control"/>
        </div>
        <div class="form-group col-3" >
            <label>Matricula do aluno:</label>
            <input type="text" name="matricula" id="matricula" value="{{ $aluno->matricula }}" class="form-control"/>
        </div>
        <div class="form-group col-6">
            <label>Email do aluno:</label>
            <input type="text" name="email_aluno" id="email" value="{{ $aluno->email_aluno }}" class="form-control"/>
        </div>
		<div class="form-group col-4">
			<label>Turmas</label>
			<select id="turma" name="turma[]" class="form-control" required multiple>
				@foreach ($turmas as $turma)
					@if ($aluno->listaTurmas()->where("id", $turma->id)->count()>0)
						<option value="{{ $turma->id }}" selected="selected">{{ $turma->nome_turma}} </option>
					@else
						<option value="{{ $turma->id }}">{{ $turma->nome_turma}} </option>
					@endif
				@endforeach
			</select>
		</div>
        <div class="form-group col-6">
			@csrf
			<input type="hidden" name="id" value="{{ $aluno->id }}" class="form-control" />
			<button type="submit" class="btn btn-success botao">
				<i class="fa fa-save"></i> Salvar
			</button>
			<script>
				$(document).ready(function(){
					add();
				});
			</script>
			<a href="/aluno" class="btn btn-primary botao">
				<i class="fa fa-plus"></i> Novo
			</a>
		</div>    
	</form>


	<script>
		$(document).ready(function(){
			$("#turma").selectpicker("refresh")
		});
	</script>
@endsection

@section ("listagem")

		<table class="table table-striped">
			<thead>
				<tr>
					<th >Nome</th>
					<th >Email</th>
					<th >Matrícula</th>
					<th >Turmas</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($alunos as $aluno)
					<tr >
						<td >{{ $aluno->nome_aluno }}</td>
						<td >{{ $aluno->email_aluno }}</td>
						<td >{{ $aluno->matricula }}</td>
						<td >
							<ul>
								@foreach ($aluno->listaTurmas as $alunoTurmas)
								<li>{{ $alunoTurmas->nome_turma }}</li>
								@endforeach
							</ul>
						</td>
						<td >
							<a href="/aluno/{{$aluno->id}}/edit" class="btn btn-warning">
								<i class="fa fa-edit"></i> Editar
							</a>
						</td>
						<td >
							<form action="/aluno/{{$aluno->id}}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="delete" />
								<button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente exlcuir?');">
									<i class="fa fa-trash"></i> Excluir
								</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

@endsection