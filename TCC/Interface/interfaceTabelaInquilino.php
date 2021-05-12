<?php session_start(); ?>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Inquilino</title>
  </head>
<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul>
        <img src="../Imagem/logan.png">
          <li>
          <a href="../Interface/interaceMenuPrincipal.php" id="voltar"> Voltar </a>
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

  <div class="contenerP">
    <header>
      <div>
        <h1>Inquilinos</h1>
        <p>Logo abaixo está os inquilinos que foram adicionados</p>
        <a href="..\Interface\interfaceCriarContrato.php" class="botao">Novo Contrato</a>
      </div>  
    </header>
    <div class="contener1">
    <?php //Faço isso para mostrar os produtos 
      require_once '../classe/conexao.php';
      require_once '../classe/inquilino.php';
      require_once '../classe/contrato.php';
      $conexao = new conexao();
      $inquilino = new inquilino();
      $idUsuario = $_SESSION['id'];
      $sql = "select * from inquilino where idUsuario = $idUsuario";
      $resultado = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
      while ($linha = mysqli_fetch_assoc($resultado)) { 
      $idade = $inquilino->calcularIdade($linha['dataNascimento']);
      $idContrato = $linha['idContrato'];
      $sql2 = "select * from contrato where idContrato = $idContrato ";
      $resultado2 = mysqli_query($conexao->conectar(), $sql2) or die("Erro ao selecionar");
      $linha2 = mysqli_fetch_assoc($resultado2);
      $data = date('d/m/y',  strtotime($linha2['dataFim']));
     ?>
      <div class="contener2">
        <div>
          <h2><?php echo $linha['nome'] . ", $idade anos";?></h2><!-- info Principal -->
          <h3><?php echo "Pedência atual: " . $linha['pedencia']; ?> Reais</h3><!-- info secundaria -->
          <p><?php echo "Dia Final do Contrato: " . $data ?></p><!-- info secundaria -->
        </div>
        <div class="contener3">
        <a href="../Interface/interfaceInquilinoEspecifico.php?idContrato=<?php echo $linha['idContrato']; ?>" class="botaos">Visualizar</a>
        </div>
      </div>
      <?php } //fechamento do WHILE ?>
    </div>
  </div>

  <!-- prérodape -->
  <Div class="preRodape"></Div>
  <footer>
    <div>
    <p> Criado por Bryan & Para contato: bryaneduardomr@gmail.com &copy; 2021</p>
    </div>
  </footer>
</body>
</html>

<style>
html body{
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

  #voltar{
  margin-right: 190px;
}

  /*Area de apresentação */
  .contenerP{
    margin-top: 25px;
    margin-left: 200px;
    margin-right: 200px;
  }

  header{
    background-color: #efefef;
    border : #efefef 5px solid;
    border-radius:10px;
    height: 200px;
    width: 100%;
  }

  header div{
    padding: 20px;
  }

  .botao{
    display: block;
    width: 160px;
    height: 35px;
    line-height: 35px;
    padding: 8px 5px;
    margin: 20px;
    background-color: midnightblue;
    color: #FFF;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;
  }

  .botao:hover{
    background-color: black;
    color: white;
  }

  .contener2{
    display: inline-block;
    position: relative;
    margin-top: 30px;
    background-color: #fff;
    border : #dedede 2px solid;
    border-radius:10px;
    height: 230px;
    width: 366px;
    text-align:center;
  }
  .contener3{
    position: absolute;
    bottom: -2;
    right:-2;
    margin: 0;
    background-color: #efefef;
    width: 100%;
    border : #dedede 2px solid;
    border-radius:0px 0px 10px 10px;
    text-align:center;
  }

  .botaos{
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
    margin-bottom: 10px;
    width: 110px;
    height: 30px;
    line-height: 30px;
    background-color: midnightblue;
    color: #FFF;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
  }

  .botaos:hover{
    background-color: black;
    color: white;
  }

  /*rodapé */
  .preRodape{
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