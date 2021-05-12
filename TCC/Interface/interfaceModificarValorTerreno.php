<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Modificar Terreno</title>
  </head>
<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul class="">
        <img src="../Imagem/logan.png">
          <li class="">
          <a class="" href="../Interface/interfaceTerrenoEspecifico.php?idTerreno=<?php echo intval($_GET['idTerreno']); ?>"  id="voltar"> Voltar </a>
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
  <?php //Faço isso para inserir os valores nos input
        require_once '../classe/terreno.php';
        $terreno = new terreno();
        $linha = $terreno->getOne(intval($_GET['idTerreno']));
    ?>
  <div class= "contenerP">
    <form action="../Controle/controlerModificarValor.php?txtIdTerreno=<?php echo $linha['idTerreno']; ?>" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1><center> Modificar Terreno</center></h2>
          <label> Cidade </label><br>
          <input type="text" name="txtCidade" class="inserir" disabled="disabled" value="<?php echo $linha['Cidade']; ?>">
        <br><br>
          <label> Bairro </label><br>
          <input type="text" name="txtBairro" class="inserir" disabled="disabled" value="<?php echo $linha['Bairro']; ?>">
        <br><br>
          <label> Rua </label><br>
          <input type="text" name="txtRua" class="inserir" disabled="disabled" value="<?php echo $linha['Rua']; ?>">
        <br><br>
          <label> Numero do Terreno </label><br>
          <input type="text" name="txtNumeroTerreno" class="inserir" disabled="disabled" value="<?php echo $linha['NumeroTerreno']; ?>">
        <br><br>
          <label> Quantidade de Casas </label><br>
          <input type="text" name="txtQuantidadeCasas" class="inserir" disabled="disabled" value="<?php echo $linha['QuantidadeCasa']; ?>">
        <br><br>
          <label> Valor do Aluguel </label><br>
          <input type="text" name="txtValor" class="inserir"  value="<?php echo $linha['Valor']; ?>">
        <br><br><br>
          <input type="submit" class="inserir" id="botao">
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

/*Area de Cadastro */
.contenerP{
    margin-top: 25px;
    margin-left: 200px;
    margin-right: 200px;
}
.formulario{
  display: block;
  width: 350;
  margin: 20px auto;
  border: 15px solid midnightblue;
  background-color: midnightblue;
  color: white;
  border-radius: 10px;
}
.inserir{
  width: 350;
  color: midnightblue;
  border: grey 3px solid;
  font-size: 20;
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

<script>
    function valida(f) { //O formulário foi passado como parâmetro no onsubmit (this), aqui chamamos ele de 'f' 
        if (f.txtValor.value === null || f.txtValor.value === '' || isNaN(Number(f.txtValor.value[0]))) { //Se não for preenchido
            alert('Preencha o valor do aluguel e só com números');
            f.txtValor.focus();
            return false;
        }
    }
</script>

