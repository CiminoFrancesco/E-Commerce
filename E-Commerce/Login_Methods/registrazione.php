<?php 

include "../SQL/connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero i dati dal form
    $email = $_POST["Email"];
    $nome = $_POST["username"];
    $cognome = $_POST["cognome"];
    $passwird = $_POST["password"];


    
    $sql = "INSERT INTO cliente (mail, nome, cognome, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $email, $nome, $cognome, $passwird);

    if ($stmt->execute()) {
        header('Location: ../index.php');
    } else {
        header('Location: ../logins.php?error=1');
    }

    $stmt->close();
    $conn->close();

}



?>