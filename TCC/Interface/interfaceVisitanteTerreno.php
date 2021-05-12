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
          <a href="../Interface/interfaceVisitante.php" id="voltar"> Voltar </a>
        </ul>
    </div>
  </nav>
  <?php 
    require_once '../classe/terreno.php';
    require_once '../classe/conexao.php';
      $conexao = new conexao();
    $terreno = new terreno();
    $id = intval($_GET['idTerreno']);
    $linha = $terreno->getOne( $id );
  ?>
  <!-- Escrita -->
  <div class="contenerP">
    <header>
      <div>
        <?php 
        $sql1 = "select count(*) AS resultado from casa where status = 'Desocupado' AND idTerreno = $id";
        $resultado1 = mysqli_query($conexao->conectar(), $sql1) or die("Erro ao selecionar");
        $data=mysqli_fetch_assoc($resultado1);
        $i = intval($data['resultado']);
        ?>
        <h1><?php echo $linha['Rua'] . ", Nº " . $linha['NumeroTerreno'] . " - " . $linha['Bairro'] . ", " . $linha['Cidade'] ?></h1>
        <h2> <b>Valor:</b> R$<?php echo $linha['Valor'];  ?></h2>   
        <p><b>Quantidade de Casas disponiveis:</b>  <?php echo $i; ?> </p>  <br>       
        <?php 
        $id =  intval($linha['idUsuario']);
        $sql2 = "select * from login where idLogin = $id";
        $resultado2 = mysqli_query($conexao->conectar(), $sql2) or die("Erro ao selecionar");
        $linha2 = mysqli_fetch_assoc($resultado2);
        ?>    
        <br><h2>Contato: </h2>
        <p> <b>Nome do Dono:</b><?php echo  $linha2['Nome'];?></p>
        <p> <b>Telefone:</b><?php echo  $linha2['Contato'];?></p>
        
       
        <div class= "centro">
        </div>
        
      </div>  
    </header>
  </div>

  <!-- rodapé -->
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