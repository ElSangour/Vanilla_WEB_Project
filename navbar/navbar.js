// Added by Dali 

let navbar = `
<div class="holder">
    <div class="logo"><img src="logo.png" width="90" height="70" alt="logo"></div>
    <div class="navbar1">
        <div>
        <a href="../apropos/apropos.php">À propos</a>
        </div>
        <div>
        <a href="../nosprojet/nosprojet.php">Nos projet</a>
        </div>
        <div>
        <a href="../contact/contact.php">Contactez-nous</a>
        </div>
        <div>
        <a href="../rejoindre/rejoindre.php">Nous rejoindre</a>
        </div>
        <div></div>
    </div>
</div>
`;
let csslink = `<link rel="stylesheet" href="../navbar/navbar.css">`; 
let navi = window.document.getElementById("navbar");
let navicss = window.document.head;
navicss.innerHTML+= csslink;
navi.innerHTML= navbar;