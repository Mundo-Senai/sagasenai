<?php
    
    include "../../php/config/conexao.php";

    $codigo = mysqli_real_escape_string($bd_conexao, $_POST['codigo']);
    $capacidade = mysqli_real_escape_string($bd_conexao, $_POST['capacidade']);
    $curso = mysqli_real_escape_string($bd_conexao, $_POST['curso']);
    $status = 1;

    if(isset($codigo) && isset($capacidade) && isset($curso)) {

        $prepare = $bd_conexao->prepare('INSERT INTO salas(codigo, capacidade, curso_id, status) VALUES (?, ?, ?, ?)');
        $prepare->bind_param('sssi', $codigo, $capacidade, $curso, $status);
        $prepare->execute();
    
        $prepare->close();
        $bd_conexao->close();

    }

    header("Location: ../../html/dashboard/");