<?php
    
    include "../../php/config/conexao.php";

    $nome = mysqli_real_escape_string($bd_conexao, $_POST['codigo']);
    $data_inicio = mysqli_real_escape_string($bd_conexao, $_POST['data_inicio']);
    $data_fim = mysqli_real_escape_string($bd_conexao, $_POST['data_fim']);
    $professor = mysqli_real_escape_string($bd_conexao, $_POST['professor']);
    
    $preapre = $bd_conexao->prepare('INSERT INTO cursos(nome, data_inicio, data_fim, professor_id) VALUES (?, ?, ?, ?)');
    $preapre->bind_param('ssss', $nome, $data_inicio, $data_fim, $professor);
    $preapre->execute();

    $preapre->close();
    $bd_conexao->close();