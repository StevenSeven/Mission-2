<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header('Location: indexconnexion.php');
}
?>
<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page d'accueil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">-->
        <link rel="stylesheet" href="CSS/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<html>
<body>
<?php
include "connexion.php";
?>
<div class="row">
	<div class="col-sm-8" style="background-color:lavender;">
		<img class="img-logo" src="img/logo.png">
	</div>
	<div class="col-sm-4" style="background-color:lavenderblush;"><?php echo $_SESSION["login"];?> - <?php echo $_SESSION["date"];?></div>
</div>
<div class="row" >
	<div class="col-sm-2" style="background-color:lavender;">
		<button type="button" id="btncreatelicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Création des licences</button>
		<button type="button" id="btnfoundlicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Rechercher un(e) licencé(e)</button>
		<?php if ($_SESSION["id"]==0){?>
		<button type="button" id="btnvoirclub" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Rechercher un Club</button>
		<button type="button" id="btnaddclub" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Ajouter un Club</button>
		<button type="button" id="btnvaliderlicence" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Valider licences</button>
		<?php } ?>
	</div>
	<div class="col-sm-10" style="background-color:lavenderblush;">
		<h1>Consulter une fiche de club</h1>
			<div>
				<form method="post" action="trouverClub.php">
					<input name="recherche" type="text" placeholder="id du club" size="20" required=true>
					<input class="btn btn-default btn-lg btn-primary" type="submit" value="Ok" />
				</form>
			</div>
			<div>
				<ul>
    <?php
    include("connexion.php");

    // Si tout va bien, on peut continuer
    if(isset($_POST['recherche']) && !empty($_POST['recherche']))
    {
        $recherche = $_POST['recherche'];

        $req = $db->prepare('CALL getLeClub(?)');
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
			</div>
			<p><a href="index.php">Retour à l'accueil</a></p></br>

		</div>
	</div>
</div>






		
	
<script>
	var btncreatelicences = document.getElementById('btncreatelicences');
	btncreatelicences.addEventListener('click', function() {
		document.location.href = 'creerLicence.php';
	});
			
	var btnfoundlicences = document.getElementById('btnfoundlicences');
	btnfoundlicences.addEventListener('click', function() {
		document.location.href = 'trouverLicence.php';
	});
			
	var btnvoirclub = document.getElementById('btnvoirclub');
	btnvoirclub.addEventListener('click', function() {
		document.location.href = 'trouverClub.php';
	});
	
    var btnaddclub = document.getElementById('btnaddclub');
    btnaddclub.addEventListener('click', function() {
        document.location.href = 'ajouterClub.php';
    });
	var btnvaliderlicence = document.getElementById('btnvaliderlicence');
    btnvaliderlicence.addEventListener('click', function() {
        document.location.href = 'validerlicences.php';
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
