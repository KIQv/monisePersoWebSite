<?php

    header("Access-Control-Allow-Origin: *");

    class Conexao{


        public static function LigarConexao(){

            $conn = new PDO("mysql:host=localhost;dbname=id19511434_persomonise","id19511434_moniseperso","9poKOSn*-K7NuTZe"); /* Definindo qual o banco de dados, host e database name, após a virgula definir nome de usuario e senha*/
            return $conn;

        }


    }   

?>