<?php
session_start();

require_once 'bd.php';

$user_name = $_POST['user-name'] ?? '';
$password = $_POST['password'] ?? '';
$password_confirm = $_POST['password_confirm'];
$user_id = $_GET['user_id'];

if ($password === $password_confirm) {
    if ($conn) {
        $password = md5($password);
        $sql = ("INSERT INTO users (user_name, password) VALUES(?,?)");
        $query = $conn->prepare($sql);
        $query->execute([$user_name, $password]);

    }
    $_SESSION['message'] = "Регистрация прошла успешно";
    header('Location: ../views/users/login.php');
} else {
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: ../views/users/register.php');
}