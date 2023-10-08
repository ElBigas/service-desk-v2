<?php

//inicia a sessão e verifica se a autentificação é valida
session_start();

if(!isset($_SESSION['autenticado']) ||
    $_SESSION['autenticado'] == 'NO') {

    //Caso tente acessar sem estar autenticado, o usuário é enviado para a tela de login
    header('Location: http://localhost/service-desk/index.php?login=erro2');
}