<?php
session_start();

//print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha']))
{
    //acessa o sistema
    include_once('conexao.php');
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //print_r('Nome: ' . $nome);
    //print_r('Senha: ' . $senha);
    $sql = "SELECT * FROM adm WHERE nome = '$nome' and senha = '$senha'";

    $result = $conexao->query($sql);

    //print_r($result);
    //print_r($sql);
    if(mysqli_num_rows($result) < 1)
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        //print_r('Não existe');
        header('Location: ../login.html');
    }
    else 
    {
       $_SESSION['nome'] = $nome;
       $_SESSION['senha'] = $senha;
       header('Location: adm.php'); //print_r('Existe');
    }
}
else
{
    header('Location: ../login.html');
}
?>