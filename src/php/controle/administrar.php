<?php

    include "../../php/config/conexao.php";


    if(!isset($_POST['excluir'])) {

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
        $curso_deletar = mysqli_real_escape_string($bd_conexao, $_POST['curso_excluir']);
        if ($bd_conexao->query("DELETE FROM cursos WHERE id = $curso_deletar") === TRUE) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . $bd_conexao->error;
          }
          
        $bd_conexao->close();
    }

    header("Location: ../../html/telaGerente/index.php");

