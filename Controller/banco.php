<?php
// definições de host, database, usuário e senha
$local = 'localhost';
$usuario = 'root';
$senha = '';
$dbase = 'tepc';

// conecta ao banco de dados
$link = mysqli_connect($local, $usuario, $senha,$dbase);
 
if (!$link) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;