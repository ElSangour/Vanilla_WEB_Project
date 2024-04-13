<?php
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])) {
        try {
            $database = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
            $insert = $database->prepare('INSERT INTO Messages(nom, prenom, email, sujet, message) VALUES (?, ?, ?, ?, ?)');
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $sujet = $_POST['sujet'];
            $message = $_POST['message'];
            $insert->execute([$nom, $prenom, $email, $sujet, $message]);
            $database = null;
        }
        catch (PDOException $error) {
            die();
        }
    }
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="contact.css">
        <title>DIDON - Contactez-nous</title>
    </head>
    <body>
        <header>
            <div class="navbar" id="navbar"></div>
            <script src="../navbar/navbar.js"></script>
        </header>
        <main>
            <div class="container">
                <div class="left">
                    <div class="text"><h1>Contactez-nous</h1></div>
                    <form name="contact" method="POST" action="contact.php">
                        <div class="lastname">
                            <label>NOM</label><br>
                            <input type="text" id="nom" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="firstname">
                            <label>PRENOM</label><br>
                            <input type="text" id="prenom" name="prenom" placeholder="Prenom" required>
                        </div>
                        <div class="email">
                            <label>EMAIL</label><br>
                            <input type="text" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="subject">
                            <label>SUJET</label><br>
                            <input type="text" id="sujet" name="sujet" placeholder="Sujet" required>
                        </div>
                        <div class="message">
                            <label>MESSAGE</label><br>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="send">
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                </div>
                <div class="right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3234.719418756087!2d10.636442515553862!3d35.83135922933047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13027575b2060277%3A0xb9eb393969ca50d4!2sMaison%20des%20Arts%20Sousse%20LAB!5e0!3m2!1sen!2stn!4v1679910715693!5m2!1sen!2stn" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bottom">
                    <div class="address">
                        <a href="https://www.google.com/maps/place/Maison+des+Arts+Sousse+LAB/@35.831355,10.638631,16z/data=!4m6!3m5!1s0x13027575b2060277:0xb9eb393969ca50d4!8m2!3d35.8313549!4d10.6386312!16s%2Fg%2F11c0xsg7bl" target="_blank">
                            <div class="icon"><img src="address.png" width="25" height="25"></div>
                        </a>
                        <p>Maison des arts sousse, Sousse, Tunisie</p>
                    </div>
                    <div class="phone">
                        <a href="tel:+21652878878">
                            <div class="icon"><img src="phone.png" width="25" height="25"></div>
                        </a>
                        <p>+216 52 878 878</p>
                    </div>
                    <div class="email">
                        <a href="mailto:tunisie.didon@gmail.com">
                            <div class="icon"><img src="email.png" width="25" height="25"></div>
                        </a>
                        <p>tunisie.didon@gmail.com</p>
                    </div>
                    <div class="facebook">
                        <a href="https://www.facebook.com/DIDONTN1" target="_blank">
                            <div class="icon"><img src="facebook.png" width="25" height="25"></div>
                        </a>
                        <p>DIDONTN1</p>
                    </div>
                    <div class="linkedin">
                        <a href="https://www.linkedin.com/company/didon-association/" target="_blank">
                            <div class="icon"><img src="linkedin.png" width="25" height="25"></div>
                        </a>
                        <p>didon-association</p>
                    </div>
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