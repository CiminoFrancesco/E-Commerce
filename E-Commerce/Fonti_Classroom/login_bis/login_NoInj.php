<?php

include "connessione.php";
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Esecuzione di una query preparata per evitare SQL injection
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

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