<?php
include 'db_connection.php';

function signup($connection)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt_check = $connection->prepare("SELECT * FROM `users` WHERE `username` = ?");
    $stmt_check->bind_param('s', $username);
    $stmt_check->execute();

    $results_check = $stmt_check->get_result();

    if ($results_check->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Nome utente già esistente.']);
        return;
    }

    $hashed_passwd = password_hash($password, PASSWORD_DEFAULT);

    $stmt_insert = $connection->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?, ?)");
    $stmt_insert->bind_param('ss', $username, $hashed_passwd);

    if ($stmt_insert->execute()) {
        // Recupera l'ID dell'utente dopo l'inserimento
        $user_id = $stmt_insert->insert_id;

        // Memorizza l'ID dell'utente nella sessione
        $_SESSION['id'] =  $stmt_insert->insert_id;

        echo json_encode(['success' => true, 'message' => 'Utente registrato con successo!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'ERRORE durante la registrazione dell\'utente.']);
    }
}

signup($connection);

// Reindirizzamento alla pagina index dopo la registrazione
header('Location: ../index.php');

$connection->close();

exit();
?>
