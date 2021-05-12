<?php
//chamada da classe
require_once '../classe/concerto.php';
$concerto = new concerto();
//variavel puxada
$idConcerto = intval($_GET['idConcerto']);
//execução da função
$concerto->delete($idConcerto);
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceTabelaConcerto.php'; </script>";
?>

