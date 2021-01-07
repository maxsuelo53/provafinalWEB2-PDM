<!DOCTYPE html>

<html>
    <head>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/all.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/custom.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/bootstrap-select.css')}}" />
		<script src="{{ asset('js/jquery.js') }}"> </script>
		<script src="{{ asset('js/custom.js') }}"> </script>
		<script src="{{ asset('js/bootstrap.bundle.js') }}"> </script>
		<script src="{{ asset('js/bootstrap-select.js') }}"> </script>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
		<script src="{{ asset('js/bancodados.js') }}"> </script>

		<title>PAGINA - @yield("nome_tela")</title>
	</head>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <ul class="navbar-nav menu">
                <li class="nav-item"><a class="nav-link"href="/"><i class="fas fa-home"></i> HOME</a></li>
                <li class="nav-item"><a class="nav-link"href="/turma"><i class="fas fa-home"></i> TURMA</a></li>
                <li class="nav-item"><a class="nav-link"href="/aluno"><i class="fas fa-home"></i> ALUNO</a></li>
				<li class="nav-item"><a class="nav-link"href="/nota"><i class="fas fa-home"></i> NOTA</a></li>
            </ul>
        </nav>

        @if (Session::has("salvar"))
			<div class="alert alert-success">
				{{ Session::get("salvar") }}
			</div>
		@endif
		@if (Session::has("excluir"))
			<div class="alert alert-danger">
				{{ Session::get("excluir") }}
			</div>
		@endif


		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $erro)
						<li>{{$erro}}</li>
					@endforeach
				</ul>
			</div>

		@endif
		
		@if(!request()->is("/"))
			<div class="container">
				<div class="cadastro">
					@yield("cadastro")
				</div>
				<div class="listagem">
					@yield("listagem")
				</div>
			</div>
		@else
			<div>
			</div>
		@endif		
	</body>
</html>