<?php

/*A classe casa terá todas os metodos e propriedas envolvidas a casa.*/
require_once '../classe/conexao.php';
class casa
{
    private $numeroCasa;
    private $status;

    //Metodos com Banco de Dados
    function inserir($numero, $idTerreno) #Funcioando
    {
        $conexao = new conexao();
        $this->primeiraVez();
        for ($i = 1; $i <= $numero; $i++) {
            $sql = "insert into casa( numeroCasa, status, idTerreno) 
            values($this->numeroCasa, '$this->status', $idTerreno)";
            mysqli_query($conexao->conectar(), $sql);
            $this->numeroCasa++;
        }
        echo "<script>alert('Foi Inserido $numero casas junto ao terreno')</script>";
    }

    function getCasaTerreno($idTerreno) #Funcionou
    {
        $conexao = new conexao();
        $sql = "select * from casa where idTerrenoo =  $idTerreno";
        echo "<table id = 'tabela'>";
        echo "<tr><th>ID Casa</th><th>Numero da Casa</th><th>Status</th><th>ID Terreno</th></tr>\n";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr><td>{$linha['idCasa']}</td><td>{$linha['NumeroCasa']}</td><td>{$linha['Status']}</td>
            <td>{$linha['IdTerrenoo']}</td></tr>";
        }
        echo "</table>";
    }

    function getAll() #Funcionou
    {
        $conexao = new conexao();
        $sql = "select * from casa";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        echo "<table id = 'tabela'>";
        echo "<tr><th>ID Casa</th><th>Numero da Casa</th><th>Status</th><th>ID Terreno</th></tr>\n";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr><td>{$linha['idCasa']}</td><td>{$linha['NumeroCasa']}</td><td>{$linha['Status']}</td>
            <td>{$linha['IdTerrenoo']}</td></tr>";
        }
        echo "</table>";
    }

    function casaOcupada($idTerreno, $numeroCasa) #Funcioando
    {
        $conexao = new conexao();
        $sql = "Update casa set status = 'Ocupado' where  idTerreno =  $idTerreno and numeroCasa =  $numeroCasa";
        mysqli_query($conexao->conectar(), $sql);
    }

    function casaDesocupada($idCasa) #Funcioando
    {
        $conexao = new conexao();
        $sql = "Update casa set status = 'Desocupado' where  idCasa = $idCasa";
        mysqli_query($conexao->conectar(), $sql);
    }

    function getId($idTerreno, $numeroCasa) #Funcioando
    {
        $conexao = new conexao();
        $sql = "SELECT idCasa from casa where  idTerreno =  $idTerreno and numeroCasa =  $numeroCasa";
        $resultado = mysqli_query($conexao->conectar(), $sql);
        $linha = mysqli_fetch_assoc($resultado);
        $numero = $linha['idCasa'];
        return intval($numero);
    }

    //Outros Metodos

    function primeiraVez() #Funcioando
    {
        $this->numeroCasa = 1;
        $this->status = 'Desocupado';
    }
}
