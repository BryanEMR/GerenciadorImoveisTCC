<?php
//chamada da classe
require_once '../classe/contrato.php';
$contrato = new contrato();
//variavel puxada
$idContrato = intval($_GET['idContrato']);
$dataVelha = $_POST['antigaDataFim'];
$dataNova = $_POST['novaDataFim'];
echo "Data nova :$dataNova <br> id:$idContrato";
//execução da função para modificar valor
$contrato->Renovar($dataNova, $idContrato);
//JavaScript para avisar a mudaça do tempo de contrato
echo "<script>alert('Foi alterado a data Final de contrato')</script>";
//JavaScript para voltar a tela anterior
echo "<script>location.href = '../Interface/interfaceInquilinoEspecifico.php?idContrato=$idContrato'; </script>";
?>