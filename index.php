<?php
session_start(); // Inicia a sessão
?>

<html lang="pt-br" data-bs-theme="light">

<head>
    <meta charset="utf-8"/>
    <title>App Service Desk</title>

    <!--Icon-->
    <link rel="icon" type="image/x-icon" href="src/public/img/logo.png">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="src/public/css/style.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">


<main class="form-signin w-100 m-auto form-container">

    <form method="post" action="src/controllers/login.php">
        <img class="mb-4" src="src/public/img/logo.png" alt="Logo" height="57">
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating mb-2">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required autofocus>
            <label for="floatingInput">E-mail</label>
        </div>

        <div class="form-floating">
            <input name="senha" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Senha</label>
        </div>

        <div class="form-check text-start my-3 no-select">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Lembrar senha
            </label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-body-secondary no-select">© Emanuel Evangelista - 2023</p>
    </form>

</main>


<?php
// Verificar se há uma mensagem de erro definida na sessão
if (isset($_SESSION['login_erro'])) {
    echo
        '<div style="text-align: center; position: fixed; top: 1rem; right: 1rem;" class="alert alert-danger mb-3">
            ' . $_SESSION['login_erro'] . '
        </div>';
    unset($_SESSION['login_erro']); // Limpar a variável de sessão de erro
}
?>

</body>
</html>