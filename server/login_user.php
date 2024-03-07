<?php
include 'db_connection.php';

function login($username, $password, $connection)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $stmt = $connection->prepare("SELECT * FROM `users` WHERE `username` = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $results = $stmt->get_result();

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            echo json_encode(['success' => true, 'message' => 'Login successo']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Password errata']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Utente non trovato']);
    }
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password, $connection);

    // Controlla se il login ha avuto successo verificando se l'ID dell'utente è stato memorizzato nella sessione
    if (isset($_SESSION['id'])) {
        header('Location: ../index.php');
        exit(); // Assicurati di uscire dallo script dopo il reindirizzamento
    } else {
        // Se il login ha fallito, restituisci un messaggio di errore
        echo json_encode(['success' => false, 'message' => 'Login fallito']);
    }
} else {
    // Se non sono stati forniti username e password, restituisci un messaggio di errore
    echo json_encode(['success' => false, 'message' => 'Richiesta di login non valida']);
}

