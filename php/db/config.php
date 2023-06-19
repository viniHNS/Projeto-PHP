<?php 
    define('DB_HOST', 'localhost:3306');
    define('DB_USER', 'mariadb');
    define('DB_PASS', 'mariadb');
    define('DB_NAME', 'mariadb');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
        header("Location: index.php");
    }

?>