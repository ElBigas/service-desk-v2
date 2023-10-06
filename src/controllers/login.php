<?php

// Inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}

// Conexão com o banco de dados
include('../config/config.php');

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta SQL para buscar o usuário no banco de dados
$sql = sprintf("SELECT * FROM usuarios 
        WHERE email = '%s'
        AND senha = '%s' ", $email, $senha);

// Executa a consulta SQL
$res = $conn->query($sql) or die($conn->error);

// Verifica se o usuário foi encontrado
$row = $res->fetch_object();

$qtd = $res->num_rows;

if ($qtd > 0) {
    // Inicia a sessão, guarda os dados do usuário e autentifica o usuário
    $_SESSION["email"] = $email;
    $_SESSION["nome"] = $row->nome;
    $_SESSION['autenticado'] = 'YES';
    header('Location: http://localhost/service-desk/src/views/home.php');
} else {
    $_SESSION['autenticado'] = 'NO';
    header('Location: http://localhost/service-desk/index.php?login=erro');
}

