<?php 
session_start();

//Inserisco il carrello nella tabella carrello, bisogna passare l'email dell utente per fare insert into
/*include "../SQL/connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}*/

if(isset($_SESSION["ProdottoSelezionato"])){
    $_SESSION["Carrello"] [] = $_SESSION["ProdottoSelezionato"];
    header('Location: Carrello.php');
}else{
    echo "Errore nell'aggiunta del prodotto al carrello";
    header('Location: Catalogo.php');
}

?>