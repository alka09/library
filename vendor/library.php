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
//    var_dump($query); die();
    if ($query) {
        header('Location: ../views/books/users_books.php');
    }

// ВЫБОРКА КНИГ АБОНЕНТА

    $user_id = $_POST['user']['id'];
    $query_books = "
    SELECT s.book_id, s.book_name, d.book_id, d.user_id 
    FROM library d 
    INNER JOIN books s ON s.book_id = d.book_id
    WHERE
    d.user_id = $user_id
    ";

    $sql = $conn->prepare($query_books);
    $sql->execute();
    $result_user_books = $sql->fetchAll(PDO::FETCH_OBJ);



//    $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
//  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//    <span aria-hidden="true">&times;</span>
//  </button>
//</div>';
}
