<?php

    include "../config/conexao.php";

    $cuso_alterado = $_POST['curso_alterado'];

    $info_curso = $bd_conexao->query("SELECT * FROM cursos INNER JOIN usuarios ON cursos.professor_id = usuarios.id WHERE cursos.id = $cuso_alterado");
    $info_curso_assoc = $info_curso->fetch_assoc();
    $info_professor =  $info_curso_assoc['professor_id'];

    echo
    '<input type="text" placeholder="Alterar Nome" name="nome" class=" text-black font-medium rounded-3xl py-1 text-2x1 mt-4" value="'.$info_curso_assoc['nome_curso'].'">
    <input class=" text-black font-medium rounded-3xl py-1 text-2x1" type="date" placeholder="Alterar Data de início" name="data_inicio" value="'.$info_curso_assoc['data_inicio'].'">
    <input class=" text-black font-medium rounded-3xl py-1 text-2x1" type="date" placeholder="Alterar Data de finalização" name="data_fim" value="'.$info_curso_assoc['data_fim'].'">
    <textarea class=" text-black font-medium rounded-3xl py-1 text-2x1" placeholder="Alterar Descrição" name="descricao" rows="7" colls="70" style="resize:none">'.$info_curso_assoc['descricao'].'</textarea>
    <select class=" text-black font-medium rounded-3xl py-1 text-2x1" name="professor" placeholder="Alterar Professor">';
    echo "<option value='".$info_curso_fetch['id']."'>".$info_curso_assoc['nome']."</option>";

    $info_cursos = $bd_conexao->query("SELECT * FROM usuarios WHERE papel = 1 and usuarios.id != '$info_professor'");

    if($info_cursos->num_rows > 0) {

        for($i=2; $i <= $info_cursos->num_rows; $i++) {
            $info_fetch = $info_cursos->fetch_assoc();
            echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome']."</option>";
        }
    }
    echo "</select>";
?>
