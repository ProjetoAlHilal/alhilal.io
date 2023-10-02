<?php

    include_once('conexao.php');

    if(isset($_POST['update'])) 
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $pizza = $_POST['pizza'];
        $acompanhamento = $_POST['acompanhamento'];
        $suco = $_POST['suco'];
    
        $sqlUpdate = "UPDATE pedido SET nome='$nome',email='$email',endereco='$endereco',telefone='$telefone', pizza='$pizza',acompanhamento='$acompanhamento',suco='$suco'
        WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header ('Location: adm.php');
?>