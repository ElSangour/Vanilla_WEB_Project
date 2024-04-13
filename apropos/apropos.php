<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="apropos.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 
        <title>DIDON - À propos</title>
    </head>
    <body>
        <header>
            <div class="navbar" id="navbar"></div>
            <script src="../navbar/navbar.js"></script>
        </header>
        <main>
            <div class="adm">
                <div class="sa">
                    <img src="db.jpg" heigth:"400px" width:"1200px">                   
                    <h3 style="color: #FFD700;">Nos Activités</h3>
                    <div class="activities_container">
                       <div class="activity">
                        <p>
                            <h2>
                                <span style="color:#CD7F32;">formation</span>
                            </h2>
                        </p>
                            <ul>
                                <li>Développement personnel</li>
                                <li>Entrepreunariat</li>
                                <li>Savoir Vivre</li>
                            </ul>
                        </div>    
                        <div class="activity"><p>
                            <h2 style="color: #CD7F32;"> 
                                Sensabilations
                            </h2>
                        </p>
                        <ul>
                            <li>Des Cofee Talk</li>
                            <li>Réalisations des courts-métrages (club audio-visuel)</li>
                        </ul>
                    </div>
                    <div class="activity">
                        <p>
                            <h2 style="color: #CD7F32;">
                                Echange Linguistique
                            </h2>
                        </p>
                        <ul>
                            <li>Participations dans des festivales internationaux</li>
                        </ul>
                    </div>
                    <div class="activity">
                        <p>
                            <h2 style="color: #CD7F32;">
                                Loisirs
                            </h2>
                        </p>
                        <ul>
                            <li>Projection des films</li>
                            <li>Soirée Musicales</li>
                            <li>Des randonnées</li>
                        </ul>
                    </div>   
                    </div>
            
                        

            
                           <h3 style="color: #FFD700;">À propos</h3>
                           <p>DIDON est une association à but non lucratif avec la vision de rendre les jeunes tunisiens des citoyens actifs, engagés <br> et responsables pour une meilleure Tunisie. Notre mission est le développement social avec l’objectif d’inspirer et de renforcer chaque citoyen à contribuer positivement dans le développement de sa communauté.</p>
                
                
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