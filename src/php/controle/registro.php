<?php
    include '../config/conexao.php';
    
    $email = mysqli_real_escape_string($bd_conexao, $_POST['email']);
    $nome = mysqli_real_escape_string($bd_conexao, $_POST['nome']);
    $senha = password_hash(mysqli_real_escape_string($bd_conexao, $_POST['senha']), PASSWORD_DEFAULT, [12]);
    $papel = mysqli_real_escape_string($bd_conexao, $_POST['papel']);

    if(isset($_POST['curso'])) {
        $curso = mysqli_real_escape_string($bd_conexao, $_POST['curso']);
    } else {
        $curso = 0;
    }

    if($curso == 0 || $curso == "") {
        $curso = null;
    }


    if(isset($email) && isset($nome) && isset($senha) && isset($papel)) {

        $preapre = $bd_conexao->prepare('INSERT INTO usuarios(email, nome, senha, papel, cursos_id) VALUES (?, ?, ?, ?, ?)');
        $preapre->bind_param('sssis', $email, $nome, $senha, $papel, $curso);
        $preapre->execute();
    
        $preapre->close();
        $bd_conexao->close();

    }

    header("Location: ../../index.php");


    