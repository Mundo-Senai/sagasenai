<?php
    include "../../php/config/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet" >
    <title>Registro de Usuário</title>
</head>
<body class="bg-slate-500">

    <div class="w-screen h-screen flex items-center font-montserrat">
        <form action="../../php/controle/registro.php" method="POST"  class="w-auto h-auto flex flex-col bg-blue-600/95 rounded-lg  m-auto text-gray-100 p-4 space-y-4">

            <h3 class="text-4xl font-semibold tracking-wide">Criar usuário</h3>
        
            <h3  class=" text-2xl tracking-wide">Email</h3>
            <input type="text" name="email" placeholder="email" class="text-black 0 font-medium rounded-3xl py-1 text-2x1">

            <h3  class=" text-2xl  tracking-wide">Nome</h3>
            <input type="text" name="nome"placeholder="nome" class=" text-black font-medium rounded-3xl py-1 text-2x1">

            <h3  class=" text-2xl  tracking-wide ">Senha</h3>
            <input type="password" name="senha"placeholder="senha" class="text-black font-medium rounded-3xl py-1  text-2x1">

            <h3  class=" text-2xl  tracking-wide ">Papel</h3>
            <select name="papel" id="papel" class="text-black font-medium rounded-3xl py-1  text-2x1">

                <option value="2" class="text-black">Aluno</option>
                <option value="1" class="text-black">Professor</option>
            </select>

            <h3  class=" text-2xl font-medium tracking-wide">Curso</h3>
            <select name="curso" id="curso" class="text-black font-medium rounded-3xl py-1 m-3 text-2x1">
            <option value="0" disabled selected  class="text-black text-2xl font-medium tracking-wide m-1">Selecione o Curso</option>

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
            <input type="submit" value="Registrar Usuário" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700" id="logar">
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