<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Terreno Especifico</title>
  </head>
<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul>
        <img src="../Imagem/logan.png">
          <li>
          <a href="../Interface/interfaceTabelaTerreno.php" id="voltar"> Voltar </a>
          </li>
          <li>
          <a href="../Interface/interfaceTabelaConcerto.php"> Consertos </a>
          </li>
          <li>
            <a href="../Interface/interfaceTabelaInquilino.php"> Inquilinos </a>
          </li>
          <li>
          <a href="../Interface/interaceMenuPrincipal.php"> Inicio </a>
          </li>
        </ul>
    </div>
  </nav>
  <?php 
    require_once '../classe/terreno.php';
    $terreno = new terreno();
    $linha = $terreno->getOne(intval($_GET['idTerreno']));
  ?>
  <!-- pagina Contener -->
  <div class="contenerP">
    <header>
      <div>
        <h1><?php echo $linha['Rua'] . ", Nº " . $linha['NumeroTerreno'] . " - " . $linha['Bairro'] . ", " . $linha['Cidade'] ?></h1>
        <br><h2>Informações:</h2>
        <p><b>Quantidade de Casas:</b>  <?php echo $linha['QuantidadeCasa']; ?> </p>
        <p> <b>Valor:</b> <?php echo $linha['Valor']; ?> </p>
        <div class= "centro">
          <a href="../Interface/interfaceModificarValorTerreno.php?idTerreno=<?php echo $linha['idTerreno']; ?>" class="botao">Modificar Aluguel</a>
          <a href="../Interface/interfaceTabelaCasaTerreno.php?idTerreno=<?php echo $linha['idTerreno']; ?>" class="botao">Visializar Casas</a>
          <a href= " javascript: if(confirm('Tem certeza que deseja EXCLUIR esse terreno?')) 
          location.href = '../Controle/controlerDeletarTerreno.php?idTerreno=<?php echo $linha['idTerreno']; ?>';" class="botao">Excluir</a>
        </div>
        
      </div>  
    </header>
  </div>
  <!-- Acaba pagona contener -->

  <!-- rodape -->
  <Div class="preRodape"></Div>
  <footer>
    <div >
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
    height: 400px;
    width: 100%;
  }

  header div{
    padding: 20px;
  }

  .centro{

    text-align: center;
  }

  .botao{
    display: inline-block;
    width: 160px;
    height: 35px;
    line-height: 35px;
    margin:50px 25px 0px 25px;
    background-color: midnightblue;
    color: #FFF;
    border-radius: 10px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;
    padding: 5px;
  }

  .botao:hover{
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