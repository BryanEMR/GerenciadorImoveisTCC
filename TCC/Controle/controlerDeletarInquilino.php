<?php
//chamada da classe
require_once '../classe/inquilino.php';
require_once '../classe/casa.php';
$inquilino = new inquilino();
$casa = new casa();
//variavel puxada
$idContrato = intval($_GET['idContrato']);
//execução da função
$idCasa = $inquilino->getOne1($idContrato);
$inquilino->delete($idContrato);
$casa->casaDesocupada($idCasa);
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceTabelaInquilino.php'; </script>";
?>

