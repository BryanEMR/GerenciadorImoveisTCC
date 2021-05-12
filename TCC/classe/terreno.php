<?php
/*A classe terreno terá todas os metodos e propriedas envolvidas ao Terreno.*/
require_once '../classe/conexao.php';
class terreno
{
    //Metodos com Banco de Dados
    function inserir($cidade, $bairro, $rua, $numeroTerreno, $quantidadeCasa, $valor, $idUsuario) #Funcionou
    {
        $conexao = new conexao();
        $sql = "insert into  terreno( Cidade, Bairro, Rua, NumeroTerreno, QuantidadeCasa, Valor, idUsuario) 
        values('$cidade', '$bairro', '$rua', '$numeroTerreno', '$quantidadeCasa', '$valor', $idUsuario )";
        mysqli_query($conexao->conectar(), $sql);
        echo "<p> Inserido </p>";
    }

    function getID($bairro, $rua , $numeroTerreno, $idUsuario) #Funcionou
    {
        $conexao = new conexao();
        $sql = "select idTerreno from terreno where Bairro = '$bairro' and Rua = '$rua' and NumeroTerreno = $numeroTerreno and idUsuario = $idUsuario";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        $numero = $linha['idTerreno'];
        return intval($numero);
    }

    function getOne($idTerreno) #Funcionou
    {
        $conexao = new conexao();
        $sql = "select * from terreno where IdTerreno = $idTerreno";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        return $linha;
    }
    

    function delete($idTerreno) #Funcionou
    {
        echo $idTerreno . "<br>";
        $conexao = new conexao();
        $sql1 = "delete from casa where idTerreno = '$idTerreno'; ";
        $sql2 = "delete from terreno where idTerreno = '$idTerreno'";
        mysqli_query($conexao->conectar(), $sql1);
        mysqli_query($conexao->conectar(), $sql2);
        echo "<br> Linha Deletada <br>";
    }

    function modificarValor($valor, $idTerreno) #Funcionou
    {
        $conexao = new conexao();
        $sql = "Update terreno set valor = $valor where idTerreno = '$idTerreno'";
        mysqli_query($conexao->conectar(), $sql);
        echo "<br> Valor Modificado <br>";
    }
}
