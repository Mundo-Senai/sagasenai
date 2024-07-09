<?php 
    include "../../php/config/conexao.php";
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
    <link rel="stylesheet" href="module.css">
    <title>Perfil</title>
</head>
<body>
    <header class="w-full h-16 flex flex-row items-center justify-between bg-blue-600/95 px-6">
        <h1 class="text-2xl font-bold text-white">Senai</h1>
        <div class="flex flex-row gap-4 items-center">
            <a href="../dashboard/index.php" class="text-lg text-white cursor-pointer">Dashboard</a>
            <?php 
                if ($_SESSION['email'] == 'admin@gerente.com') {
                    echo '
                    <a href="../telaGerente/" class="text-lg text-white cursor-pointer">Gerente</a>
                    <a href="../criaçãoDeSalas/" class="text-lg text-white cursor-pointer">Salas</a>
                    <a href="../criaçãoDeCursos/" class="text-lg text-white cursor-pointer">Cursos</a>';
                }
            ?>
            <form action="../../php/controle/sair.php" method="post">
                <input type="submit" class="text-lg text-white cursor-pointer" value="Sair">
            </form>
        </div>
    </header>
    <main class="w-full min-h-[calc(100vh-104px)] bg-slate-200 py-10 flex flex-col pb-10 ">
        <div class="w-11/12 h-2/4 mx-auto flex flex-col bg-white pb-2 rounded-lg shadow-md shadow-black/60">
            <h1 class="text-3xl font-bold my-2 mx-auto">Perfil:</h1>
            <div class="min-h-full items-center gap-9 flex flex-row p-10 border-black border-t-[1px]">
                <div class="h-fit">
                    <img src="../../assets/img/profile-placeholder.png" alt="Placeholder foto perfil" width="300px" height="300px">
                </div>
                <div class="flex flex-col h-full justify-between">
                    <h1 class="text-xl font-bold">Nome: <?php echo $_SESSION["nome"];?></h1>
                    <h1 class="text-xl font-bold">Email: <?php echo $_SESSION["email"];?></h1>
                    <?php
                    if($_SESSION['email'] == 'admin@gerente.com'){
                        echo 
                        '<h1 class="text-xl font-bold">Cargo: Gerente </h1>';
                    }else if($_SESSION["papel"] == 1) {
                        echo 
                        '<h1 class="text-xl font-bold">Cargo: Professor </h1>';
                    } else {
                        echo 
                        '<h1 class="text-xl font-bold">Cargo: Aluno </h1>';
                    }
                    ?> 
                </div>
            </div>
        </div>
        <div>
            <?php 

            if($_SESSION['papel'] == '1') {
                
            }
            /*if($_SESSION['papel'] == '2') {
                $query = 'SELECT cursos.nome_curso, cursos.data_fim, salas.codigo FROM usuarios INNER JOIN cursos ON usuarios.cursos_id = cursos.id INNER JOIN salas ON cursos.id = salas.id WHERE usuarios.id = ?;';
                $stmt = $bd_conexao->prepare($query);
                $stmt->bind_param('i', $_SESSION['id']);
                $stmt->execute();
                
                $resultados = $stmt->get_result();

                if ($resultados->num_rows > 0) {
                    echo '
                        <table class="mx-auto w-3/4 text-center">
                            <thead>
                                <tr>
                                    <th colspan="3" class="mx-auto">Cursos: </th>
                                </tr>
                                <tr>
                                    <th>Curso</th>
                                    <th>Sala</th>
                                    <th>Fim do curso</th>
                                </tr>
                            </thead>;
                            <tbody>';
                    while ($row = $resultados->fetch_assoc()  ) {
                        echo '<tr>';
                        echo '<td>' . $row['nome_curso'] . '</td>';
                        echo '<td>'. $row['codigo'] . '</td>';
                        echo '<td>'. $row['data_fim'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo '
                            </tbody>
                        </table>';
                }
                
                $stmt->close();
            } else if ($_SESSION['papel'] = '1') {
                $query = 'SELECT cursos.nome_curso, cursos.data_fim, salas.codigo FROM cursos INNER JOIN usuarios ON usuarios.id = cursos.professor_id INNER JOIN salas ON cursos.id = salas.curso_id WHERE usuarios.id = ?;';
                $stmt = $bd_conexao->prepare($query);
                $stmt->bind_param('i', $_SESSION['id']);
                $stmt->execute();
                
                $resultados = $stmt->get_result();

                if ($resultados->num_rows > 0) {
                    echo '
                        <table class="mx-auto w-3/4 text-center">
                            <thead>
                                <tr>
                                    <th colspan="3" class="mx-auto">Cursos: </th>
                                </tr>
                                <tr>
                                    <th>Curso</th>
                                    <th>Sala</th>
                                    <th>Fim do curso</th>
                                </tr>
                            </thead>;
                            <tbody>';
                    while ($row = $resultados->fetch_assoc()  ) {
                        echo '<tr>';
                        echo '<td>' . $row['nome_curso'] . '</td>';
                        echo '<td>'. $row['codigo'] . '</td>';
                        echo '<td>'. $row['data_fim'] . '</td>';
                        echo '</tr>';
                    }
                    
                    echo '
                        </tbody>
                        </table>';
                }
            } else {
                echo 'Sem registros';
            }*/
            ?>
        </div>
    </main>
    <footer class="w-full h-10 bg-blue-600/95 flex items-center">
        <h1 class="mx-auto text-xl text-white font-bold">Direitos Reservados @2024</h1>
    </footer>
</body>
</html>
