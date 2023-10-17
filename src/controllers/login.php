<?php

// Inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}

// Conexão com o banco de dados
include('../config/config.php');

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta preparada
$sql = "SELECT * FROM usuarios 
        WHERE email = ? 
        AND senha = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    'ss', // 'ss' indica que ambos os parâmetros são strings
    $email,
    $senha
);

// Executar a consulta
$stmt->execute();

// Obter os resultados
$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {
    // Inicia a sessão, guarda os dados do usuário e autentifica o usuário
    $row = $resultado->fetch_assoc();
    $_SESSION["email"] = $row['email'];
    $_SESSION["nome"] = $row['nome'];
    $_SESSION['autenticado'] = 'YES';
    header('Location: http://localhost/service-desk/src/views/home.php');

} else {
    $_SESSION['autenticado'] = 'NO';
    header('Location: http://localhost/service-desk/index.php?login=erro');
}
