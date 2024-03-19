<?php 

include "../SQL/connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero i dati dal form
    $email = $_POST["mail"];
    $nome = $_POST["username"];
    $passwird = $_POST["password"];


    
    $sql = "INSERT INTO cliente (mail, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $email, $nome, $passwird);

    if ($stmt->execute()) {
        header('Location: ../index.php');
    } else {
        header('Location: Pagina_Login.php?error=1');
    }

    $stmt->close();
    $conn->close();

}



?>