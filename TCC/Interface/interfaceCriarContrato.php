<?php session_start();//start da session ?>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Novo Contrato</title>
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

  <div class= "contenerP">
    <form action="../Controle/controlerCriarContrato.php" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1><center> Novo Contrato</center></h1>
        <h3><center>Inquilino</center></h3>
          <label> Nome Completo </label><br>
          <input type="text" name="nome" class="inserir">
          <br>
          <label> CPF </label><br>
          <input type="text" name="cpf" class="inserir">
          <br>
          <label> Data de Nascimento </label><br>
          <input type="date" name="dataNascimento" class="inserir">
          <br>
          <label> Pedência </label><br>
          <input type="text" name="pedencia" class="inserir">
        <h3><center>Contrato do Inquilino </center></h3>
          <label> Data de Começo de Contrato </label><br>
          <input type="date" name="dataInicio" class="inserir" min="2010-01-01">
          <br>
          <label> Data de Final de Contrato  </label><br>
          <input type="date" name="dataFim" class="inserir" min=" " max="2030-12-30">
        <h3><center>Terreno da Locação </center></h3>
          <select name="terrenoCasa" class="inserir fonteMenor">
          <?php //Faço isso para mostrar os Terrenos
            require_once '../classe/conexao.php';
            $conexao = new conexao();
            $idUsuario = $_SESSION['id'];
            $sql = "SELECT * from terreno t inner join casa c on(c.idTerreno = t.idTerreno)  where t.idUsuario = $idUsuario  
            and c.status= 'Desocupado'";
            $resultado = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
            if(mysqli_num_rows($resultado)>0){
              while ($linha = mysqli_fetch_assoc($resultado)) {?>
                <option value="<?php echo $linha['idTerreno'] .'_'.$linha['numeroCasa']; ?>"><?php echo $linha['Cidade'] . ', ' .$linha['Bairro']. ' - ' .
                $linha['Rua']. ', Nº ' .$linha['NumeroTerreno'] . ' e Casa Numero: ' .$linha['numeroCasa']; 
          ?> </option>
          <?php }}
          if(mysqli_num_rows($resultado)==0){
            echo "<script>alert('Não possui casas para inserir um novo inquilino')</script>";
            echo "<script>location.href = '../Interface/interfaceCriarTerreno.php'; </script>";}?>
         </select>
        <br><br>
          <input type="submit" class="inserir" id="botao" onclick="valida2()">
      </div>
    </form>
	</div>
  <!-- rodapé -->
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
        if (cpf.match(validacaoCPF) === null || cpf.match(validacaoCPF) === '') { //Se não for preenchido e formato incorreto
            alert('Preencha o CPF no formato XXX.XXX.XXX-XX');
            f.cpf.focus();
            return false;
        }
        if (f.dataNascimento.value === null || f.dataNascimento.value === '') { //Se não for preenchido
            alert('Preencha a data de nascimento');
            f.dataNascimento.focus();
            return false;
        }
        if (f.pedencia.value === null || f.pedencia.value === '' || isNaN(Number(f.pedencia.value[0]))) { //Se não for preenchido e não for numero
            alert('Preencha se ele possu alguma pedencia se não possuir insira 0');
            f.pedencia.focus();
            return false;
        }
        if (f.dataInicio.value === null || f.dataInicio.value === '') { //Se não for preenchido
            alert('Preencha a data de inicio de contrato');
            f.dataInicio.focus();
            return false;
        }
        if (f.dataFim.value === null || f.dataFim.value === '') { //Se não for preenchido
          alert('Preencha a data final do contrato');
            f.dataFim.focus();
            return false;
        }
    }
    function dataAtual(){
      now = new Date;
      return now;
    }
</script>