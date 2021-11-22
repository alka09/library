<?php
session_start();

include 'bd.php';

    $user_name = $_POST['user-name'];
    $password = md5($_POST['password']);

    $check_user = $conn->prepare("SELECT * FROM users WHERE user_name = '$user_name' AND password = '$password'");
    $check_user->execute();
    $count = $check_user->rowCount();

    if ($count > 0) {
        $result = $check_user->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            "id" => $result['user_id'],
            "name" => $result['user_name'],
        ];
        header('Location: ../views/books/book_list.php');
    } else {
        $_SESSION['message'] = "Неверная пара логин/пароль";
        header('Location: ../index.php');
    }

//?>
<!--<pre>-->
<!--    --><?php
//        print_r($result);
//    ?>
<!--</pre>-->





