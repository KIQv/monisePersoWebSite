<?php

    require_once("conexao.php");

    $conexao = Conexao::LigarConexao();
    $conexao->exec("SET NAMES utf8");

    if(!$conexao){
        echo "Não foi possivel conectar ao banco de dados!";
    }

    if(isset($_GET ['email']) || isset($_GET['senha'])){ // Verifica se a variavel foi iniciada
        $email = $_GET['email'];
        $senha = $_GET['senha'];

        $query = $conexao->prepare("SELECT * FROM cliente WHERE emailCliente = '$email' and senhaCliente = '$senha'");

        $query->execute();

        $json = array();

        $dados = $query->fetch(PDO::FETCH_ASSOC);

        if($dados){

            $loginJson = array(
                "msg" => array(
                    "Logado"=>"Sim",
                    "Texto"=>"Logado com sucesso"
                ),
                "Dados" => $dados
            );

            array_push($json, $loginJson);

        }else{

            $loginJson = array(
                "msg" => array(
                    "Logado"=>"Não",
                    "Texto"=>"Usuario invalido"
                ),
                "Dados" => $dados
            );

            array_push($json, $loginJson);

        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
?>