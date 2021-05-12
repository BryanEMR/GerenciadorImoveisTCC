<?php
//chamada da classe
require_once '../classe/inquilino.php';
$inquilino = new inquilino();
//variavel puxada
$idContrato = intval($_GET['idContrato']);
$pedencia = floatval($_POST['pedencia']);
echo "valor :$pedencia <br> id:$idContrato";
//execução da função para modificar valor
$inquilino->pedencia($pedencia, $idContrato);
//JavaScript para avisar a mudaça do valor
echo "<script>alert('Foi alterado')</script>";
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceInquilinoEspecifico.php?idContrato=$idContrato'; </script>";
?>