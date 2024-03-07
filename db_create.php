<?php
header("Access-Control-Allow-Origin: *");
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "root";

// Connessione al server MySQL
$connection = new mysqli($servername, $username, $password);

// Verifica della connessione
if ($connection->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $connection->connect_error]));
}

// Query per creare il database
$sql = "CREATE DATABASE IF NOT EXISTS to_do_project";

// Esecuzione della query per creare il database
if ($connection->query($sql) === TRUE) {
    echo "Database creato con successo";
} else {
    echo "Errore durante la creazione del database: " . $connection->error;
}

$connection->close();
?>