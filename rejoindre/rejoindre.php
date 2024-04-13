<?php
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['motdepasse']) && isset($_POST['occupation'])) {
        try {
            $database = new PDO('mysql:host=localhost;dbname=mysql', 'root', '');
            $insert = $database->prepare('INSERT INTO Comptes(nom, prenom, email, motdepasse, occupation) VALUES (?, ?, ?, ?, ?)');
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];
            $occupation = $_POST['occupation'];
            if ($motdepasse != $_POST['re-motdepasse']) {
                echo("<script type='text/javascript'>alert('Les mots de passe ne correspondent pas.');</script>");
            }
            else {
                $insert->execute([$nom, $prenom, $email, $motdepasse, $occupation]);
            }
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
        <link rel="stylesheet" href="rejoindre.css">
        <title>DIDON - Rejoindre</title>
        <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div id="navbar">
            </div>
            <script src="../navbar/navbar.js"></script>
        </header>
        <main>
            <div class="background">
                <div class="color">
                    <h1 id="title" style="position:relative;left: 35vw;top:15vh;font-size: 50px;color:#CD7F32;display: inline;">create account</h1><br>
                    <div id="formulaire"> 
                        <form method="POST" action="rejoindre.php">
                            <div class="space">
                                <label>Nom</label><br>
                                <input type="text" id="nom" name="nom" placeholder="Entrer votre nom." required>
                            </div>
                            <div class="space">
                                <label>Prénom</label><br>
                                <input type="text" id="prenom" name="prenom" placeholder="Entrer votre prénom." required>
                            </div>
                            <div class="space">
                                <label>Adresse email</label><br>
                                <input type="email" id="email" name="email" placeholder="Enterer votre email." required>
                            </div>
                            <div class="space">
                                <label>Mot de passe</label><br>
                                <input type="password" id="motdepasse" name="motdepasse" placeholder="Ecrire votre mot de passe." required>
                            </div>
                            <div class="space">
                                <label>Verifier votre mot de passe</label><br>
                                <input type="password" id="re-motdepasse" name="re-motdepasse" placeholder="Récrire votre mot de passe." required>
                            </div>
                            <div class="space">
                                <label>Occupation:</label><br>
                                <select name="occupation" id="occupation">
                                    <option value="">Selectionner votre occupation</option>
                                    <option value="Etudiant">Etudiant</option>
                                    <option value="Etudiant universitaire">Etudiant universitaire</option>
                                    <option value="Travail">Travail</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <button type="submit">submit</button>
                        </form>
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