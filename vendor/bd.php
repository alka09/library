<?php

$host='localhost';
$db = 'postgres';
$username = 'postgres';
$password = 'nafanail';
# Создаем соединение с базой PostgreSQL с указанными выше параметрами
$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

try {
    $conn = new PDO($dsn);
} catch (PDOException $e) {
    echo "Ошибка соединения с БД ". $e->getMessage();
}