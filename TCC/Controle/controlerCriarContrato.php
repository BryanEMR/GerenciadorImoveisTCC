<?php
session_start();
//Arquivos chamadas 
require_once '../classe/contrato.php';
require_once '../classe/inquilino.php';
require_once '../classe/casa.php';

//Variaveis Criadas e ligadas ao Formulario
$nome = strval($_POST['nome']);
$cpf = strval($_POST['cpf']);
$dataNascimento = $_POST['dataNascimento'];
$pedencia =floatval($_POST['pedencia']);
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$idUsuario = $_SESSION['id'];
$terrenoCasa = strval($_POST['terrenoCasa']);
$casaTerreno = explode('_',$terrenoCasa);
//Chamada  da classe e função
$contrato = new contrato();
$inquilino = new inquilino();
$casa = new casa();
$i = $inquilino->calcularIdade($dataNascimento);
//JavaScript para validação
if($inquilino->getCPFs($cpf) ){
    echo "<script>alert('O CPF inserido Já foi cadastrado no sistema');</script>";
    echo "<script>location.href = '../Interface/interfaceCriarContrato.php'; </script>";
    
}
elseif($i <=17){
    echo "<script>alert('Pessoa inserida possui menos de 18 anos');</script>";
    echo "<script>location.href = '../Interface/interfaceCriarContrato.php'; </script>";
}
elseif(strtotime($dataInicio) > strtotime($dataFim)){
    echo "<script>alert('Data de inicio de contrato é maior do que fim de contrato');</script>";
    echo "<script>location.href = '../Interface/interfaceCriarContrato.php'; </script>";
}
elseif(strtotime($dataFim) <=  strtotime(date('Y/m/d'))){
    echo "<script>alert('Data de  fim de contrato tem que ser maior que o dia atual');</script>";
    echo "<script>location.href = '../Interface/interfaceCriarContrato.php'; </script>";
}
//se der tudo certo faz o contrato
else {
    $contrato->inserir($dataInicio, $dataFim);
    $idContrato = $contrato->getId($dataInicio, $dataFim);
    $idCasa = $casa->getId($casaTerreno[0],$casaTerreno[1]);
    $inquilino->inserir($cpf,$nome, $dataNascimento, $pedencia, $idContrato, $idUsuario, $idCasa);
    $casa->casaOcupada($casaTerreno[0],$casaTerreno[1]);  
//JavaScript para voltar a tela Inicial dos Terrenos
    echo "<script>alert('Cadastrado no sistema');</script>";
    echo "<script>location.href = '../Interface/interfaceTabelaInquilino.php'; </script>";
}


?>