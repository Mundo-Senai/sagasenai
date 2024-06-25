<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../output.css">
    <title>Perfil</title>
</head>
<body>
    <header class="w-full h-16 flex flex-row items-center justify-between bg-blue-600/95 px-6">
        <h1 class="text-2xl font-bold text-white">Senai</h1>
        <div class="flex flex-row gap-4 items-center">
            <a href="../dashboard/index.php" class="text-lg text-white cursor-pointer">Dashboard</a>
            <?php 
                session_start();
                $_SESSION['email'] = 'admin@gerente.com';
                if ($_SESSION['email'] == 'admin@gerente.com') {
                    echo '<h1 class="text-lg text-white cursor-pointer">Gerente</h1>';
                }
            ?>
            <h2 class="text-lg text-white cursor-pointer">Sair</h2>
        </div>
    </header>
    <main class="w-full min-h-[calc(100vh-104px)] bg-red-600 py-10 flex flex-col pb-10 ">
        <div class="w-11/12 h-2/4 mx-auto flex flex-col bg-white pb-2 rounded-lg shadow-md shadow-black/60">
            <h1 class="text-3xl font-bold my-2 mx-auto">Perfil:</h1>
            <div class="min-h-full items-center gap-9 flex flex-row p-10 border-black border-t-[1px]">
                <div class="h-fit">
                    <img src="../../assets/img/profile-placeholder.png" alt="Placeholder foto perfil" width="300px" height="300px">
                </div>
                <div class="flex flex-col h-full justify-between">
                    <h1 class="text-xl font-bold">Nome: <?php echo $_SESSION["nome"];?></h1>
                    <h1 class="text-xl font-bold">Email: <?php echo $_SESSION["email"];?></h1>
                    <h1 class="text-xl font-bold">Cargo: <?php echo $_SESSION["cargo"];?></h1>
                </div>
            </div>
        </div>
        <div>
            <?php 
            
            if ($_SESSION['papel'] == 'aluno') {

            }
            ?>
        </div>
    </main>
    <footer class="w-full h-10 bg-blue-600/95 flex items-center">
        <h1 class="mx-auto text-xl text-white font-bold">Footer</h1>
    </footer>
</body>
</html>