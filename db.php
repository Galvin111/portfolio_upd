<?php
// Configuration for XAMPP default local server
$host = '127.0.0.1';
$user = 'root';
$pass = ''; 
$db_name = 'portfolio';

try {
    // 1. Establish connection to MySQL Engine
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // 2. Automatically generate the Database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    
    // 3. Select the Database
    $pdo->exec("USE `$db_name`");
    
    // 4. Automatically generate the Contacts Table if it doesn't exist
    $createTableQuery = "
        CREATE TABLE IF NOT EXISTS contacts (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(255) NOT NULL,
            Email VARCHAR(255) NOT NULL,
            Message TEXT NOT NULL,
            Created_At DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;
    ";
    $pdo->exec($createTableQuery);

} catch (PDOException $e) {
    die("Hardware Setup Failed: Unable to establish Database architecture. " . $e->getMessage());
}
?>
