<?php

include "../config/conexao.php";

    $sala_alterado = $_POST['sala_alterado'];

    $info_sala = $bd_conexao->query("SELECT * FROM salas INNER JOIN cursos ON salas.curso_id = cursos.id where salas.id = '$sala_alterado'");
    $info_sala_assoc = $info_sala->fetch_assoc();
    $info_curso = $info_sala_assoc['curso_id'];

    echo
    '<input type="text" placeholder="Alterar Codigo" name="nome" value="'.$info_sala_assoc['codigo'].'">
    <input type="number" placeholder="Alterar Capacidade name="capacidade" value="'.$info_sala_assoc['capacidade'].'">
    <select name="curso_id">';
    if($info_sala->num_rows > 0) {
        echo "<option value='".$info_sala_assoc['id']."'>".$info_sala_assoc['nome_curso']."</option>";

        $info_cursos = $bd_conexao->query("SELECT * FROM cursos where id != '$info_curso'");
        
        for($i=1; $i <= $info_cursos->num_rows; $i++) {
            $info_cursos_assoc = $info_cursos->fetch_assoc();
            echo "<option value='".$info_cursos_assoc['id']."'>".$info_cursos_assoc['nome_curso']."</option>";
        }
    }
    echo "</select>";

    echo 
    '<select name="Status">
    <option value="1">Aberto</option>
    <option value="2">Fechado</option>
    <option value="3">Interditado</option>              //ARRUMAR A ORDEM DOS STATUS E AUTOMATIZAR
    </select>';

?>

