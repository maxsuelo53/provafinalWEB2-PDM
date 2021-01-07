var firebaseConfig = {
    apiKey: "AIzaSyCQAdUVLTr7UPCejB9KoxxZdvYPybCYsLc",
    authDomain: "prova2-c081d.firebaseapp.com",
    databaseURL: "https://prova2-c081d-default-rtdb.firebaseio.com",
    projectId: "prova2-c081d",
    storageBucket: "prova2-c081d.appspot.com",
    messagingSenderId: "587604753970",
    appId: "1:587604753970:web:3d53c3df0790fc3930c62b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  var alunosDB = firebase.database().ref("aluno");
  var aluno = [];

function ativaPage(){
	
	document.getElementById("tela-inicial").style ="";
	document.getElementById("tela-login").style = "display:none;";
	
}


function consulta(){

	var analise = 0;
	var matricula = $("#matricula").val();
	var html ="";


		alunosDB.once("value",function(alunos){

			alunos.forEach(function(aluno){
				if ( matricula == aluno.val().matricula){
					analise = 1;
					html+=mostraDados(aluno.val());
					$("#dados").html(html);
				}			
			});
			if (analise == 1){
				ativaPage();	
			}else{
				alert("erro");
			}
		});
	
}


function mostraDados(aluno){
	var html="";

	html+= "<span class='card-title black center-align'>Dados do aluno</span><h5>Nome:"+aluno.nome+"</h5><h5>Email:"+aluno.email+"</h5>";

	return html;
}
