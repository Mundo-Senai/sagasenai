<?php
    include "../../php/config/conexao.php";

    if(!$_POST['excluir_sala']) {

        $alterar_curso = mysqli_real_escape_string($bd_conexao, $_POST['curso']);
        $nome = mysqli_real_escape_string($bd_conexao, $_POST['nome']);
        $data_inicio = mysqli_real_escape_string($bd_conexao, $_POST['data_inicio']);
        $data_fim = mysqli_real_escape_string($bd_conexao, $_POST['data_fim']);
        $professor = mysqli_real_escape_string($bd_conexao, $_POST['professor']);
        $descricao = mysqli_real_escape_string($bd_conexao, $_POST['descricao']);
    
        if(isset($nome) && isset($data_inicio) && isset($data_fim) && isset($professor) && isset($descricao) && isset($alterar_curso)) {
    
            $prepare = $bd_conexao->prepare('UPDATE cursos SET nome_curso = ?, data_inicio = ?, data_fim = ?, professor_id = ?, descricao = ? WHERE id = ?');
            $prepare->bind_param('sssisi', $nome, $data_inicio, $data_fim, $professor, $descricao, $alterar_curso);
            $prepare->execute();
        
            $prepare->close();
            $bd_conexao->close();
    
        }
    } else {
        $excluir_sala = mysqli_real_escape_string($bd_conexao, $_POST['sala_excluir']);
        $excluir = $bd_conexao->query("DELETE FROM salas where id = $excluir_sala");
    }

    header("Location: ../../html/administrar/index.php");
