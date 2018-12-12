<html>
<!doctype html>
<html lang="²">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FFBSQ</title>

</head>
<body>
<body background="img/logo.png";></body>
<div id="searchbar">
    <div style="text-align: center">
        <h1>Consulter une fiche de club</h1>
        <style>
            body{
                color: #FFFFFF;
                font-size: 300%;
            }
        </style>
        <div style="font-size:0">
            <form method="get" action="findclub.php" class="formulaire">
                <input name="recherche" class="champ" type="text" placeholder="id du club"/>
                <input class="bouton" type="submit" value="Ok" />
            </form>
        </div>
        <p><a href="index.php">Retour à l'acceuil</a></p></br>

    </div>
</div>
</body>


<ul>
    <?php
    include("connexion.php");

    // Si tout va bien, on peut continuer
    if(isset($_GET['recherche']) && !empty($_GET['recherche']))
    {
        $recherche = $_GET['recherche'];

        $req = $db->prepare('SELECT * FROM club WHERE numAffiliation_Club = ?');
        $req->execute (array($recherche));

// On affiche chaque entrée une à une
        while ($donnees = $req->fetch())
        {
            ?>
            <li>Designation du club : <?php echo $donnees['designation_Club']; ?></li>
            <li>Rue : <?php echo $donnees['adrRueSiege_Club']; ?></li>
            <li>Ville : <?php echo $donnees['adrVilleSiege_Club']; ?></li>
            <li>Code postale : <?php echo $donnees['adrCPSiege_Club']; ?></li>
            <li>Année d'affiliation : <?php echo $donnees['anneeAffiliation_Club']; ?></li>
            <li>Numéro de téléphone : <?php echo $donnees['tel_Club']; ?></li>
            <li>Email du club : <?php echo $donnees['email_Club']; ?></li>
            <li>Rue courrier : <?php echo $donnees['adrRueCourrier_Club']; ?></li>
            <li>Ville courrier : <?php echo $donnees['adrVilleCourrier_Club']; ?></li>
            <li>Code postale courrier : <?php echo $donnees['adrCPCourrier_Club']; ?></li>
            <li>Numéro prefecture club : <?php echo $donnees['numPrefecture_Club']; ?></li>

            <?php
        }
    }

    ?>
</ul>
