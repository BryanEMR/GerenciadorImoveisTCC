<html>
<head>
    <meta charset="UTF-8">
    <title>SGL</title>
</head>
<body>
    <div class = "contener1">
        <div class = "contener3">
            <form action=".\Controle\controlerLogin.php" name="formName" method="post">
                <div id="baner"><h1>Gerenciador de Imoveis</h1></div>
                <div class = "contener2">
                    <br>
                    <label><h4>Usuario</h4></label>
                    <input type="text" name="login" class="inserir" placeholder = "Digite seu Usuario"><br>
                    <label><h4>Senha</h4></label>
                    <input type="password" name="senha" class="inserir" placeholder = "Digite sua Senha"><br>
                    <div class="centro">
                    <a href="javascript:formName.submit()" class="botao" >Login</a>
                    <a href=".\Interface\interfaceVisitante.php" class="botao" id="visitante">Sou Visitante</a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<style>
    html body{
        margin: 0;
        font-family: sans-serif;
        background-color: #EDEDED;
    }
    .contener1{
        position: relative;
        margin-top: 0px;
        margin-left: 20%;
        margin-right: 20%;
    }
    .contener3{
        background-color: #fff;
        border-radius:10px;
        height: 550px;
        width: 100%;
    }
    #baner{
        background: transparent url("./Imagem/dog-647528_1920.jpg") center;
        height: 150px;
        width: 100%;
        margin: 100px auto 10px auto; /*cima direita baixo esquerda*/
        border-radius:10px 10px 0px 0px;
        color: white;
        text-align: center;
        line-height:120px; 
        font-size:18px;
        
    }
    .contener2{
    margin-left: 30%;
    margin-right: 30%;
    }
    label{
        font-size:22px;
    }
    .inserir{
        font-size:16px;
        width: 100%;
        height: 30px;
        border-top: 0;
        border-left: 0;
        border-right: 0;
        border-bottom: 1px grey solid ;
    }

    .centro{

        align-items: center;
    }

    .botao{
    display: block;
    width: 100%;
    padding: 8px 5px;
    margin: 20px 0px 0px 0px;
    background-color: midnightblue;
    color: #FFF;
    border-radius: 50px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;

  }

  .botao:hover{
    background-color: black;
    color: white;
  }

    
    
</style>