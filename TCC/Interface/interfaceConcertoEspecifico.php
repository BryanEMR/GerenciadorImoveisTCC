<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <title>Conserto Especifico</title>
</head>

<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
      <ul>
        <img src="../Imagem/logan.png">
        <li>
          <a href="../Interface/interfaceTabelaConcerto.php" id="voltar"> Voltar </a>
        </li>
        <li>
          <a href="../Interface/interaceMenuPrincipal.php"> Inicio </a>

        </li>
        <li>
          <a href="../Interface/interfaceTabelaInquilino.php"> Inquilinos </a>
        </li>
        <li>
          <a href="../Interface/interfaceTabelaTerreno.php"> Terreno </a>
        </li>
      </ul>
    </div>
  </nav>

  <?php
  require_once '../classe/concerto.php';
  $concerto = new concerto();
  $id = intval($_GET['idConcerto']);
  $conexao = new conexao();
  $sql = "SELECT * from concerto  
        INNER JOIN terreno on concerto.idTerreno = terreno.idterreno
        where idConcerto = $id";
  $resultado = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
  $linha = mysqli_fetch_assoc($resultado);

  $sql2 = "SELECT * from concerto 
        INNER JOIN casa on casa.idCasa = concerto.idCasa
        where idConcerto = $id";
  $resultado2 = mysqli_query($conexao->conectar(), $sql2);
  $linha2 = mysqli_fetch_assoc($resultado2);
  ?>
  <!-- Contener da pagina -->
  <div class="contenerP">
    <!-- Escrita -->
    <header>
      <div>
        <h1><?php echo $linha['Rua'] . ", Nº " . $linha['NumeroTerreno'] . " - " . $linha['Bairro'] . ", " . $linha['Cidade'] ?></h1>
        <?php
        if (empty($linha2['idCasa'])) {
          echo "<h2> A manutenção é no terreno</h2>";
        } else {
          echo "<h2>" . "Numero da casa: " . $linha2['numeroCasa'] . "</h2>";
        } ?>
        <br>
        <h2>Informações:</h2>
        <p><b>Status atual:</b> <?php echo $linha['statos']; ?> </p>
        <p> <b>Descrição:</b> <?php echo $linha['descricao']; ?> </p>
        <div class="centro">
          <a href="javascript: if(confirm('Alterar o Status da manutenção para ANDAMENTO?')) 
          location.href ='../Controle/controlerModificarStatus.php?idConcerto=<?php echo $linha['idConcerto']; ?>'" class="botao">Modificar Status para andamento</a>
          <a href=" javascript: if(confirm('Essa manutenção foi CONCLUIDA?')) 
          location.href = '../Controle/controlerDeletarConcerto.php?idConcerto=<?php echo $linha['idConcerto']; ?>';" class="botao">Manutenção Concluida</a>
        </div>

      </div>
    </header>
  </div>
  <!-- fechamento do contener -->

  <!-- rodapé -->
  <Div class="preRodape"></Div>
  <footer>
    <div>
      <p> Criado por Bryan & Para contato: bryaneduardomr@gmail.com &copy; 2021</p>
    </div>
  </footer>
</body>

</html>

<style>
  html body {
    margin: 0;
    font-family: sans-serif;
  }

  /*Barra de Navegação */
  nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #969696;
  }

  nav li {
    float: right;
    font-size: 18;
  }

  nav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 25px 40px;
    text-decoration: none;
  }

  nav li a:hover {
    background-color: #333;

  }

  img {
    margin-left: 200px;
    max-width: 88px;
    max-height: 88px
  }

  #voltar {
    margin-right: 190px;
  }

  /*Area de apresentação */
  .contenerP {
    margin-top: 25px;
    margin-left: 200px;
    margin-right: 200px;
  }

  header {
    background-color: #efefef;
    border: #efefef 5px solid;
    border-radius: 10px;
    height: 400px;
    width: 100%;
  }

  header div {
    padding: 20px;
  }

  .centro {

    text-align: center;
  }

  .botao {
    display: inline-block;
    width: 300px;
    height: 35px;
    line-height: 35px;
    margin: 25px 25px 0px 25px;
    background-color: midnightblue;
    color: #FFF;
    border-radius: 10px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;
    padding: 5px;
  }

  .botao:hover {
    background-color: black;
    color: white;
  }

  /*rodapé */
  .preRodape {
    margin: 100px;
  }

  footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #969696;
    color: white;
    text-align: center;
  }
</style>