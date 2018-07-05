<?php
include('isAdmin.php');
include('DataBase.php');
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST['deleteID'];
    $sql = "DELETE FROM institute WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: AllInstitute.php",false);
}