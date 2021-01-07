@extends("template.app")

@section("nome_tela","Nota")

@section("cadastro")
    <h1 class="text-uppercase font-weight-bold text-center ">Cadastro de notas</h1>
    <form action="/nota" method="POST" class="row">
        <div class="form-group col-3" >
            <label>Turma:</label>
            <select id="turma" name="turma" class="form-control" required >
				@foreach ($turmas as $turma)					
						<option value="{{ $turma->id }}">{{ $turma->nome_turma}} </option>
				@endforeach
			</select>
        </div>

        <div class="form-group col-3" >
            <label>Aluno:</label>
            <select id="aluno" name="aluno" class="form-control" required >
				@foreach ($alunos as $aluno)
                    @if ( ($aluno->listaTurmas()->where("id", "turma")) )
						<option value="{{ $aluno->id }}">{{ $aluno->nome_aluno}} </option>
                    @endif
				@endforeach
			</select>
        </div>

        <div class="form-group col-2">
            <label>Nota:</label>
            <select name="nota_aluno" class="form-control" required>
                <option value="" selected></option>
                <option value="1">1<option ><option value="2">2<option>
                <option value="3">3<option ><option value="4">4<option>
                <option value="5">5<option ><option value="6">6<option>
                <option value="7">7<option ><option value="8">8<option>
                <option value="9">9<option ><option value="10">10<option>
            </select>
        </div>

        <div class="form-group col-6">
			@csrf
			<input type="hidden" name="id" value="{{ $nota->id }}" class="form-control" />
			<button type="submit" class="btn btn-success botao">
				<i class="fa fa-save"></i> Salvar
			</button>
			<a href="/nota" class="btn btn-primary botao">
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
					<th >Nota</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($notas as $nota)
					<tr >
						<td >{{ $nota->aluno }}</td>
						<td >{{ $nota->nota_aluno }}</td>
						<td >
							<a href="/nota/{{$nota->id}}/edit" class="btn btn-warning">
								<i class="fa fa-edit"></i> Editar
							</a>
						</td>
						<td >
							<form action="/nota/{{$nota->id}}" method="POST">
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