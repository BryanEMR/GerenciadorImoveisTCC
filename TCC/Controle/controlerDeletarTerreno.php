<?php
//chamada da classe
require_once '../classe/terreno.php';
require_once '../classe/casa.php';
require_once '../classe/inquilino.php';
require_once '../classe/concerto.php';
require_once '../classe/conexao.php';
$terreno = new terreno();
$casa = new casa();
$inquilino = new inquilino();
$concerto = new concerto();
$conexao = new conexao();
//variavel puxada
$idTerreno = intval($_GET['idTerreno']);
$sql1 ="select * from casa where idTerreno = $idTerreno and  status = 'Ocupado'";
$sql3 ="select * from concerto where idTerreno = $idTerreno ";
$resultado1 = mysqli_query($conexao->conectar(), $sql1) or die("Erro1 ao selecionar");
$resultado3 = mysqli_query($conexao->conectar(), $sql3) or die("Erro3 ao selecionar");
//se for verdadeiro, já possui terrenos com inquilinos ou concertos pedentes
if(mysqli_num_rows($resultado1)>0){
    echo "<script>alert('Possui Inquilino registrado nesse terreno. Exclua esse(s) inquilinos para excluir o terreno');</script>";
    echo "<script>location.href = '../Interface/interfaceTabelaTerreno.php'; </script>";
}
elseif(mysqli_num_rows($resultado3)>0){
    echo "<script>alert('Possui concertos registrados nesse terreno. Conclua ele(s) para excluir o terreno');</script>";
    echo "<script>location.href = '../Interface/interfaceTabelaTerreno.php'; </script>";
}
//se der tudo certo entra aqui execulta a função de excluir terreno e vonta para o menu de terrenos
else{
    $terreno->delete($idTerreno);
    echo "<script>alert('Terreno Excluido!');</script>";
    echo "<script>location.href = '../Interface/interfaceTabelaTerreno.php'; </script>";
}

