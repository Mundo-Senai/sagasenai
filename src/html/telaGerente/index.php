<?php
    include "../../php/config/conexao.php";
    session_start();

    if(isset($_SESSION['email']) != "admin@gerente.com") {
        header("Location: ../../html/dashboard/");
    }
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

    <div class="w-screen h-screen space-y-5 flex flex-col items-center font-montserrat justify-between lg:flex-row">

    <div id="cursos"  class="w-auto h-auto flex flex-col bg-blue-600/95 rounded-lg  m-auto text-gray-100 p-4 space-y-4">
    <h3 class="text-4xl font-semibold tracking-wide">Modificar Curso</h3>
        <input type="button" id="excluir" value="Excluir" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
        <input type="button" id="alterar" value="Alterar" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
                    
        <div id="excluir_form" style="display:none">
            <form action="../../php/controle/administrar.php" method="post" id="form" class="flex flex-col">
                <select name="curso_excluir" class=" text-black font-medium rounded-3xl py-1 text-2x1">
                <?php
                    $info_cursos = $bd_conexao->query("SELECT * FROM cursos");
                    if($info_cursos->num_rows > 0) {
                        echo "<option disabled selected>Escolher Curso</option>";
                        for($i=1; $i <= $info_cursos->num_rows; $i++) {
                            $info_fetch = $info_cursos->fetch_assoc();
                            echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome_curso']."</option>";
                        }
                    } else {
                        echo "<option disabled selected>Não há cursos registrados</option>";
                    }
                ?>
                </select>
                <input type="submit" value="Excluir Curso" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700" name="excluir">
            </form>
        </div>

        <div id="alterar_form" style="display:none" class="flex flex-col w-min">
            <form action="../../php/controle/administrar.php" method="post" id="form">
                <select name="curso" id="curso" class=" text-black font-medium rounded-3xl py-1 text-2x1">
                    <?php
                        $info_cursos = $bd_conexao->query("SELECT * FROM cursos");
                        if($info_cursos->num_rows > 0) {
                            echo "<option disabled selected>Escolher Curso</option>";
                            for($i=1; $i <= $info_cursos->num_rows; $i++) {
                                $info_fetch = $info_cursos->fetch_assoc();
                                echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome_curso']."</option>";
                            }
                        } else {
                            echo "<option disabled selected>Não há cursos registrados</option>";
                        }
                    ?>
                </select>
                <div id="info"  class="flex flex-col justify-between space-y-4 text-black">
                    <!--Aqui vai as informações do curso selecionado--->
                </div>
                <input type="submit" name="Modificar Curso" name="modificar" value="Modificar Curso" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                        text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                        focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                        dark:hover:bg-gray-700">
                </form>
        </div>
    </div>

    <div id="sala"  class="w-auto h-auto flex flex-col bg-blue-600/95 rounded-lg  m-auto text-gray-100 p-4 space-y-4">
    <h3 class="text-4xl font-semibold tracking-wide">Modificar Sala</h3>
        <input type="button" id="excluir_sala" value="Excluir" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
        <input type="button" id="alterar_sala" value="Alterar" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
        <div id="excluir_sala_form" style="display:none">
            <form action="../../php/controle/administrar_sala.php" method="post" id="form" class="flex flex-col">
            <select name="sala_excluir" class=" text-black font-medium rounded-3xl py-1 text-2x1">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM salas");
                
                if($info_cursos->num_rows > 0) {
                    echo "<option disabled selected>Escolher Sala</option>";
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['codigo']."</option>";
                    }
                } else {
                    echo "<option disabled selected>Não há salas registradas</option>";
                }
            ?>
            <input type="submit" value="Excluir Sala" name="excluir_sala" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
             </select>
            </form>
        </div>

        <div id="alterar_sala_form" style="display:none" class="flex flex-col">
            <form action="../../php/controle/administrar_sala.php" method="post" id="form">
            <select name="sala" id="sala_alterado" class=" text-black font-medium rounded-3xl py-1 text-2x1">
            <?php
                $info_cursos = $bd_conexao->query("SELECT * FROM salas");
                if($info_cursos->num_rows > 0) {
                    echo "<option disabled selected>Escolher Sala</option>";
                    for($i=1; $i <= $info_cursos->num_rows; $i++) {
                        $info_fetch = $info_cursos->fetch_assoc();
                        echo "<option value='".$info_fetch['id']."'>".$info_fetch['codigo']."</option>";
                    }
                } else {
                    echo "<option disabled selected>Não há salas registradas</option>";
                }
            ?>
            </select>
            <div id="info_sala" class="flex flex-col justify-between space-y-4 text-black">
                <!--Aqui vai as informações do curso selecionado--->
            </div>
            <input type="submit" name="modificar" value="Alterar Sala" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">
            </form>
        </div>
    </div>
    
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
            <select name="curso" id="curso_registro" class="text-black font-medium rounded-3xl py-1 m-3 text-2x1">

            <?php
                $cursos_disponiveis = $bd_conexao->query("SELECT * FROM cursos");
                if($cursos_disponiveis->num_rows > 0) {
                    echo '<option value="0" class="text-black" disabled selected>Selecione o Curso</option>';
                    for($i=1; $i <= $cursos_disponiveis->num_rows; $i++) {
                        $info_curso = $cursos_disponiveis->fetch_assoc();
                        echo "<option value='".$info_curso['id']."'>".$info_curso['nome_curso']."</option>";
                    }
                } else {
                    echo '<option disabled selected value="0" class="text-black">Não há cursos disponíveis</option>';
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
                $("#curso_registro").val("0")
                $("#curso_registro").attr("disabled", true);
            } else {
                $("#curso_registro").attr("disabled", false);
            }

        })
        
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../telaGerente/script.js"></script>
</body>
</html>