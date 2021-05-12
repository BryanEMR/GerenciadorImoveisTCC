<?php
//chamada da classe
require_once '../classe/terreno.php';
$terreno = new terreno();
//variavel puxada
$idTerreno = intval($_GET['txtIdTerreno']);
$valor = floatval($_POST['txtValor']);
echo "valor :$valor <br> id:$idTerreno";
//execução da função para modificar valor
$terreno->modificarValor($valor, $idTerreno);
//JavaScript para avisar a mudaça do valor
echo "<script>alert('O valor foi alterado')</script>";
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceTerrenoEspecifico.php?idTerreno=$idTerreno'; </script>";
?>

