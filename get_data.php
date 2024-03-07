<?php
include 'db_connection.php';

// Esegui la query per recuperare i todo dal database
$selectAllQuery = "SELECT * FROM `to_dos`";
$selectAllResult = $connection->query($selectAllQuery);

// Se ci sono risultati, visualizzali
if ($selectAllResult && $selectAllResult->num_rows > 0) {
    while ($row = $selectAllResult->fetch_assoc()) {
        $todoTextClass = $row['done'] === '1' ? 'text-decoration-line-through' : '';
        echo "<li class='list-group-item d-flex col-5 justify-content-between'>" .
            "<span class='cursor-pointer me-2 $todoTextClass'>" . $row["todo"] . "</span>" .
            "<div class='d-flex align-items-center'>" .
            "<form action='server.php' method='POST'>" .
            "<input type='hidden' name='deleteId' value='" . $row['id'] . "'>" .
            "<button type='submit' class='btn btn-danger me-3'>X</button>" .
            "</form>" .
            "<form action='server.php' method='POST'>" .
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
