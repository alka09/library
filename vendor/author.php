<?php
session_start();

include 'bd.php';

$author_name = $_POST['author_name'];
$author_id = $_GET['author_id'];

// CREATE
if (isset($_POST['add'])) {

    $sql = ("INSERT INTO authors (author_name) VALUES(?)");

    $query = $conn->prepare($sql);
    $query->execute([$author_name]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
//    $success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
//  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//    <span aria-hidden="true">&times;</span>
//  </button>
//</div>';
}

// READ

$sql = $conn->prepare("SELECT * FROM authors");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

// UPDATE

if (isset($_POST['edit'])) {
    $sql = ("UPDATE authors SET author_name=? WHERE author_id=?");
    $query = $conn->prepare($sql);
    $query->execute([$author_name, $author_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}

// DELETE

if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM authors WHERE author_id = ?");
    $query = $conn->prepare($sql);
    $query->execute([$author_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}




