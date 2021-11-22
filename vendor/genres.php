<?php
session_start();

include 'bd.php';

$gente_name = $_POST['gente_name'];
$gente_id = $_GET['gente_id'];

// CREATE
if (isset($_POST['add'])) {

    $sql = ("INSERT INTO gentes (gente_name) VALUES(?)");

    $query = $conn->prepare($sql);
    $query->execute([$gente_name]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}

// READ

$sql = $conn->prepare("SELECT * FROM gentes");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);

// UPDATE

if (isset($_POST['edit'])) {
    $sql = ("UPDATE gentes SET gente_name=? WHERE gente_id=?");
    $query = $conn->prepare($sql);
    $query->execute([$gente_name, $gente_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}

// DELETE

if (isset($_POST['delete'])) {
    $sql = ("DELETE FROM gentes WHERE gente_id = ?");
    $query = $conn->prepare($sql);
    $query->execute([$gente_id]);
    if ($query) {
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }
}





