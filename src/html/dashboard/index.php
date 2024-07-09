<?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header("Location: ../login/index.html");
    }
    include "../../php/config/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Salas</title>
</head>
<body class="w-full min-h-screen grid grid-rows-[auto_1fr_auto]">
    <header class="w-full h-16 flex flex-row items-center justify-between bg-blue-600/95 px-6">
        <h1 class="text-2xl font-bold text-white">Senai</h1>        
        <div class="flex flex-row gap-4 items-center">
            <a href="../perfil/index.php" class="text-lg text-white cursor-pointer">Perfil</a>
            <?php 
                if($_SESSION['email'] == 'admin@gerente.com') {
                    echo
                    '<a href="../telaGerente/" class="text-lg text-white cursor-pointer">Gerente</a>
                    <a href="../criaçãoDeSalas/" class="text-lg text-white cursor-pointer">Salas</a>
                    <a href="../criaçãoDeCursos/" class="text-lg text-white cursor-pointer">Cursos</a>';
                }
            ?>
            <form action="../../php/controle/sair.php" method="post">
                <input type="submit" class="text-lg text-white cursor-pointer" value="Sair">
            </form>
        </div>
    </header>
    <main class="w-full h-full min-h-[calc(100%-40px)] py-10 flex flex-col pb-10 ">
        <div class="w-full h-full flex flex-col">
            <h1 class="text-3xl font-bold mx-auto">Cursos:</h1>
            <div class="w-full flex flex-col px-8 py-7 lg:flex-row gap-16 lg:flex-wrap items-center justify-center">
                <!--Salas vao aqui-->
                <?php
                    $info_salas = $bd_conexao->query("SELECT * FROM cursos INNER JOIN salas INNER JOIN usuarios on (cursos.professor_id = usuarios.id AND salas.curso_id = cursos.id)");
                    for ($i=1; $i <= $info_salas->num_rows; $i++) { 
                        $info_salas_assoc = $info_salas->fetch_assoc();

                        $d1 = $info_salas_assoc['data_inicio'];
                        $data1 =  DateTime::createFromFormat('Y-m-d', "$d1");
                        $data1 = $data1->getTimestamp();
                        
                        $d2 = $info_salas_assoc['data_fim'];
                        $data2 = DateTime::createFromFormat('Y-m-d', "$d2");
                        $data2 = $data2->getTimestamp();

                        $duração_curso = ($data2 - $data1)/60/60/24;

                        if($info_salas_assoc['status'] == 1) {
                            echo '<div class="w-11/12 py-6 bg-green-300/90 border-2 border-black rounded-lg h-[calc(fit+56px)] flex flex-col justify-center gap-5 px-5 lg:flex-row md:w-2/4 lg:w-1/4 lg:min-w-[500px]">';
                        } else if($info_salas_assoc['status'] == 2) {
                            echo '<div class="w-11/12 py-6 bg-[#ffdf2ad3] border-2 border-black rounded-lg h-[calc(fit+56px)] flex flex-col justify-center gap-5 px-5 lg:flex-row md:w-2/4 lg:w-1/4 lg:min-w-[500px]">';
                        } else {
                            echo '<div class="w-11/12 py-6 bg-red-300/90 border-2 border-black rounded-lg h-[calc(fit+56px)] flex flex-col justify-center gap-5 px-5 lg:flex-row md:w-2/4 lg:w-1/4 lg:min-w-[500px]">';
                        }
                        echo '
                            <div class="flex w-full lg:w-3/6 flex-col gap-1 justify-between h-full">
                                <div class="flex flex-col gap-1">
                                    <h1 class="text-2xl text-black/85">Curso: ' .$info_salas_assoc['nome_curso'].'</h1>
                                    <h2 class="text-xl text-black/65">Professor: '.$info_salas_assoc['nome'].'</h2>
                                    <p class="text-sm">Sala: '.$info_salas_assoc['codigo'].'</p>
                                    <p class="text-sm">Capacidade: '.$info_salas_assoc['capacidade'].'</p>
                                    <p class="text-sm">Duração: '.$duração_curso.' Dias</p>
                                </div>';
                                if($info_salas_assoc['status'] == 1) {
                                    echo '<button disabled class="bg-blue-600/95 cursor-not-allowed mt-5 w-full text-white p-2 rounded duration-200 transition-all lg:hover:bg-blue-500/95">Entrar</button>';
                                } else if($info_salas_assoc['status'] == 2) {
                                    echo '<button disabled class="bg-slate-400/95 cursor-not-allowed mt-5 w-full text-white p-2 rounded duration-200 transition-all">Interditado</button>';
                                } else {
                                    echo '<button disabled class="bg-slate-400/95 cursor-not-allowed  mt-5 w-full text-white p-2 rounded duration-200 transition-all">Cheio</button>';
                                }
                            echo '</div>
                            <div class="flex items-center lg:w-3/6 w-full h-full ">
                                <p class="border-black  rounded-md p-4 break-keep">'.$info_salas_assoc['descricao'].'</p>
                            </div>
                        </div> 
                        ';
                    }
                ?>
                
            </div>
        </div>
    </main>
    <footer class="w-full h-10 bg-blue-600/95 flex items-center">
        <h1 class="mx-auto text-xl text-white font-bold">Direitos Reservados @2024</h1>
    </footer>
</body>
</html>