<?php

include "../config/conexao.php";

    $sala_alterado = $_POST['sala_alterado'];

    $info_sala = $bd_conexao->query("SELECT * FROM salas INNER JOIN cursos ON salas.curso_id = cursos.id where salas.id = '$sala_alterado'");
    $info_sala_assoc = $info_sala->fetch_assoc();
    $info_curso = $info_sala_assoc['curso_id'];

    echo
    '<input class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" type="text" placeholder="Alterar Codigo" name="codigo" value="'.$info_sala_assoc['codigo'].'">
    <input class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" type="number" placeholder="Alterar Capacidade" name="capacidade" value="'.$info_sala_assoc['capacidade'].'">
    <select name="curso_id" class=" text-black font-medium rounded-3xl py-1 text-2x1">';
    if($info_sala->num_rows > 0) {
        echo "<option value='".$info_sala_assoc['id']."'>".$info_sala_assoc['nome_curso']."</option>";

        $info_cursos = $bd_conexao->query("SELECT * FROM cursos where id != '$info_curso'");
        
        for($i=1; $i <= $info_cursos->num_rows; $i++) {
            $info_cursos_assoc = $info_cursos->fetch_assoc();
            echo '<option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value='.$info_cursos_assoc['id'].'>'.$info_cursos_assoc['nome_curso']."</option>";
        }
    }
    echo "</select>";

    echo '<select name="status" class=" text-black font-medium rounded-3xl py-1 text-2x1">';
    
            if($info_sala_assoc['status'] == 1) {
                echo 
                '<option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="1"> Aberta </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="2"> Interditada </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="3"> Cheia </option>';
            } else if($info_sala_assoc['status'] == 2) {
                echo
                '<option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="2"> Interditada </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="1"> Aberta </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="3"> Cheia </option>';
            } else {
                echo
                '<option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="3"> Cheia </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="1"> Aberta </option>
                <option class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="2"> Interditada </option>';
            }

    echo '</select>'

?>

