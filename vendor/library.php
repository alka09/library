<?php
session_start();

include 'bd.php';

$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];

// CREATE
if (isset($_POST['addbook'])) {

    $sql = ("INSERT INTO library (user_id, book_id) VALUES(?,?)");

    $query = $conn->prepare($sql);
    $query->execute([$user_id, $book_id]);
    if ($query) {
        header('Location: ../books/users_books.php');
    }
//    $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
//  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//    <span aria-hidden="true">&times;</span>
//  </button>
//</div>';
}
