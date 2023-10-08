<?php

include_once '../controllers/auth.php';

?>

<html lang="pt-br" data-bs-theme="light">

<head>
    <meta charset="utf-8"/>
    <title>App Service Desk</title>

    <!--Icon-->
    <link rel="icon" type="image/x-icon" href="../public/img/logo.png">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="src/public/css/style.css">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">
        <img src="../public/img/logo.png" width="30" height="30" class="d-inline-block align-top ms-2" alt="">
        App Service Desk
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="../controllers/logout.php" class="btn btn-danger me-2">SAIR</a>
        </li>
    </ul>
</nav>

<div class="container">
    <div class="row">

        <?php

        //será verificado na URL o 'page' e será incluido a página correspondente
        switch (@$_REQUEST['page']) {

            case 'abrir-chamado':
                include('abrir_chamado.php');
                break;

            case 'consultar-chamado':
                include('consultar_chamado.php');
                break;

            case 'editar':
                include('editar-chamado.php');

                break;

            default: ?>
                <div class="card-home">
                    <div class="my-4">
                        <h1>Olá, <?php print $_SESSION["nome"]; ?></h1>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Menu
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 d-flex justify-content-center">
                                    <a href="?page=abrir-chamado">
                                        <img src="../public/img/formulario_abrir_chamado.png" width="70" height="70">
                                    </a>
                                </div>
                                <div class="col-6 d-flex justify-content-center">
                                    <a href="?page=consultar-chamado">
                                        <img src="../public/img/formulario_consultar_chamado.png" width="70" height="70">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        };
        ?>
    </div>
    <?php
    if (isset($_GET['page']) && ($_GET['page']) == 'success') {
        ?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-4" role="alert">
                Chamado <b>criado</b> com sucesso!
            </div>
        </div>
        <?php
    }
    ?><?php
    if (isset($_GET['page']) && ($_GET['page']) == 'editado') {
        ?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-4" role="alert">
                Chamado <b>editado</b> com sucesso!
            </div>
        </div>
        <?php
    }
    ?><?php
    if (isset($_GET['page']) && ($_GET['page']) == 'resolvido') {
        ?>
        <div class="row justify-content-center">
            <div class="alert alert-success mt-4" role="alert">
                Chamado <b>resolvido</b> com sucesso!
            </div>
        </div>
        <?php
    }
    ?>
</div>

</body>

</html>
</html>