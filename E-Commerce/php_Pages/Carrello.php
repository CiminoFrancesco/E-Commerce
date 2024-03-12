<!DOCTYPE html>
<html lang="en">

<head>

    <script src="../resources/TemaPagina.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../resources/style_Colori.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/style_Catalogo.css">

    <title>Carrello Personale</title>
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
                            <a class="nav-link" href="Catalogo.php">Sfoglia il Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Carrello.php">Visualizza il Carrello</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <!-- SearchBar
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>-->
                        <?php
                        if (isset($_SESSION['LoginConfermato']) && $_SESSION['LoginConfermato'] = true) {
                            include "../SQL/connection.php";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Verifica la connessione
                            if ($conn->connect_error) {
                                die('Connection failed: ' . $conn->connect_error);
                            }

                            









                        ?>
                            <a href="destroySession.php" class="btn btn-outline-success" id="LoginButton">LogOut</a>
                        <?php
                        } else {
                        ?>
                            <a href="logins.html" class="btn btn-outline-success" id="LoginButton">Login</a>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>