<?php

session_start();

$_SESSION['LoginConfermato'] = false;
$_SESSION['ErroreLogin'] = false;


include "../SQL/connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero i dati dal form
    $mail = $_POST["mail"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM cliente WHERE mail = ? AND nome = ? AND password = ?";

    //LoginNoInjection

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $mail, $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    //Controllo Risultati
    //se trova una o più righe

    if ($result->num_rows > 0) {
        header('Location: ../index.php');
        $_SESSION['LoginConfermato'] = true;
        $_SESSION['UtenteConnesso'] = $mail;
        exit();
    } else {
        $_SESSION['ErroreLogin'] = true;
        ?>
        <script>
            window.alert("Errore nel Login!")
        </script>
        <?php 
        header('Location: logins.php?error=1');
        exit();
    }
} else {
    header('Location: logins.php');
    exit();
}
$conn->close();
?>
        
