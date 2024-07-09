<?php
    include "../../php/config/conexao.php";
    session_start();
    if(isset($_SESSION['email']) != "admin@gerente.com") {
        header("Location: ../../html/dashboard/");
    }
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
<body class="bg-slate-500">
    <form action="../../php/controle/criar_curso.php" method="POST" id="enviar_formulario" class="w-screen h-screen flex items-center justify-center flex-col place-self-center ">
        <div id="conteúdo" class="font-montserrat text-justify bg-contain border-2 border-black	 bg-[#220fc7] rounded-lg text-[#fffff4] shadow-2xl">

            <h1 class="text-4xl font-semibold tracking-wide py-1 m-3">Criar Curso</h1>

            <h3 class="text-2xl font-medium tracking-wide  py-1 m-3">Nome do Curso</h3>

            <input type="text" name="nome" id="curso" class="bg-slate-300 font-medium rounded-3xl border-4 py-1 m-3" placeholder="Nome do curso">

            <h3 class="text-2xl font-medium tracking-wide  py-1 m-3">Data de início</h3>

            <input type="date" name="data_inicio" id="datai" class="bg-slate-300 font-medium rounded-3xl border-4 py-1 m-3 cursor-pointer" placeholder="Data inicial">

            <h3 class="text-2xl font-medium tracking-wide  py-1 m-3">Data de finalização</h3>

            <input type="date" name="data_fim" id="dataf" class="bg-slate-300 font-medium rounded-3xl border-4 py-1 m-3 cursor-pointer" placeholder="Data final">

            <h3 class="text-2xl font-medium tracking-wide  py-1 m-3">Descrição do Curso</h3>

            <textarea name="descricao" id="descf" class="bg-slate-300 font-medium rounded-3xl border-4 py-1 m-3 cursor-pointer" placeholder="Descrição do curso" rows="3" colls="100" style="resize:none"></textarea>

            <h3 class="text-2xl font-medium tracking-wide  py-1 m-3">Selecionar Professor</h3>

            <select name="professor" id="prof" class="bg-slate-300 font-medium rounded-3xl border-4 py-1 m-3 cursor-pointer">
                <option value="" disabled selected>Selecione o Professor</option>
                    <?php 
                    $info_professores = $bd_conexao->query("SELECT * FROM usuarios WHERE papel = 1");
                    if($info_professores->num_rows > 0) {
                        for($i=1; $i <= $info_professores->num_rows; $i++) { 
                            
                            $info_fetch = $info_professores->fetch_assoc();
                            echo "<option value='".$info_fetch['id']."'>".$info_fetch['nome']."</option>";
                        }
                        
                    } else {
                        echo "<option disabled selected>Não há professores disponíveis</option>";
                    }
                    
                    ?>
                
            </select>
            <input type="submit" value="Criar Curso" class="transition ease-in-out delay-150 bg-green-600 hover:-translate-y-1 hover:scale-110 hover:bg-green-400 duration-300 ... rounded-lg text-[#fffff4] shadow-2xl  border-2 font-semibold text-2xl py-1 m-3 border-black cursor-pointer">    
        </div>
    </form>
    <script>
        
    </script>
</body>
</html>