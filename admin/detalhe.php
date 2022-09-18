<?php

    require_once("conexao.php");

    $conexao = Conexao::LigarConexao();
    $conexao->exec("SET NAMES utf8");

    if(!$conexao){
        echo "Não foi possivel conectar ao banco de dados!";
    }

    if(isset($_GET ['idProduto'])){ // Verifica se a variavel foi iniciada
        $idProduto = $_GET['idProduto'];

        $query = $conexao->prepare("SELECT * FROM produto WHERE idProduto = $idProduto");

        $query->execute();

        $json = array();

        $dados = $query->fetch(PDO::FETCH_ASSOC);

        array_push($json, $dados);

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }
?>