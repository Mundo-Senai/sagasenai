<?php
    include '../config/conexao.php';
    
    $email = mysqli_real_escape_string($bd_conexao, $_POST['email']);
    $senha = hash('sha256', mysqli_real_escape_string($bd_conexao, $_POST['senha'] . 'gabriel'));

    $preapre = $bd_conexao->prepare('SELECT * FROM usuarios WHERE email = ? AND senha = ?');
    $preapre->bind_param('ss', $email, $senha);
    $preapre->execute();

    $result = $preapre->get_result();
    if ($result->num_rows == 0) {
        echo'deu errado';
        header("Location: ../../html/login");
        die();
    }

    $preapre->close();
    $bd_conexao->close();

    header("Location: ../../html/dashboard/");