<?php session_start();
require_once '../../config/Config.php';
require_once '../../controllers/UserController.php';

$control = new UserController($pdo);


$id = filter_input(INPUT_GET, 'id');
$user;
if(!empty($id)){

    $user = $control->listarPorId($id);

    if($user === false){
        $_SESSION['warning'] = "ID inexistente";
        header("Location: index.php");
        exit;
    }
}else{
    $_SESSION['warning'] = "Preencha os campos corretamente";
    header("Location: index.php");
    exit;
}

?>

    <?php require_once '../partials/header.php' ?>
    <h1>Página de edição</h1>


    <form action="./action/editarAction.php" method="post" style="border: 1px solid #333; padding: 20px;">

        <?php
            if(isset($_SESSION['warning'])){
                echo '<p style="color: red;">' . $_SESSION['warning'] . "</p>";
                $_SESSION['warning'] = '';}    
            
        ?>

        <input type="hidden" name="id" value="<?=$user->getId()?>">
        <label>
            Nome: <br>
            <input type="text" name="nome" value="<?=$user->getNome()?>" >
        </label>
    <br><br>
        <label>
            <input type="date" name="nascimento" value="<?=$user->getNasc()?>">
        </label>
    <br><br>
        <input type="submit" value="Enviar">

        <a href="./action/deletarAction.php?id=<?=$user->getId()?>" onclick="return confirm('Deseja mesmo excluir este usuario?')">Excluir usuario</a>
    </form>
</body>
</html>