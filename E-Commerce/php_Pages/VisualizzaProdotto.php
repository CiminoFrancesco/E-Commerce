<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../resources/TemaPagina.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../resources/style_Colori.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/style_Catalogo.css">

    <title>Dettagli Prodotto</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php_Pages/Catalogo.php">Sfoglia il Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="php_Pages/Carrello.php">Visualizza il Carrello</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <!-- SearchBar
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>-->
                        <?php
                        if (isset($_SESSION['LoginConfermato']) && $_SESSION['LoginConfermato'] = true) {
                        ?>
                            <a href="destroySession.php" class="btn btn-outline-success" id="LoginButton">LogOut</a>
                        <?php
                        } else {
                        ?>
                            <a href="../logins.php" class="btn btn-outline-success" id="LoginButton">Login</a>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="album py-5 bg-body-tertiary">
        <div class="container" style="margin-top: 100px;">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
                <?php
                include '../SQL/connection.php';
                $conn = new mysqli($servername, $username, $password, $dbname);

                if (isset($_GET['nome'])) {
                    // Sanitizza l'ID dall'URL
                    $nome_Prodotto = $_GET['nome'];

                    $query = "SELECT * FROM prodotto WHERE nome = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $nome_Prodotto);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $prodotto = $result->fetch_assoc();

                        echo <<<HTML
                        <div>
                            <div class="col" >
                                <div class="card shadow-sm">
                                <img src="{$prodotto['img_path']}" class="card-img-top" alt="Immagine Prodotto" style="height:350px">
                                    <div class="card-body">
                                        <p class="card-text">{$prodotto['nome']}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="Carrello.php?nome={$prodotto['nome']}" type="button" class="btn btn-sm btn-outline-secondary">Aggiungi al Carrello</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        HTML;
                        echo "Nome: " . $prodotto['nome'] . "<br>";
                        echo "Prezzo: " . $prodotto['prezzo'] . "<br>";
                        echo "Descrizione: " . $prodotto['descrizione'] . "<br>";
                    } else {
                        echo "Prodotto non trovato.";
                    }
                } else {
                    echo "Nome Prodotto del prodotto non specificato.";
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
$conn->close();
?>

</html>