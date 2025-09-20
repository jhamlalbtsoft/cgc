<?php



// Database configuration
$host = 'localhost';     // usually localhost
$port = 3306;            // default MySQL port
$dbname = 'cgc';         // your database name
$user = 'root';          // your DB username
$password = '';          // your DB password
$charset = 'utf8mb4';

// Connect with PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>