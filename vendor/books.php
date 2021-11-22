<?php
session_start();

include 'bd.php';

$book_name = $_POST['book_name'];
$author = $_POST['author_id'];
$genre = $_POST['gente_id'];
$quantity = $_POST['quantity'];
$book_id = $_GET['book_id'];


// CREATE
if (isset($_POST['create'])) {

    $sql = ("INSERT INTO books (book_name, author_id, gente_id, quantity) VALUES(?,?,?,?)");

    $query = $conn->prepare($sql);
    $query->execute([$book_name, $author, $genre, $quantity]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}

// READ
$sql = $conn->prepare("SELECT * FROM books");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);


// FOR SELECT from AUTHORS
$author_sql = $conn->prepare("SELECT * FROM authors");
$author_sql->execute();
$authors_result = $author_sql->fetchAll(PDO::FETCH_OBJ);
//var_dump($authors_result); die();

// FOR SELECT from GENTES
$genre_sql = $conn->prepare("SELECT * FROM gentes");
$genre_sql->execute();
$genres_result = $genre_sql->fetchAll(PDO::FETCH_OBJ);
//var_dump($genres_result); die();


// UPDATE
if (isset($_POST['edit'])) {
    $sql = ("UPDATE books SET (book_name=?, author_id=?, gente_id=?), quantity=?) WHERE book_id=?");
    $query = $conn->prepare($sql);
    $query->execute([$book_name,$author, $genre, $quantity, $book_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}

// DELETE
if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM books WHERE book_id = ?");
    $query = $conn->prepare($sql);
    $query->execute([$book_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}






