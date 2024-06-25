<?php
    include "../../php/config/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
    <link href="../../output.css" rel="stylesheet" >
</head>
<body>
    <form action="../../php/controle/criar_curso.php" method="POST" id="enviar_formulario">
        <div id="topo"> <h1>Criar Curso</h1></div>
        <div id="conteúdo">
            <h3>Nome do Curso</h3>
            <input type="text" name="nome" id="curso">
            <h3>Data de início</h3>
            <input type="date" name="data_inicio" id="datai">
            <h3>Data de finalização</h3>
            <input type="date" name="data_fim" id="dataf">
            <h3>Data de finalização</h3>
            <h3>Selecionar Professor</h3>
            <select name="professor" id="prof">
                <option value="" disabled selected>Selecione o Professor</option>
                <?php 
                    $info_professores = $bd_conexao->query("SELECT * FROM usuarios WHERE papel = 1");

                    if($info_professores->num_rows > 0) {
                        for($i=1; $i <= $info_professores->num_rows; $i++) { 

                            $info_fetch = $info_professores->fetch_assoc();
                            echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome']."</option>";
                        }

                    } else {
                        echo "Não há professores disponíveis";
                    }

                ?>
            </select>
        </div>
        <input type="submit" value="Criar Curso">
    </form>
    <script>
    </script>
</body>
</html>