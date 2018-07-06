<?php
include('DataBase.php');
include('isAdmin.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["approve"])) {
    $pdo = Database::connect();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE agents SET verify=1 WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE users SET verify=1 WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $_POST['user_id']);
    $stmt->execute();

    Database::disconnect();
    header("Location: AllAgent.php");
}