<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Alterar Pedencia</title>
  </head>
<body>
<?php 
 require_once '../classe/inquilino.php';
 $inquilino = new inquilino();
 $linha = $inquilino->getOne2(intval($_GET['idContrato']));
 ?>
  <!-- Navegaçãao -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul>
        <img src="../Imagem/logan.png">
          <li>
          <a href="../Interface/interfaceInquilinoEspecifico.php?idContrato=<?php echo $linha['idContrato'];?>" id="voltar"> Voltar </a>
          </li>
          <li>
          <a href="../interface/interfaceTabelaConcerto.php"> Consertos </a>
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
  <div class= "contenerP">
    <form action="../Controle/controlerAlterarPedencia.php?idContrato=<?php echo $linha['idContrato']; ?>" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1><center>Alterar Pedencia</center></h1>
        <h3><center>Insirá o novo valor</center></h3>
          <label> Nome Completo </label><br>
          <input type="text" name="nome" class="inserir" disabled="disabled" value="<?php echo $linha['nome']; ?>">
          <br>
          <label> CPF </label><br>
          <input type="text" name="cpf" class="inserir" disabled="disabled" value="<?php echo $linha['CPF']; ?>">
          <br>
          <label> Data de Nascimento </label><br>
          <input type="date" name="dataNascimento" class="inserir" disabled="disabled" value="<?php echo $linha['dataNascimento']; ?>">
          <br>
          <label> Pedência </label><br>
          <input type="text" name="pedencia" class="inserir" value="<?php echo $linha['pedencia']; ?>">
         </select>
        <br><br>
          <input type="submit" class="inserir" id="botao" onclick="valida2()">
      </div>
    </form>
	</div>
  <!-- RodapÉ -->
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
      margin-left: 100px;
      margin-right: 100px;
  }
  .formulario{
    display: block;
    width: 600;
    margin: 20px auto;
    border: 15px solid midnightblue;
    background-color: midnightblue;
    color: white;
    border-radius: 10px;
  }
  .inserir{
    width: 100%;
    color: midnightblue;
    border: grey 3px solid;
    font-size: 20;
  }
  .fonteMenor{
    font-size: 18;
  }
  h1{
    margin-top:5px;
    margin-bottom:5px;
  }
  h3{
    margin-top:20px;
    margin-bottom:5px;
  }
  /*rodapé */
  .preRodape{
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
        //variaveis chamando as expressoes
        var cpf = f.cpf.value;
        //variaveis com as expressoes regulares
        var validacaoCPF = /[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/g;
        if (f.nome.value === null || f.nome.value === '') { //Se não for preenchido
            alert('Preencha o nome do Inquilino');
            f.nome.focus();
            return false;
        }
        if (cpf.match(validacaoCPF) === null || cpf.match(validacaoCPF) === '') { //Se não for preenchido e validação do formato
            alert('Preencha o CPF no formato XXX.XXX.XXX-XX');
            f.cpf.focus();
            return false;
        }
        if (f.dataNascimento.value === null || f.dataNascimento.value === '') { //Se não for preenchido
            alert('Preencha a data de nascimento');
            f.dataNascimento.focus();
            return false;
        }
        if (f.pedencia.value === null || f.pedencia.value === '' || isNaN(Number(f.pedencia.value[0]))) { //Se não for preenchido
            alert('Preencha se ele possu alguma pedencia se não possuir insira 0');
            f.pedencia.focus();
            return false;
        }     
    }
</script>