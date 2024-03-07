<?php
header("Access-Contol-Allow-Origin:*");
session_start();

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "to_do_project";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection && $connection->connect_error) {
    echo json_encode(['succes' => false, "message" => "connection failed"]);
}

$query1 = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';";/* imposta la modalità SQL del server in modo che i valori generati automaticamente per le colonne auto_increment non siano più impostati su zero se non è stato specificato alcun valore durante l'inserimento di una riga. */
$query2 = "SET time_zone = '+00:00';"; /* imposta il fuso orario del server del database su +00:00, che è il fuso orario UTC (Coordinated Universal Time). */

// Eseguire le query per impostare la modalità SQL e il fuso orario solo se la connessione è avvenuta con successo
if ($connection->query($query1) === false || $connection->query($query2) === false) {
    die(json_encode(['success' => false, 'message' => 'Error setting SQL mode or time zone: ' . $connection->error]));
}
