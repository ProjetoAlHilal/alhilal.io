<?php
  session_start();
  include_once('conexao.php');
  //print_r($_SESSION);
  if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
  {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: ../login.html');
  }
    $logado = $_SESSION['nome'];

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM pedido WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or endereco LIKE '%$data%' or telefone LIKE '%$data%' or pizza LIKE '%$data%' or acompanhamento LIKE '%$data%' or suco LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM pedido ORDER BY id DESC";
    }
    $result = $conexao->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <title>Pizzaria Al Hilal</title>
  <link href="../css/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="./favicon.svg" rel="icon" type="image/svg+xml">
  <meta name="description" content="Peça a sua lista favorita na Al Hilal ! Diferentes sabores, acompanhamentos incríveis, tudo feito por Chefs renomados.">
</head>

<body>

<header class="header-bg">
    <div class="header grid-1">
    <a href="index.html"><img src="../img/icones/marca.svg" alt="Al Hilal"></a>
      <nav>
        <ul class="header-menu" aria-label="menu">
          <li><a class="fonte-1-xs cor-base-0" href="sair.php">Sair</a></li>
        </ul>
      </nav>
    </div>
  </header> 

    <div class="search-div">
      <input type="search" placeholder="Pesquisar" class="inputSearch" id="pesquisar">
      <button onclick="searchData()" class="buttonSearch">
        <img src="../img/icones/search.svg">
      </button>
    </div>
    <div class="table-div">
      <table class="table">
        <thead>
          <tr class="cabecalho">
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">Email</th>
            <th scope="col">Endereço</th>
            <th scope="col">Telefone</th>
            <th scope="col">Pizza</th>
            <th scope="col">Acompanhamento</th>
            <th scope="col">Suco</th>
            <th scope="col" colspan="2">...</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while($pedido_data = mysqli_fetch_assoc($result))
          {
            echo"<tr>";
            echo"<td>" . $pedido_data['id'] . "</td>";
            echo"<td>" . $pedido_data['nome'] . "</td>";
            echo"<td>" . $pedido_data['email'] . "</td>";
            echo"<td>" . $pedido_data['endereco'] . "</td>";
            echo"<td>" . $pedido_data['telefone'] . "</td>";
            echo"<td>" . $pedido_data['pizza'] . "</td>";
            echo"<td>" . $pedido_data['acompanhamento'] . "</td>";
            echo"<td>" . $pedido_data['suco'] . "</td>";
            echo"<td class='mudar'><a  href='edit.php?id=$pedido_data[id]'><img src='../img/icones/edit.svg'></a></td>";
            echo"<td class='deletar'><a  href='delete.php?id=$pedido_data[id]'><img src='../img/icones/delete.svg'></a></td>";
            echo"</tr>";
          }
        ?>
        </tbody>
      </table>
    <div>
  <script src="script.js"></script>
  <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'adm.php?search='+search.value;
    }
</script>
</body>

</html>