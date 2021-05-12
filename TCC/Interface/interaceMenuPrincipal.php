<?php session_start(); ?>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <title>Tela Inicial</title>
  </head>
<body>

  <!-- navegação -->
  <nav class="Navegacao">
    <div class="opcao">
        <ul >
          <img src="../Imagem/logan.png">
          <li >
          <a href="../index.php" id= "voltar"> Deslogar </a>
          </li>
          <li>
            <a href="../Interface/interfaceTabelaConcerto.php"> Consertos </a>
          </li>
          <li>
            <a href="../Interface/interfaceTabelaInquilino.php"> Inquilinos </a>
          </li>
          <li>
            <a href="../Interface/interfaceTabelaTerreno.php"> Terrenos </a>
          </li>
        </ul>
    </div>
  </nav>

  <!-- Contener da pagina -->
  <div class="contener">
    <!-- Escrita -->
    <header class="">
      <div>
        <h1 class="">Site Gerenciador de Imoveis!</h1>
        <h3>Olá Sr(a) <?php echo $_SESSION['nome'];  ?></h3>
        <p class="">Esse site é um gerenciador de imoveis, onde você pode realizar as funções que fazia manualmente, 
                a moda antiga, de forma moderna. Esqueça a caneta e o lapis e utilize esse site.</p>
            <p><b>Algumas instruçoes para auxiliar:</b></p>
            <ul>
                <li>Utilize o botão <b>"Terrenos"</b> para:</li>
              <ul>
                <li>Acessar terrenos</li>
                <li>Adicionar ou exluir Terreno</li>
                <li>Modificar o valor de alugueis</li>
                <li>Vizualizar Casas e sua atual situação</li>
              </ul>
              <li>Utilize o botão <b>"Inquilinos"</b> para:</li>
              <ul>
                <li>Acessar os inquilinos </li>
                <li>Fazer um novo contrato de um inquilino</li>
                <li>Modificar informações de inquilinos</li>
                <li>Visualizar as pedencias de algum inquilino</li>
              </ul>
                <li>Utilize o botão <b>"Consertos"</b> para:</li>
              <ul>
                <li>Vizualizar a lista de Consertos Pedentes</li>
                <li>Inserir novos Consertos</li>
                <li>Concluir um Conserto</li>
              </ul>
                
            </ul>
        </div>
    </header>
  </div>
  <!-- RodaPé -->
  <footer>
    <div>
      <p> Criado por Bryan & Para contato: bryaneduardomr@gmail.com &copy; 2021</p>
    </div>
    <!-- Fecha contener -->
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

  .contener{
    margin-top: 25px;
    margin-left: 200px;
    margin-right: 200px;
  }

  header{
    background-color: #efefef;
    border : #efefef 5px solid;
    border-radius:10px;

    width: 100%;
  }

  header div{
    padding: 20px;
    margin-bottom: 20px;
  }

/*rodapé */
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