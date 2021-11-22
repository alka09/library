<?php
session_start();
include '../layouts/header.php';
include '../../vendor/signup.php';
if ($_SESSION['user']) {
    header('Location: views/books/books.php');
}
?>
<!-- Форма авторизации -->
<div class="wrapper">

<form name="registration" action="../../vendor/registration.php" method="POST" class="form">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Login</label>
        <input type="text"name="user-name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите ваше имя">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Repeat password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirm" placeholder="Повторите пароль">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <p>
        У вас уже есть аккаунт - <a href="login.php">войдите</a>
    </p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</div>
<?php
require_once '../layouts/footer.php';
?>
