<?php
    
    include "../../php/config/conexao.php";

    $nome = mysqli_real_escape_string($bd_conexao, $_POST['nome']);
    $data_inicio = mysqli_real_escape_string($bd_conexao, $_POST['data_inicio']);
    $data_fim = mysqli_real_escape_string($bd_conexao, $_POST['data_fim']);
    $professor = mysqli_real_escape_string($bd_conexao, $_POST['professor']);
    $descricao = mysqli_real_escape_string($bd_conexao, $_POST['descricao']);

    if(isset($nome) && isset($data_inicio) && isset($data_fim) && isset($professor) && isset($descricao)) {

        $prepare = $bd_conexao->prepare('INSERT INTO cursos(nome_curso, data_inicio, data_fim, professor_id, descricao) VALUES (?, ?, ?, ?, ?)');
        $prepare->bind_param('sssis', $nome, $data_inicio, $data_fim, $professor, $descricao);
        $prepare->execute();
    
        $prepare->close();
        $bd_conexao->close();

    }

    header("Location: ../../html/");