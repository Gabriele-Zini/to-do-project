<?php
header("Access-Control-Allow-Origin: *");

function logout() {
    session_start();
    session_unset();
    session_destroy();

/*     echo json_encode(['success' => true, 'message' => 'Logout successo']);
 */}

    logout();
    header('Location: ../login.php');
    exit();
 