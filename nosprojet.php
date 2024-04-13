<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="nosprojet.css">
        <title>DIDON - Nos Projet</title>
    </head>
    <body>
        <header>
             <div class="navbar" id="navbar"></div>
            <script src="../navbar/navbar.js"></script>
        </header>
        <main>
            <div class="container">
                <video autoplay loop muted plays-inline class="back-video">
                <source src="didonvideo.mp4" type="video/mp4">
                </video>
                <!-- <nav>
                    <img src="logo.png" class="logo">
                    <ul>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">Nos Projets</a></li>
                        <li><a href="#">Contactez-nous</a></li>
                        <li><a href="#">Nous Rejoindre</a></li>
                    </ul>
                </nav>                -->
                <div class="contentmid">
                    <h1>DIDON</h1>
                    <a href="#">Explore</a>
                </div>
            </div>
        </main>
        <footer>
            <div class="content">
                <div class="item-1">
                    <h3>À propos nous</h3>
                    <p>DIDON est une association à but non lucratif avec la vision de rendre les jeunes tunisiens des citoyens actifs, engagés et responsables pour une meilleure Tunisie. Notre mission est le développement social avec l’objectif d’inspirer et de renforcer chaque citoyen à contribuer positivement dans le développement de sa communauté.</p>
                </div>
                <div class="item-2">
                    <h3>Actualités</h3>
                    <ul>
                    <?php
                        try {
                            $database = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
                            $result = $database->query("SELECT titre, lien FROM Actualites ORDER BY id DESC LIMIT 4");
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row['titre'];
                                $link = $row['lien'];
                                echo "<li><a href='$link' target='_blank'>$title</a></li>";
                            }
                            $database = null;
                        }
                        catch (PDOException $error) {
                            die();
                        }
                    ?>
                    </ul>
                </div>
                <div class="item-3">
                    <h3>Événements</h3>
                    <ul>
                    <?php
                        try {
                            $database = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
                            $result = $database->query("SELECT titre, lien FROM Evenements ORDER BY id DESC LIMIT 4");
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row['titre'];
                                $link = $row['lien'];
                                echo "<li><a href='$link' target='_blank'>$title</a></li>";
                            }
                            $database = null;
                        }
                        catch (PDOException $error) {
                            die();
                        }
                    ?>
                    </ul>
                </div>
                <div class="item-4">
                    <h3>Vidéos</h3>
                    <ul>
                    <?php
                        try {
                            $database = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
                            $result = $database->query("SELECT titre, lien FROM Videos ORDER BY id DESC LIMIT 4");
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $title = $row['titre'];
                                $link = $row['lien'];
                                echo "<li><a href='$link' target='_blank'>$title</a></li>";
                            }
                            $database = null;
                        }
                        catch (PDOException $error) {
                            die();
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="joinus">
                <a href="../rejoindre/rejoindre.php">Nous rejoindre!</a>
            </div> 
            <hr>
            <div class="copyright">
                <h3>© 2020 Copyright: didon-association.tn</h3>
            </div>
        </footer>
    </body>
</html>
