<?php
session_start();
require_once '../../../config/Config.php';
require_once '../../../controllers/UserController.php';

$control = new UserController($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $control->deletar($id);

    $_SESSION['success'] = 'Usuario excluido com sucesso!';
    header("Location: ../index.php");
    exit;
}else{
    $_SESSION['warning'] = 'Você não pode deletar um usuario inexistente!';
    header("Location: ../index.php");
    exit;
}