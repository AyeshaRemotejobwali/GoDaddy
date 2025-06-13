<?php
$host = 'localhost';
$dbname = 'dbybta1dmciwcj';
$user = 'uxgukysg8xcbd';
$pass = 'uxgukysg8xcbd';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
