<?php
    include '../config/conexao.php';
    
    $email = mysqli_real_escape_string($bd_conexao, $_POST['email']);
    $nome = mysqli_real_escape_string($bd_conexao, $_POST['nome']);
    $senha = password_hash(mysqli_real_escape_string($bd_conexao, $_POST['senha']), PASSWORD_DEFAULT, [12]);
    $papel = mysqli_real_escape_string($bd_conexao, $_POST['papel']);

    $preapre = $bd_conexao->prepare('INSERT INTO usuarios(email, nome, senha, papel) VALUES (?, ?, ?, ?)');
    $preapre->bind_param('ssss', $nome, $data_inicio, $data_fim, $professor);
    $preapre->execute();


    