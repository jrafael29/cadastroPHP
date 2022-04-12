<?php session_start(); ?>

    <?php require_once '../partials/header.php' ?>
    <h1>Página de adição</h1>


    <form action="./action/adicionarAction.php" method="post" style="border: 1px solid #333; padding: 20px;">

        <?php
            if(isset($_SESSION['warning'])){
                echo '<p style="color: red;">' . $_SESSION['warning'] . "</p>";
                $_SESSION['warning'] = '';
            }
        ?>

        <label>
            Nome: <br>
            <input type="text" name="nome" require>
        </label>
    <br><br>
        <label>
            <input type="date" name="nascimento">
        </label>
    <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>