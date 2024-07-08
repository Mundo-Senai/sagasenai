<?php
    include "../../php/config/conexao.php";

    if(isset($_POST['modificar'])) {

        $alterar_sala = mysqli_real_escape_string($bd_conexao, $_POST['sala']);
        $codigo = mysqli_real_escape_string($bd_conexao, $_POST['codigo']);
        $capacidade = mysqli_real_escape_string($bd_conexao, $_POST['capacidade']);
        $curso_id = mysqli_real_escape_string($bd_conexao, $_POST['curso_id']);
        $status = mysqli_real_escape_string($bd_conexao, $_POST['status']);
    
        if(isset($alterar_sala) && isset($codigo) && isset($capacidade) && isset($curso_id) && isset($status)) {
    
            $prepare = $bd_conexao->prepare('UPDATE salas SET codigo = ?, capacidade = ?, curso_id = ?, status = ? WHERE id = ?');
            $prepare->bind_param('siiii', $codigo, $capacidade, $curso_id, $status, $alterar_sala);
            $prepare->execute();
        
            $prepare->close();
            $bd_conexao->close();
    
        }
    } else {
        /*$excluir_sala = mysqli_real_escape_string($bd_conexao, $_POST['sala_excluir']);
        $excluir = $bd_conexao->query("DELETE FROM salas where id = $excluir_sala");*/
    }

    header("Location: ../../html/administrar/index.php");
