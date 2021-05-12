<?php session_start(); //start da session?>
<html lang="pt_br">

<head>
  <meta charset="utf-8">
  <title>Novo Conserto</title>
</head>

<body>

  <!-- Navegação -->
  <nav class="Navegacao">
    <div class="opcao">
      <ul>
        <img src="../Imagem/logan.png">
        <li>
          <a href="../Interface/interfaceTabelaConcerto.php" id="voltar"> Voltar </a>
        </li>
        <li>
          <a href="../Interface/interaceMenuPrincipal.php"> Inicio </a>

        </li>
        <li>
          <a href="../Interface/interfaceTabelaInquilino.php"> Inquilinos </a>
        </li>
        <li>
          <a href="../Interface/interfaceTabelaTerreno.php"> Terreno </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="contenerP">
    <form action="../Controle/controlerCriarConcerto.php" method="post" class="formulario" onsubmit="return valida(this)">
      <div>
        <h1>
          <center> Novo Conserto</center>
        </h1>
        <label> Status</label><br>
        <select name="status" class="inserir">
          <option value="Estagnado">Estagnado</option>
          <option value="Andamento">Andamento</option>
        </select>
        <br>
        <label> Descrição </label><br>
        <input type="text" name="descricao" class="inserir">
        <br>
        <label> Local que nescecita de conserto </label><br>
        <select name="terrenoCasa" class="inserir fonteMenor">
          <optgroup label="Terrenos">
            <?php //Faço isso para mostrar os Terrenos
            require_once '../classe/conexao.php';
            $conexao = new conexao();
            $idUsuario = $_SESSION['id'];
            $sql1 = "SELECT * from terreno t where t.idUsuario = $idUsuario";
            $resultado1 = mysqli_query($conexao->conectar(), $sql1);
            if (mysqli_num_rows($resultado1) > 0) {
              while ($linha1 = mysqli_fetch_assoc($resultado1)) { ?>
                <option value="<?php echo $linha1['idTerreno'] . '_0' ?>"><?php echo $linha1['Cidade'] . ', ' . $linha1['Bairro'] . ' - ' .
                                                                            $linha1['Rua'] . ', Nº ' . $linha1['NumeroTerreno'] ?> </option>
            <?php }
            }
            if (mysqli_num_rows($resultado1) == 0) {
              echo "<script>alert('Não possui Terrenos para criar um novo Concerto')</script>";
              echo "<script>location.href = '../Interface/interfaceCriarTerreno.php'; </script>";
            } ?>
          </optgroup>

          <optgroup label="Terrenos e Casas">
            <?php //Faço isso para mostrar os Terrenos e casas
            $sql2 = "SELECT * from terreno t inner join casa c on c.idTerreno = t.idTerreno  where t.idUsuario = $idUsuario";
            $resultado2 = mysqli_query($conexao->conectar(), $sql2);

            while ($linha2 = mysqli_fetch_assoc($resultado2)) { ?>
              <option value="<?php echo $linha2['idTerreno'] . '_' . $linha2['idCasa']; ?>"><?php echo $linha2['Cidade'] . ', ' . $linha2['Bairro'] . ' - ' .
                                                                                            $linha2['Rua'] . ', Nº ' . $linha2['NumeroTerreno'] . ' e Casa Numero: ' . $linha2['numeroCasa'];
                                                                                          ?> </option>
            <?php } ?>
          </optgroup>
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
    if (f.descricao.value === null || f.descricao.value === '') { //Se não for preenchido
      alert('Preencha a descrição do concerto');
      f.descricao.focus();
      return false;
    }
  }
</script>