<?php
include 'db_connection.php';


/* ------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection->begin_transaction();

    if (isset($_POST['newTodo'])) {
        $text = $_POST['newTodo'];
        $done = '0';

        $insertQuery = "INSERT INTO `to_dos` (`todo`, `done`) VALUES (?, ?)";
        $stmt = $connection->prepare($insertQuery);
        $stmt->bind_param("si", $text, $done);
      
    } elseif (isset($_POST['toggleId'])) {
        $toggleId = $_POST['toggleId'];
        $updateQuery ="UPDATE `to_dos` SET `done` = IF(`done` = '1', '0', '1') WHERE `id` = ?";
        $stmt = $connection->prepare($updateQuery);
        $stmt->bind_param("s", $toggleId);
        $data[] = ['id' => $toggleId];
    }
    elseif (isset($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $deleteQuery = "DELETE FROM `to_dos` WHERE `id` = ?";
        $stmt = $connection->prepare($deleteQuery);
        $stmt->bind_param("i", $deleteId);
      

        $data[] = ['id' => $deleteId];
    }
    $stmt->execute();
    
    $selectAllQuery = "SELECT * FROM `to_dos`";
    $data = [];
    $selectAllResult = $connection->query($selectAllQuery);
    while ($row = $selectAllResult->fetch_assoc()) {
        $data[] = $row;
    }

    $connection->commit();

    $connection->close();

    header('Location: ../index.php');
    exit();
}