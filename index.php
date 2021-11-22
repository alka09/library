<?php
session_start();

if ($_SESSION['user']) {
    header('Location: views/books/books.php');
}
include 'views/layouts/header.php';
ini_set('display_errors', 'Off');
?>

<div class="container">
    <h5>Добро пожаловать в нашу библитеку. </h5>

    <h5>
        Для того, чтобы начать пользоваться услугами нашей библиотеки, <a href="views/users/register.php">зарегистрируйтесь</a>.
        Если вы уже являетесь абонентом нашей библиотеки, <a href="views/users/login.php">войдите</a>.
    </h5>

</div>


<?php

require_once 'views/layouts/footer.php';
?>
