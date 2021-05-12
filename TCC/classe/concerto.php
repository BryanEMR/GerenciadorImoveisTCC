<?php
require_once '../classe/conexao.php';
/*A classe concerto terá todas os metodos e propriedas envolvidas ao concerto.*/
class concerto
{
    //Metodos com Banco de Dados

    function inserir1($data, $status, $descricao, $idCasa, $idTerreno) #Funcionou
    {
        $conexao = new conexao();
        $sql = "insert into concerto( dataConcerto, statos, descricao, idCasa, idTerreno) 
        values('$data', '$status', '$descricao', $idCasa, $idTerreno)";
        mysqli_query($conexao->conectar(), $sql);
        echo "<p> Inserido </p>";
    }

    function inserir2($data, $status, $descricao, $idTerreno) #Funcionou
    {
        $conexao = new conexao();
        $sql = "insert into concerto( dataConcerto, statos, descricao,  idTerreno) 
        values('$data', '$status', '$descricao', $idTerreno)";
        mysqli_query($conexao->conectar(), $sql);
        echo "<p> Inserido </p>";
    }

    function getOne($idConcerto) #Funcionou
    {
        $conexao = new conexao();
        $sql = "SELECT * from concerto  
        INNER JOIN terreno on concerto.idTerreno = terreno.idterreno
        INNER JOIN casa on casa.idTerreno = terreno.idterreno
        where concerto.idConcerto = $idConcerto";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }

    function delete($idConcerto) #Funcionou
    {
        $conexao = new conexao();
        $sql1 = "delete from concerto where idConcerto = '$idConcerto'; ";
        mysqli_query($conexao->conectar(), $sql1);
        echo "<br> Linha Deletada <br>";
    }

    function modificarStatos($idConcerto) #Funcionou
    {
        $conexao = new conexao();
        $sql = "Update concerto set statos = 'Andamento' where idConcerto = '$idConcerto'";
        mysqli_query($conexao->conectar(), $sql);
        echo "<br> Status Modificado <br>";
    }
}
