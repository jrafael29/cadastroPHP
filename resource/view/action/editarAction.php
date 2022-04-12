<?php
session_start();
require_once '../../../config/Config.php';
require_once '../../../controllers/UserController.php';

$control = new UserController($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$nasc = filter_input(INPUT_POST, 'nascimento');

$isValid = $control->listarPorId($id);

if(!empty($nome) && !empty($nasc) && !empty($id) ){

    if(empty($isValid)){
        $_SESSION['warning'] = 'ID inexistente!';
        header("Location: ../editar.php");
        exit;
    }else{

        $usuario = new UsuarioMysql();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setNasc($nasc);

        $control->editar($usuario);

        $_SESSION['success'] = 'Usuario editado com sucesso!';
        header("Location: ../index.php");
        exit;

    }

}else{
    $_SESSION['warning'] = 'Preencha os campos corretamente!';
    header("Location: ../editar.php?id=$id");
    exit;
}
