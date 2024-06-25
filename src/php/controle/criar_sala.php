<?php
    
    include "../../php/config/conexao.php";

    $codigo = mysqli_real_escape_string($bd_conexao, $_POST['codigo']);
    $capacidade = mysqli_real_escape_string($bd_conexao, $_POST['capacidade']);
    $curso = mysqli_real_escape_string($bd_conexao, $_POST['curso']);

    if(isset($codigo) && isset($capacidade) && isset($curso)) {

        $prepare = $bd_conexao->prepare('INSERT INTO salas(codigo, capacidade, curso_id) VALUES (?, ?, ?)');
        $prepare->bind_param('sis', $codigo, $capacidade, $curso);
        $prepare->execute();
    
        $prepare->close();
        $bd_conexao->close();

    }

    header("Location: ../html/index.html");