<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Visitante</title>
  </head>
<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul>
        <img src="../Imagem/logan.png">
          <li>
          <a href="../index.php" id="voltar"> Voltar </a>
        </ul>
    </div>
  </nav>

  <!-- Pagina contener -->
  <div class="contenerP">
    <header>
      <div>
        <h1>Olá Senhor Visitante</h1>
        <p>Logo abaixo está os Imoveis que Estão disponiveis para locação.</p>
        <p>Se quiser alguma informação sobre os imoveis entre em contato com o Dono Correspodente.</p>
      </div>  
    </header>
    <div class="contener1">
    <?php //Faço isso para mostrar os produtos 
      require_once '../classe/conexao.php';
      $conexao = new conexao();
      $sql = "select * from terreno";
      $resultado1 = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
      while ($linha = mysqli_fetch_assoc($resultado1)) {
        $idTerreno = intval($linha['idTerreno']);
        $sql1 = "select count(*) AS resultado from casa where status = 'Desocupado' AND idTerreno = $idTerreno";
        $resultado2 = mysqli_query($conexao->conectar(), $sql1) or die("Erro ao selecionar");
        $data=mysqli_fetch_assoc($resultado2);
        $i = intval($data['resultado']);
         ?>
      <div class="contener2">
        <div class="">
          <h2 class=""><?php echo $linha['Cidade'] . ", " . $linha['Bairro'];?></h2><!-- info Principal -->
          <h3><?php echo $linha['Rua'] . "- Nº " . $linha['NumeroTerreno']; ?></h3>
          <p>Possui <?php echo $i?> casas disponiveis.</p><!-- info secundaria -->
        </div>
        <div class="contener3">
              <a href="../Interface/interfaceVisitanteTerreno.php?idTerreno=<?php echo $linha['idTerreno']; ?>" class="botaos">Contato</a>
        </div>
      </div>
      <?php } //fechamento do WHILE ?>
    </div>
  </div>

  <!-- pré rodapé -->
  <Div class="preRodape"></Div>
  <footer class="">
    <div class="">
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
  margin-left: 150px;
  max-width: 88px; 
  max-height: 88px 
  }

  #voltar{
  margin-right: 140px;
}

  /*Area de apresentação */
  .contenerP{
    margin-top: 25px;
    margin-left: 150px;
    margin-right: 150px;
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
    margin-right: 5px;
    margin-left: 5px;
    background-color: #fff;
    border : #dedede 2px solid;
    border-radius:10px;
    height: 200px;
    width: 386px;
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