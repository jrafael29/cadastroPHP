<?php
session_start();
require_once '../../../config/Config.php';
require_once '../../../controllers/UserController.php';

$control = new UserController($pdo);


$nome = filter_input(INPUT_POST, 'nome');
$nasc = filter_input(INPUT_POST, 'nascimento');


if(!empty($nome) && !empty($nasc)){
    // se os campos não forem vazios...

    $usuario = new UsuarioMysql();
    $usuario->setNome($nome);
    $usuario->setNasc($nasc);

    $control->adicionar($usuario);

    $_SESSION['success'] = "Usuario adicionar com sucesso!";
    header("Location: ../index.php");
    exit;


}else{
    $_SESSION['warning'] = "Preencha corretamente os campos.";
    header("Location: ../adicionar.php");
    exit;
}




?>