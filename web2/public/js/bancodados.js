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


  function add(){
    var aluno = {"nome": $("#nome").val(), "email":$("#email").val(),"matricula": $("#matricula").val()};

    alunosDB.push(aluno);
    $("#nome").val("");
    $("#email").val("");
    $("#matricula").val("");
}


