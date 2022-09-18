<?php

    require_once("conexao.php");

    header('Content-type: application/json; charset=utf-8');
    header('Access-Control-Allow-Method: POST');

    $data = file_get_contents("php://input");
    $objData = json_decode($data);

    $nome = $objData->nome;
    $email = $objData->email;
    $senha = $objData->senha;

    $dataCad = date('Y-m-d');
    $status = 'ATIVO';
    $fotoUser = 'cliente/user.png';

    $none = stripcslashes($nome);
    $none = stripcslashes($email);
    $none = stripcslashes($senha);

    //trim - Retira espaço no início e final de uma string
    $nome = trim($nome);
    $email = trim($email);
    //$senha = trim($senha);

    var_dump($none);

    $conexao = Conexao::LigarConexao();
    $conexao->exec("SET NAMES utf8");

    if($conexao){
        $query = $conexao->prepare("INSERT INTO cliente (nomeCliente, emailCliente, senhaCliente, statusCliente, dataCadCliente, fotoCliente) VALUES ('".$nome."','".$email."','".$senha."','".$status."','".$dataCad."','".$fotoUser."');");

        $query->execute();

        $dadosCadastro = array('mens' => 'Dados cadastrado com sucesso.');

        echo json_encode($dadosCadastro);

    }else{
        $dadosCadastro = array('mens' => 'Não foi possivel realizar o cadastrado com sucesso.');
        echo json_encode($dadosCadastro);
    }

?>