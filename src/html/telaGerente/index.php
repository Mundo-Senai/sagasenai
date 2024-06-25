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
    <title>Registro de Usuário</title>
</head>
<body>

    <div>
        <h2>Registrar Usuário</h2>
        <form action="../../php/controle/registro.php" method="POST">
            <h3>Email:</h3>
            <input type="text" name="email">
            <h3>Nome</h3>
            <input type="text" name="nome">
            <h3>Senha</h3>
            <input type="password" name="senha">
            <h3>Papel</h3>
            <select name="papel" id="papel">
                <option value="2">Aluno</option>
                <option value="1">Professor</option>
            </select>
            <h3>Curso</h3>
            <select name="curso" id="curso">
            <option value="0" disabled selected>Selecione o Curso</option>
            <?php
                $cursos_disponiveis = $bd_conexao->query("SELECT * FROM cursos");
                if($cursos_disponiveis->num_rows > 0) {
                    for($i=1; $i <= $cursos_disponiveis->num_rows; $i++) {
                        $info_curso = $cursos_disponiveis->fetch_assoc();
                        echo "<option value='".$info_curso['id']."'>".$info_curso['nome']."</option>";
                    }
                } else {
                    echo "Não há cursos disponíveis";
                }
            ?>
            </select>
            <input type="submit" value="Registrar Usuário">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $("#papel").on("change", () => {
            let papel = document.getElementById("papel").value
            if(papel != 2) {
                $("#curso").val("0")
                $("#curso").attr("disabled", true);
            } else {
                $("#curso").attr("disabled", false);
            }

        })
        
    </script>
</body>
</html>