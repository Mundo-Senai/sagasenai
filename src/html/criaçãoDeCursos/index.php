<!----<?php
    include "../../php/config/conexao.php";
?>
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
    <link href="../../output.css" rel="stylesheet" >
</head>

<body class="bg-slate-500">
    <div id="conteúdo" class="w-screen h-screen flex items-center font-montserrat">
        <form action="../../php/controle/criar_curso.php" method="POST" id="enviar_formulario" class="w-auto h-auto flex flex-col bg-blue-600/95 rounded-lg  m-auto text-gray-100 p-4 space-y-4">

                <h1 class="text-4xl font-semibold tracking-wide">Criar Curso</h1>

                <h3 class="text-2xl tracking-wide">Nome do Curso</h3>

                <input type="text" name="nome" id="curso" class="text-black 0 font-medium rounded-3xl py-1  text-2x1" placeholder="Nome do curso">

                <h3 class="text-2xl tracking-wide">Data de início</h3>

                <input type="date" name="data_inicio" id="datai" class="text-black 0 font-medium rounded-3xl py-1  text-2x1" placeholder="Data inicial">

                <h3 class="text-2xl tracking-wide">Data de finalização</h3>

                <input type="date" name="data_fim" id="dataf" class="text-black 0 font-medium rounded-3xl py-1  text-2x1" placeholder="Data final">

                <h3 class="text-2xl tracking-wide">Selecionar Professor</h3>

                <select name="professor" id="prof" class="text-black 0 font-medium rounded-3xl py-1  text-2x1">
                    <option value="" disabled selected>Selecione o Professor</option>
                    <!-- <?php 
                        $info_professores = $bd_conexao->query("SELECT * FROM usuarios WHERE papel = 1");
                        if($info_professores->num_rows > 0) {
                            for($i=1; $i <= $info_professores->num_rows; $i++) { 
                                
                                $info_fetch = $info_professores->fetch_assoc();
                                echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome']."</option>";
                            }
                            
                        } else {
                            echo "<option disabled selected>Não há professores disponíveis</option>";
                        }
                        
                        ?>-->
                    
                </select>
                <input type="submit" value="Criar Curso" class=" m-4 p-4 cursor-pointer py-2.5 w-64 px-5 me-2 mb-2 text-sm font-medium
                     text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700
                      focus:z-10 focus:ring-4 focus:ring-gray-500 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-700">    
            </form>
    </div>
    <script>
    </script>
</body>
</html>