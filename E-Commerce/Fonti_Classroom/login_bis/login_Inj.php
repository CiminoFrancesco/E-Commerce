<?php

include "connessione.php";
$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica se i campi di login sono stati inviati
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Esecuzione della query con SQL injection
    //' OR 1=1 -- '
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    
        
        $query = "SELECT cliente_id, nome, cognome, cap, citta FROM clienti";
        $result = $conn->query($query);
       
        if ($result->num_rows > 0) {
            echo "<h2>Dati dei clienti</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Cliente ID</th><th>Nome</th><th>Cognome</th><th>CAP</th><th>Città</th></tr>";
    
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                echo "<td>" . $row["cliente_id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["cognome"] . "</td>";
                echo "<td>" . $row["cap"] . "</td>";
                echo "<td>" . $row["citta"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    } else {
        // Credenziali non corrette, reindirizza alla pagina di login
        header('Location: index.html?error=1');
        exit();
    }
} else {
    // Se i campi non sono stati inviati, reindirizza alla pagina di login
    header('Location: index.html');
    exit();
}

// Chiudi la connessione al database
$conn->close();
?>
