<?php
session_start();
require_once '../partials/header.php';
require_once '../../config/Config.php';
require_once '../../controllers/UserController.php';

$control = new UserController($pdo);

$dados = $control->listar();
?>


<h1>Inicio</h1>


<?php 

if(isset($_SESSION['success'])){
    echo '<p style="color: green;">' . $_SESSION['success'] . "</p>";
    $_SESSION['success'] = '';
}

if(isset($_SESSION['warning'])){
    echo '<p style="color: red;">' . $_SESSION['warning'] . "</p>";
    $_SESSION['warning'] = '';
}

?>
<div class="container">
    <table border="1" width="45%">
        <tr align="left">
            <th>NOME</th>
            <th>NASCIMENTO</th>
        </tr>
        
        <?php foreach($dados as $user): ?>

            <tr align="center">
                    <td>
                        <a href="editar.php?id=<?=$user->getId()?>">
                            <?= $user->getNome() ?>
                        </a>
                    </td>
                
                <td> <?= $user->getNasc() ?> </td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>

