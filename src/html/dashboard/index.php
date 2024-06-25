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
            <a href="../perfil/index.html" class="text-lg text-white cursor-pointer">Perfil</a>
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
    <main class="w-full h-full min-h-[calc(100%-40px)] py-10 flex flex-col pb-10 ">
        <div class="w-full h-full flex flex-col">
            <h1 class="text-3xl font-bold mx-auto">Cursos:</h1>
            <div class="w-full flex flex-col px-8 py-7 lg:flex-row gap-16 lg:flex-wrap items-center justify-center">
                <!--Salas vao aqui-->
                <div class="w-11/12 py-6 bg-zinc-500/10 border-2 border-black rounded-lg h-[calc(fit+56px)] min-h-fit flex flex-col justify-center gap-5 px-5 lg:flex-row md:w-2/4 lg:w-1/4 lg:min-w-[500px]">
                    <div class="flex w-full lg:w-2/6 flex-col gap-1 justify-between h-full">
                        <div class="flex flex-col gap-1">
                            <h1 class="text-2xl text-black/85">Curso</h1>
                            <h2 class="text-xl text-black/65">Professor</h2>
                            <p class="text-sm">Sala</p>
                            <p class="text-sm">Capacidade</p>
                        </div>
                        <button class="bg-blue-600/95 mt-5 w-full text-white p-2 rounded duration-200 transition-all lg:hover:bg-blue-500/95">Entrar</button>
                    </div>
                    <div class="flex items-center lg:w-4/6 w-full h-full ">
                        <p class="border-black border-[1px] rounded-md p-4 break-keep">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur possimus fugiat pariatur porro obcaecati eaque labore molestias vitae esse eos, ea quo ipsa sit perferendis, voluptatibus aperiam provident, itaque reprehenderit.</p>
                    </div>
                </div>                
            </div>
        </div>
    </main>
    <footer class="w-full h-10 bg-blue-600/95 flex items-center">
        <h1 class="mx-auto text-xl text-white font-bold">Footer</h1>
    </footer>
</body>
</html>