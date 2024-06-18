<?php
    include '../config/conexao.php';
    
    $email = mysqli_real_escape_string($bd_conexao, $_POST['email']);
    $nome = mysqli_real_escape_string($bd_conexao, $_POST['nome']);
    $senha = password_hash(mysqli_real_escape_string($bd_conexao, $_POST['senha']), PASSWORD_DEFAULT, [12]);
    $papel = mysqli_real_escape_string($bd_conexao, $_POST['papel']);



    function Registro ($bd_conexao, $email, $nome, $senha, $papel) {
        $verificarEmail  = mysqli_query($bd_conexao, "INSERT INTO usuarios (email, nome, senha, papel) VALUES ('$email', '$nome', '$senha', '$papel')");
    }
    echo Registro($bd_conexao, 'teste@gmail', 'teste', 'teste', 1);


    