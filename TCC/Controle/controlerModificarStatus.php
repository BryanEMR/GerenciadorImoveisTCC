<?php
//chamada da classe
require_once '../classe/concerto.php';
$concerto = new concerto();
//variavel puxada
$idConcerto = intval($_GET['idConcerto']);
echo "valor :$valor <br> id:$idTerreno";
//execução da função para modificar valor
$concerto->modificarStatos($idConcerto);
//JavaScript para avisar a mudaça do status
echo "<script>alert('Alterado')</script>";
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceConcertoEspecifico.php?idConcerto=$idConcerto'; </script>";
?>

