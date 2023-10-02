<?php
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    //print_r('Não existe');
    header('Location: ../login.html');

?>