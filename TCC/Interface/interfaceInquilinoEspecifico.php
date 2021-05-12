<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <title>Inquilino Especifico</title>
</head>

<body>

  <!-- navegação -->
  <nav class="Navegacao">
    <div class="opcao">
      <ul>
        <img src="../Imagem/logan.png">
        <li>
          <a href="../Interface/interfaceTabelaInquilino.php" id="voltar"> Voltar </a>
        </li>
        <li>
          <a href="../Interface/interfaceTabelaConcerto.php"> Consertos </a>
        </li>
        <li>
          <a href="../Interface/interaceMenuPrincipal.php"> Inicio </a>
        </li>
        <li>
          <a href="../Interface/interfaceTabelaTerreno.php"> Terreno </a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
  require_once '../classe/inquilino.php';
  require_once '../classe/conexao.php';
  $inquilino = new inquilino();
  $conexao = new conexao();
  $idContrato = $_GET['idContrato'];
  $linha = $inquilino->getOne2(intval($idContrato));
  $data = $linha['dataNascimento'];
  $idade = $inquilino->calcularIdade($data);
  $sql = "select * from contrato where idContrato = $idContrato ";
  $resultado = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
  $linha2 = mysqli_fetch_assoc($resultado);
  $data1 = date('d/m/y',  strtotime($linha2['dataFim']));
  $data2 = date('d/m/y',  strtotime($linha2['dataInicio']));
  ?>
  <div class="contenerP">
    <header>
      <div>
        <h1><?php echo $linha['nome'] . ", $idade Anos " ?></h1>
        <br>
        <h2>Informações:</h2>
        <p><b>Endereço Terreno:</b><?php echo ' ' . $linha['Cidade'] . ', ' . $linha['Bairro'] . ' - ' .
                                      $linha['Rua'] . ', Nº ' . $linha['NumeroTerreno']; ?> </p>
        <p><b>Número Casa: </b><?php echo $linha['numeroCasa']; ?> </p>
        <p> <b>Pedencia:</b> <?php echo $linha['pedencia']; ?> Reais</p>
        <p> <b>Dia de Começo de Contrato: </b><?php echo $data2 ?></p>
        <p> <b>Dia Final do Contrato: </b><?php echo $data1 ?></p>
        <div class="centro">
          <a href="../Interface/interfaceRenovaContrato.php?idContrato=<?php echo $linha['idContrato']; ?>" class="botao">Renovar Contrato</a>
          <a href="../Interface/interfaceAlterarPedencia.php?idContrato=<?php echo $linha['idContrato']; ?>" class="botao">Alterar Pedência</a>
          <a href=" javascript: if(confirm('Tem certeza que deseja EXCLUIR esse inquilino?')) 
          location.href = '../Controle/controlerDeletarInquilino.php?idContrato=<?php echo $linha['idContrato']; ?>';" class="botao">Excluir</a>
        </div>
      </div>
    </header>
  </div>

  <!-- pré rodapé -->
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
    height: 450px;
    width: 100%;
  }

  header div {
    padding: 15px;
  }

  .centro {

    text-align: center;
  }

  .botao {
    display: inline-block;
    width: 160px;
    height: 35px;
    line-height: 35px;
    margin: 25px;
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