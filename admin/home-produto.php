<?php

    require_once("conexao.php");


    $conexao = Conexao::LigarConexao();
    $conexao->exec("SET NAMES utf8");


    if(!$conexao){
        echo "Não foi possivel conectar ao banco de dados!";
    }

    $query = $conexao->prepare("SELECT * FROM `produto` WHERE destaqueProduto='ATIVO'");

    $query->execute();

    // {"name":"John"}

    $json = "[";

    while ($r = $query->fetch()) {

        if($json != "["){
            $json .= ",";
        }

        $json .= '{"idProduto":"'.$r["idProduto"].'",'; // PRIMEIRO RESULTADO
            $json .= '"nomeProduto":"'.$r["nomeProduto"].'",';
            $json .= '"descProduto":"'.$r["descProduto"].'",';
            $json .= '"valorProduto":"'.$r["valorProduto"].'",';
            $json .= '"dataCadProduto":"'.$r["dataCadProduto"].'",';
            $json .= '"fotoProduto1":"'.$r["fotoProduto1"].'",';
        $json .= '"idProduto":"'.$r["idProduto"].'"}'; // ULTIMO RESULTADO

    } //FIM LAÇO

    $json .= "]";

    echo $json;

?>