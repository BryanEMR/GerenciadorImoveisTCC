<?php
//Classe utilizada para fazer a ligação ao banco;

class conexao
{
    //Variaveis para fazer a entrada no banco
    private $servidor = "localhost"; #servidor usado para o banco
    private $usuario = "root"; #Usuario do banco
    private $senha = ""; #senha do banco
    private $banco = "tcc"; #nome do local onde está alocado o banco

    //Função para fazer a conexão com o banco
    public function conectar()
    {
        $conectar =  mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco);
        return $conectar;
    }
}
