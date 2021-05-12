<?php
session_start();
//Arquivos chamadas e start da sesson
require_once '../classe/terreno.php';
require_once '../classe/casa.php';
//Variaveis Criadas e ligadas ao Formulario
$cidade = strval($_POST['Cidade']);
$bairro = strval($_POST['Bairro']);
$rua = strval($_POST['Rua']) ;
$numeroTerreno =intval($_POST['NumeroTerreno']);
$quantidadeCasas = intval($_POST['QuantidadeCasas']);
$valor = floatval($_POST['Valor']);
$idUsuario = intval($_SESSION['id']);
//SQL para validação
$conexao = new conexao();
$sql = "select * from terreno where Bairro = '$bairro' and Rua = '$rua' and NumeroTerreno = $numeroTerreno and idUsuario = $idUsuario";
$resultado = mysqli_query($conexao->conectar(), $sql) or die("Erro ao selecionar");
//se for verdadeiro, já possui um terreno registrado com esse endereço.
if(mysqli_num_rows($resultado)>=1){
    echo "<script>alert('O Endereço inserido corresponde a um dos terrenos já inserido')</script>";
    echo "<script>location.href = '../Interface/interfaceCriarTerreno.php'; </script>";
}
//Se der tudo certo entra aqui e cria um novo terreno e as casas
else{
    //Chamada  da classe e função
    $terreno = new terreno();
    $terreno->inserir($cidade,$bairro, $rua, $numeroTerreno, $quantidadeCasas, $valor, $idUsuario);
    $result = $terreno->getID($bairro, $rua, $numeroTerreno, $idUsuario);
    $casa = new casa();
    $casa->inserir($quantidadeCasas, $result);
    //JavaScript para voltar a tela Inicial dos Terrenos
    echo "<script>location.href = '../Interface/interfaceTabelaTerreno.php'; </script>";
}

?>