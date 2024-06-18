<?php

    $host = "localhost";
    $usuario = 'root';
    $senha = "usbw";
    $nome_db = "saga_senai";

    $bd_conexao = new mysqli($host, $usuario, $senha, $nome_db);

    if($bd_conexao->connect_errno) {
        die("CONNECTION <br>". $bd_conexao->connect_errno);
    }