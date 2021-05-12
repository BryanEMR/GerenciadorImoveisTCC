<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Cadastro Terreno</title>
  </head>
<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul class="">
        <img src="../Imagem/logan.png">
          <li class="">
          <a class="" href="../Interface/interfaceTabelaTerreno.php" id="voltar"> Voltar </a>
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

  <div class= "contenerP">
    <form action="../Controle/controlerCriarTerreno.php" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1><center> Novo Terreno</center></h2>
          <label> Cidade </label><br>
          <input type="text" name="Cidade" class="inserir">
        <br><br>
          <label> Bairro </label><br>
          <input type="text" name="Bairro" class="inserir">
        <br><br>
          <label> Rua </label><br>
          <input type="text" name="Rua" class="inserir">
        <br><br>
          <label> Numero do Terreno </label><br>
          <input type="text" name="NumeroTerreno" class="inserir">
        <br><br>
          <label> Quantidade de Casas </label><br>
          <input type="text" name="QuantidadeCasas" class="inserir">
        <br><br>
          <label> Valor do Aluguel </label><br>
          <input type="text" name="Valor" class="inserir">
        <br><br><br>
          <input type="submit" class="inserir" id="botao">
      </div>
    </form>
	</div>
  <!-- pré rodape -->
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
        if (f.txtCidade.value === null || f.txtCidade.value === '') { //Se não for preenchido
            alert('Preencha o nome da Cidade');
            f.txtCidade.focus();
            return false;
        }
        if (f.txtBairro.value === null || f.txtBairro.value === '') { //Se não for preenchido
            alert('Preencha o nome do Bairro');
            f.txtBairro.focus();
            return false;
        }
        if (f.txtRua.value === null || f.txtRua.value === '') { //Se não for preenchido
            alert('Preencha o nome da Rua');
            f.txtRua.focus();
            return false;
        }
        if (f.txtNumeroTerreno.value === null || f.txtNumeroTerreno.value === '' || isNaN(Number(f.txtValor.value[0]))) { //Se não for preenchido
            alert('Preencha o numero do Terreno');
            f.txtNumeroTerreno.focus();
            return false;
        }
        if (f.txtQuantidadeCasas.value === null || f.txtQuantidadeCasas.value === '' || isNaN(Number(f.txtValor.value[0]))) { //Se não for preenchido
            alert('Preencha a quantidade de casa no Terreno e com numeros');
            f.txtQuantidadeCasas.focus();
            return false;
        }
        if (f.txtValor.value === null || f.txtValor.value === '' || isNaN(Number(f.txtValor.value[0]))) { //Se não for preenchido
          alert('Preencha o valor do aluguel e só com números');
            f.txtValor.focus();
            return false;
        }
    }
</script>