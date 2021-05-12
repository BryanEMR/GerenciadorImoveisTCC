<?php
require_once '../classe/conexao.php';
/*A classe inquilino terá todas os metodos e propriedas envolvidas ao inquilino.*/

class inquilino
{
  
    function Inserir($CPF, $nome, $dataNascimento, $pedencia, $idContrato, $idUsuario, $idCasa)
    {
        $conexao = new conexao();
        $sql = "insert into  inquilino( CPF, nome, dataNascimento, pedencia, idContrato, idUsuario, idCasa) 
        values('$CPF', '$nome', '$dataNascimento', $pedencia, $idContrato, $idUsuario, $idCasa )";
        mysqli_query($conexao->conectar(), $sql);
        echo "<p> Inserido values('$CPF', '$nome', '$dataNascimento', $pedencia, $idContrato, $idUsuario, $idCasa  ) </p>";
    }

    function calcularIdade($dataNascimento)
    {
        $dataNascimento = date('d/m/Y',  strtotime($dataNascimento));
        $nascimento=explode('/',$dataNascimento); //Cria um array com os campos da data de nascimento 
        $data=date('d/m/Y'); $data=explode('/',$data); //Cria um array com os campos da data atual 
        $anos=$data[2]-$nascimento[2]; //ano atual - ano de nascimento 
        if($nascimento[1] > $data[1]) return $anos-1; //Se o mês de nascimento for maior que o mês atual, diminui um ano 
        if($nascimento[1] == $data[1]){ //se o mês de nascimento for igual ao mês atual, precisamos ver os dias 
        if($nascimento[0] <= $data[0]) { return $anos; } else{ return $anos-1; } }
        return $anos;
    }

    function getOne($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT * FROM inquilino WHERE idContrato  = $idContrato";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }

    function getOne1($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT idCasa FROM inquilino WHERE idContrato  = $idContrato";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha['idCasa'];
    }

    function getOne2($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT * FROM inquilino 
        inner join casa on casa.idCasa = inquilino.idCasa 
        inner join terreno on casa.idTerreno = terreno.idTerreno 
        WHERE idContrato   = $idContrato";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }
    function getOne3($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT * FROM inquilino 
        inner join casa on casa.idCasa = inquilino.idCasa 
        inner join terreno on casa.idTerreno = terreno.idTerreno 
        WHERE idContrato   = $idContrato";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }

    function delete($idContrato) #Funcionou
    {
        $conexao = new conexao();
        $sql1 = "delete from contrato  where idContrato = $idContrato; ";
        $sql2 = "delete from inquilino where idContrato = $idContrato";
        mysqli_query($conexao->conectar(), $sql2);
        mysqli_query($conexao->conectar(), $sql1);
        echo "<br> Linha Deletada <br>";
    }
    function getCPFs($cpf){
        $conexao = new conexao();
        $sql = "SELECT CPF FROM inquilino";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        while($linha = mysqli_fetch_assoc($resultado))
        {
            $cpf1 = strval($linha['CPF']);
            if($cpf == $cpf1){return true;}
        }
        return false;
    }
    function pedencia($pedencia, $idContrato) #Funcioando
    {
        $conexao = new conexao();
        $sql = "Update inquilino set pedencia = $pedencia where  idContrato = $idContrato";
        mysqli_query($conexao->conectar(), $sql);
    }

}