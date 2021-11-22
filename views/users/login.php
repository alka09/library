<?php
session_start();
require_once '../layouts/header.php';
include '../../vendor/signup.php';
ini_set('display_errors', 'Off');
?>
<!-- Форма авторизации -->

<div class="wrapper">

    <form action="../../vendor/signup.php" method="post" class="form">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Логин</label>
            <input type="text" name="user-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!--            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p>
            У вас нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>
        </p>
    </form>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
</div>
<?php
require_once '../layouts/footer.php';
?>
