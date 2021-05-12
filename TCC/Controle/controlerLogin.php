<?php
//inicialização de classe e session
session_start();
require_once '../classe/conexao.php';
$conexao = new conexao();
//puxando variaveis
$usuario = strval($_POST['login']);
$entrar = strval($_POST['entrar']);
$senha = strval($_POST['senha']);
//validação
$sql = " select * from login where usuario = '$usuario' AND senha = '$senha' ";
  if (isset($entrar)) {
    $resultado = mysqli_query($conexao->conectar(), $sql) or die("erro ao selecionar");
      if (mysqli_num_rows($resultado)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');
        location.href = '../index.php';</script>";
        die();
      }
      //se não der problemas
      else{

        $linha = mysqli_fetch_assoc($resultado);
        $nome = $linha['Nome']; 
        $_SESSION['nome'] = $nome;
        $id = $linha['idLogin']; 
        $_SESSION['id'] = $id;
        echo "<script>location.href = '../Interface/interaceMenuPrincipal.php'; </script>";
      }
  }
?>
