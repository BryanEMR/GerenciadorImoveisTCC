<?php
require_once '../classe/conexao.php';
class contrato
{
    //Banco de dados metodos
    function Inserir($dataInicio, $dataFim)
    {
      $conexao = new conexao();
      $sql = "insert into  contrato( dataInicio, dataFim) 
      values('$dataInicio', '$dataFim')";
      mysqli_query($conexao->conectar(), $sql);
      echo "<p> Inserido </p>";
    }

    

    function getId($dataInicio, $dataFim){
        $conexao = new conexao();
        $dataInicio = date('y/m/d',  strtotime($dataInicio));
        $dataFim = date('y/m/d',  strtotime($dataFim));
        $sql1 = "select MAX(idContrato) AS id from contrato where dataInicio = '$dataInicio' and dataFim = '$dataFim'";
        $resultado1 = mysqli_query($conexao->conectar(), $sql1);
        $data=mysqli_fetch_assoc($resultado1);
        $i = intval($data['id']);

        return intval($i);
    }

    function Renovar($dataNova, $idContrato) #Funcioando
    {
        $conexao = new conexao();
        $sql = "Update contrato set dataFim = '$dataNova' where  idContrato = $idContrato";
        mysqli_query($conexao->conectar(), $sql);
    }

    function getOne($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT * FROM contrato WHERE idContrato  = $idContrato";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }
}