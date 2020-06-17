<?php
// данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ocean";

// подключение к базе данных
$conn = new mysqli($server, $username, $password, $dbname);

// проверить соединение
if ($conn->connect_error) {
die("Ошибка: невозможно подключиться: " . $conn->connect_error);
} 

// установим кодировку для корректного отображения кириллицы
$conn->set_charset('utf8');
