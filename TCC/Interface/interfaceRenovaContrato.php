<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <title>Renovar Contrato</title>
</head>

<body>
  <?php
  require_once '../classe/contrato.php';
  $contrato = new contrato();
  $linha = $contrato->getOne(intval($_GET['idContrato']));
  ?>
  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
      <ul>
        <img src="../Imagem/logan.png">
        <li>
          <a href="../Interface/interfaceInquilinoEspecifico.php?idContrato=<?php echo $linha['idContrato']; ?>" id="voltar"> Voltar </a>
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
    <form action="../Controle/controlerRenovaContrato.php?idContrato=<?php echo $linha['idContrato']; ?>" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1>
          <center>Renovar Contrato</center>
        </h1>
        <h3>
          <center>Insirá uma nova data Posterior a antiga</center>
        </h3>
        <label> Data de Começo de Contrato </label><br>
        <input type="date" name="dataInicio" class="inserir" disabled="disabled" value="<?php echo $linha['dataInicio']; ?>">
        <br>
        <label> Antiga Data Final de Contrato </label><br>
        <input type="date" name="antigaDataFim" class="inserir" disabled="disabled" value="<?php echo $linha['dataFim']; ?>">
        <label> Nova Data Final de Contrato </label><br>
        <input type="date" name="novaDataFim" class="inserir" min='<?php echo $linha['dataFim']; ?>'>
        <br><br>
        <input type="submit" class="inserir" id="botao" onclick="valida2()">
      </div>
    </form>
  </div>
  <!-- prerodape -->
  <Div class="preRodape"></Div>
  <footer class="">
    <div class="">
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

  /*Area de Cadastro */
  .contenerP {
    margin-top: 25px;
    margin-left: 100px;
    margin-right: 100px;
  }

  .formulario {
    display: block;
    width: 600;
    margin: 20px auto;
    border: 15px solid midnightblue;
    background-color: midnightblue;
    color: white;
    border-radius: 10px;
  }

  .inserir {
    width: 100%;
    color: midnightblue;
    border: grey 3px solid;
    font-size: 20;
  }

  .fonteMenor {
    font-size: 18;
  }

  h1 {
    margin-top: 5px;
    margin-bottom: 5px;
  }

  h3 {
    margin-top: 20px;
    margin-bottom: 5px;
  }

  /*rodapé */
  .preRodape {
    margin: 50px;
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

<script>
  function valida(f) { //O formulário foi passado como parâmetro no onsubmit (this), aqui chamamos ele de 'f' 
    if (f.novaDataFim.value === null || f.novaDataFim.value === '') { //Se não for preenchido
      alert('Preencha a nova data final do contrato');
      f.novaDataFim.focus();
      return false;
    }
  }
</script>