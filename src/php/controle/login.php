<?php
    include '../config/conexao.php';
    
    // $email = mysqli_real_escape_string($bd_conexao, $_POST['email']);
    // $senha = password_hash(mysqli_real_escape_string($bd_conexao, $_POST['senha']), PASSWORD_DEFAULT, [12]);

    $preapre = $bd_conexao->prepare('SELECT * FROM usuarios WHERE email = ? AND senha = ?');
    $preapre->bind_param('ss', $email, $senha);
    $preapre->execute();

    $result = $preapre->get_result();
    if ($result->num_rows == 0) {
        echo'deu errado';
        die();
    }

    echo 'deu certo';

    $preapre->close();
    $bd_conexao->close();
