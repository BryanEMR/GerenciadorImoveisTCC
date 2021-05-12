<?php
//Arquivos chamadas e start da sesson
require_once '../classe/concerto.php';
//Variaveis Criadas e ligadas ao Formulario
$status = strval($_POST['status']);
$descricao = strval($_POST['descricao']);
$terrenoCasa = strval($_POST['terrenoCasa']);
$terrenoCasa = explode('_',$terrenoCasa);
$data = date('y/m/d');
//Chamada  da classe e função
echo "($data, $status, $descricao, $terrenoCasa[1], $terrenoCasa[0])";
$concerto = new concerto();
if($terrenoCasa[1] != 0){
    echo "($data, $status, $descricao, $terrenoCasa[1], $terrenoCasa[0]) 1";
    $concerto->inserir1($data, $status, $descricao, $terrenoCasa[1], $terrenoCasa[0]);
    
}
else {
    echo "($data, $status, $descricao, $terrenoCasa[1], $terrenoCasa[0]) 2";
    $concerto->inserir2($data, $status, $descricao,  $terrenoCasa[0]);
}

//JavaScript para voltar a tela Inicial dos Terrenos
echo "<script>alert('Cadastrado no sistema');</script>";
echo "<script>location.href = '../Interface/interfaceTabelaConcerto.php'; </script>";

?>