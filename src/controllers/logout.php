<?php

    session_start();

    // Destroi todas as variáveis de sessão
    session_destroy();

    // Redireciona para a página de login ou outra página apropriada
    header('Location: http://localhost/service-desk/index.php');
    exit();
