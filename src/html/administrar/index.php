<?php
    include "../../php/config/conexao.php";
    session_start();

    $_SESSION['email'] = 'admin@gerente.com';

    if (!($_SESSION['email'] == 'admin@gerente.com')) {
        header('Location: ../login/index.html');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterações</title>
</head>
<body>

    <div id="cursos">
        <input type="button" id="excluir" value="Excluir">
        <input type="button" id="alterar" value="Alterar">
        <div id="excluir_form" style="display:none">
            <form action="../../php/controle/administrar.php" method="post" id="form">
            <h3>Excluir Curso</h3>
            <select name="curso_excluir">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM cursos");
                if($info_cursos->num_rows > 0) {
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome_curso']."</option>";
                    }
                }
            ?>
            <input type="submit" value="Excluir Curso" name="excluir">
             </select>
            </form>
        </div>

        <div id="alterar_form" style="display:none">
            <form action="../../php/controle/administrar.php" method="post" id="form">
            <h3>Alterar Curso</h3>
            <select name="curso" id="curso">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM cursos");
                if($info_cursos->num_rows > 0) {
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome_curso']."</option>";
                    }
                }
            ?>
            </select>
            <div id="info">
                <!--Aqui vai as informações do curso selecionado--->
            </div>
            <input type="submit" name="Modificar Curso" name="modificar">
            </form>
        </div>
    </div>

    <div id="sala">
        <input type="button" id="excluir_sala" value="Excluir">
        <input type="button" id="alterar_sala" value="Alterar">
        <div id="excluir_sala_form" style="display:none">
            <form action="../../php/controle/administrar_sala.php" method="post" id="form">
            <h3>Excluir Sala</h3>
            <select name="sala_excluir">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM salas");
                if($info_cursos->num_rows > 0) {
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['codigo']."</option>";
                    }
                }
            ?>
            <input type="submit" value="Excluir Sala" name="excluir_sala">
             </select>
            </form>
        </div>

        <div id="alterar_sala_form" style="display:none">
            <form action="../../php/controle/administrar_sala.php" method="post" id="form">
            <h3>Alterar Sala</h3>
            <select name="sala" id="sala_alterado">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM salas");
                if($info_cursos->num_rows > 0) {
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['codigo']."</option>";
                    }
                }
            ?>
            </select>
            <div id="info_sala">
                <!--Aqui vai as informações do curso selecionado--->
            </div>
            <input type="submit" name="Modificar Curso" name="modificar">
            </form>
        </div>
    </div>

    
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../../html/administrar/script.js"></script>
</html>