<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="resources/TemaPagina.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Sfoglia la pagina principale</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="resources/style_Colori.css" rel="stylesheet">
  <link href="resources/style_Index.css" rel="stylesheet">
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
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
              <a href="php_Pages/destroySession.php" class="btn btn-outline-success" id="LoginButton">LogOut</a>
            <?php
            } else {
            ?>
              <a href="Login_Methods/Pagina_Login.php" class="btn btn-outline-success" id="LoginButton">Login</a>
            <?php
            }
            ?>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <h1 style="text-align: center;margin-top:100px">1DITUTTO.COM</h1><br>
  <div style="margin-left: 100px; margin-right:100px">
    <img src="resources/images/Pres.jpg" alt="Immagine Presentazione 1" style="width: 800px; height:400px">
    <img src="resources/images/Pres2.jpg" alt="Immagine Presentazione 2" style="width: 800px; height:400px"><br>
    <h5 style="margin-top:50px">Benvenuti nel futuro degli acquisti online: l'e-commerce. In un mondo sempre più connesso, l'e-commerce emerge come il modo avveniristico per soddisfare le esigenze degli acquirenti moderni. Con la comodità di navigare e acquistare dalla propria casa o ovunque ci si trovi, l'e-commerce offre un'esperienza di shopping senza precedenti.

      Attraverso piattaforme intuitive e sicure, gli utenti possono esplorare una vasta gamma di prodotti, confrontare prezzi e leggere recensioni prima di prendere decisioni informate. La tecnologia di pagamento sicuro rende gli acquisti online affidabili e convenienti. Inoltre, l'introduzione di avanzate tecnologie come la realtà aumentata e la virtualità offre agli acquirenti la possibilità di provare virtualmente i prodotti prima dell'acquisto.

      L'e-commerce non solo semplifica il processo di acquisto, ma apre anche le porte a un mercato globale, consentendo agli acquirenti di accedere a prodotti provenienti da tutto il mondo. Questo ampliamento delle possibilità di scelta contribuisce a una maggiore competitività tra i venditori, stimolando l'innovazione e migliorando costantemente l'esperienza del consumatore.

      Il futuro dell'e-commerce è un viaggio verso una maggiore personalizzazione, con algoritmi intelligenti che anticipano le preferenze degli acquirenti e offrono suggerimenti mirati. Con la continua crescita della connettività e l'evoluzione delle tecnologie, l'e-commerce rimane il catalizzatore che ridefinisce la nostra esperienza di shopping, rendendo l'acquisto online il presente e il futuro del retail. Benvenuti in un mondo di scelte infinite, comodità senza pari e innovazione costante: benvenuti nell'era dell'e-commerce.</h5>

  </div>
  <script src="resources/JSBootstrap.js"></script>
</body>

</html>