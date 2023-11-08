<?php
class Conexao
{
    private $host = 'localhost';
    private $bdname = 'php_com_pdo';
    private $user = 'root';
    private $pass = '';


    public function conectar()
    {

        try {
            $conexao = new PDO("mysql:host=". $this->host .";dbname=" . $this->bdname, $this->user, $this->pass);

            return $conexao;

        } catch (PDOException $e) {
            echo "Ops... algo deu errado, ERROR: " . $e->getMessage() . " TENTE NOVAMENTE MAIS TARDE";
        }
    }
}



?>