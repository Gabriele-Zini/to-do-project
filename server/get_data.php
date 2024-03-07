<?php
include 'db_connection.php';

if (!isset($_SESSION['id'])) {
    // Reindirizza l'utente alla pagina di login se non è loggato
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];

// Esegui la query per recuperare i to do dell'utente loggato
$selectUserToDoQuery = "SELECT * FROM `to_dos` WHERE `user_id` = $user_id";
$selectUserToDoResult = $connection->query($selectUserToDoQuery);

// Se ci sono risultati, visualizzali
if ($selectUserToDoResult && $selectUserToDoResult->num_rows > 0) {
    while ($row = $selectUserToDoResult->fetch_assoc()) {
        $todoTextClass = $row['done'] === '1' ? 'text-decoration-line-through' : '';
        echo "<li class='list-group-item d-flex col-5 justify-content-between'>" .
            "<span class='cursor-pointer me-2 $todoTextClass'>" . $row["todo"] . "</span>" .
            "<div class='d-flex align-items-center'>" .
            "<form action='./server/server.php' method='POST'>" .
            "<input type='hidden' name='deleteId' value='" . $row['id'] . "'>" .
            "<button type='submit' class='btn btn-danger me-3'>X</button>" .
            "</form>" .
            "<form action='./server/server.php' method='POST'>" .
            "<input type='hidden' name='toggleId' value='" . $row['id'] . "'>" .
            "<input type='hidden' name='toggleStatus' value='" . $row['done'] . "'>" . 
            "<button type='submit' class='btn btn-success'>done</button>" .
            "</form>" .
            "</div>" .
            "</li>";
    }
} else {
    echo "<li class='list-group-item'>Nessun todo trovato.</li>";
}

// Chiudi la connessione
$connection->close();
