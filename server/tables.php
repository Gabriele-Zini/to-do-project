<?php
header("Access-Control-Allow-Origin:*");
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "to_do_project";

// Connessione al server MySQL
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $connection->connect_error]));
}

$sql_users = "CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($connection->query($sql_users) === TRUE) {
    echo 'tabella creata con successo';
} else {
    echo 'errore nella creazione della tabella' . $connection->error;
}


$sql_to_dos = "CREATE TABLE IF NOT EXISTS to_dos(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED,
    todo TEXT NOT NULL, 
    done BOOLEAN NOT NULL DEFAULT 0, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

if ($connection->query($sql_to_dos) === TRUE) {
    echo 'tabella creata con successo';
} else {
    echo 'errore nella creazione della tabella' . $connection->error;
}

$connection->close();
