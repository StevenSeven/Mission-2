<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page d'accueil</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css">-->
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<html>
<body>
<script language="javascript">
    function envoie(adresse){
        document.form.action = adresse;
        document.form.submit();
    }
	function creer(){
		document.location.href = 'creerLicense.php';
	}
</script>
<?php
include "connexion.php";
?>

<div class="row">
	<div class="col-sm-8" style="background-color:lavender;">
		<img class="img-logo" src="img/logo.png">
	</div>
	<div class="col-sm-4" style="background-color:lavenderblush;">Compte connecté + date et heure de connexion</div>
</div>
<div class="row" >
	<div class="col-sm-2" style="background-color:lavender;">
		<button type="button" id="btncreatelicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Création des licences</button>
		<button type="button" id="btnfoundlicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Rechercher un(e) licencé(e)</button>
		<button type="button" id="btnvoirclub" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Rechercher un Club</button>
		<button type="button" id="btnaddclub" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Ajouter un Club</button>
	</div>
	<div class="col-sm-10" style="background-color:lavenderblush;">
		<div class="formulaire col-sm-12">
			<span class="span-center">Liste des licenciés</span>
			<form name="form" method="post">
				<table>
					<tr>
						<td width="20%"><label for="numlicence"> N° licence:</label></td>
						<td width="50"><input type="number" name="numlicence"></td>
					</tr>
					<tr>
						<td width="20%"><label for="nom"> Nom:</label></td>
						<td width="50"><input name="nom"></td>
					</tr>
					<tr>
						<td width="20%"><label for="prenom"> Prenom:</label></td>
						<td width="50"><input name="prenom"></td>
					</tr>
					<tr>
						<td width="20%"><label for="club"> Club:</label></td>
						<td width="50"><input type="number" name="club"></td>
					</tr>
				</table>
			</form>
			<button type="Submit" class="btn btn-default btn-lg btn-primary" onclick="javascript:envoie('trouverLicense.php')">Valider</button>
			<button class="btn btn-default btn-lg btn-primary">Annuler</button>
			<button type="button" class="btn btn-default btn-lg btn-primary" onclick="javascript:creer()">Créer</button>
		</div>
		<br>
<?php
// On recherche en fonction du numéro de licence				
if(isset($_POST['numlicence']) && !empty($_POST['numlicence']) && empty($_POST['prenom']) && empty($_POST['nom']) && empty($_POST['club'])){
	
	$recherche = $_POST['numlicence'];
	$req = $db->prepare('SELECT * FROM licencie WHERE numlicencie= ?');
    $req->execute (array($recherche));
				
}
// On recherche en fonction du nom
if(isset($_POST['nom']) && !empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['numlicence']) && empty($_POST['club'])){
	
	$recherche = $_POST['nom'];
	$req = $db->prepare('SELECT * FROM licencie WHERE nomlicencie= ?');
    $req->execute (array($recherche));
				
}
// On recherche en fonction du prénom
if(isset($_POST['prenom']) && !empty($_POST['prenom']) && empty($_POST['nom']) && empty($_POST['numlicence']) && empty($_POST['club'])){
	
	$recherche = $_POST['prenom'];
	$req = $db->prepare('SELECT * FROM licencie WHERE prenomlicencie= ?');
    $req->execute (array($recherche));
				
}
// On recherche en fonction du numéro de club
if(isset($_POST['club']) && !empty($_POST['club']) && empty($_POST['nom']) && empty($_POST['numlicence']) && empty($_POST['prenom'])){
	
	$recherche = $_POST['club'];
	$req = $db->prepare('SELECT * FROM licencie WHERE id_ClubLicencie= ?');
    $req->execute (array($recherche));
				
}
// On recherche en fonction du nom et prénom
if(isset($_POST['nom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && empty($_POST['numlicence']) && empty($_POST['club'])){
	
	$recherche1 = $_POST['nom'];
	$recherche2 = $_POST['prenom'];
	$req = $db->prepare('SELECT * FROM licencie WHERE nomlicencie= ? and prenomlicencie= ?');
    $req->execute (array($recherche1,$recherche2));
				
}
// On recherche en fonction du nom et numéro de club
if(isset($_POST['nom']) && !empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['numlicence']) && !empty($_POST['club'])){
	
	$recherche1 = $_POST['nom'];
	$recherche2 = $_POST['club'];
	$req = $db->prepare('SELECT * FROM licencie WHERE nomlicencie= ? and id_ClubLicencie= ?');
    $req->execute (array($recherche1,$recherche2));
				
}
// On recherche en fonction du prenom et numéro de club
if(isset($_POST['nom']) && empty($_POST['nom']) && !empty($_POST['prenom']) && empty($_POST['numlicence']) && !empty($_POST['club'])){
	
	$recherche1 = $_POST['prenom'];
	$recherche2 = $_POST['club'];
	$req = $db->prepare('SELECT * FROM licencie WHERE prenomlicencie= ? and id_ClubLicencie= ?');
    $req->execute (array($recherche1,$recherche2));
				
}
// On recherche en fonction du nom et prénom et numéro de club
if(isset($_POST['nom']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && empty($_POST['numlicence']) && !empty($_POST['club'])){
	
	$recherche1 = $_POST['nom'];
	$recherche2 = $_POST['club'];
	$recherche3 = $_POST['prenom'];
	$req = $db->prepare('SELECT * FROM licencie WHERE nomlicencie= ? and id_ClubLicencie= ? and prenomlicencie= ?');
    $req->execute (array($recherche1,$recherche2,$recherche3));
				
}

if(isset($_POST['numlicence'])){
?>	
	<table>
		<tr>
			<td width="20%"><label for="numlicence">N° de licence</label></td>
			<td width="20%"><label for="numlicence">Nom</label></td>
			<td width="20%"><label for="numlicence">Prénom</label></td>
			<td width="20%"><label for="numlicence">Club</label></td>
		</tr>
		<tr>
<?php
	while ($donnees = $req->fetch())
    {
		echo '<td width="20%"><a href="voirLicense.php?id='.$donnees['numlicencie'].'">'.$donnees['numlicencie'].'</a></td>';
		echo '<td width="20%"><label for="nom">'.$donnees['nomlicencie'].'</label></td>';
		echo '<td width="20%"><label for="prenom">'.$donnees['prenomlicencie'].'</label></td>';
		echo '<td width="20%"><label for="club">'.$donnees['id_ClubLicencie'].'</label></td>';
	}
?>
		</tr>
<?php		
}						
?>			
						
	</div>
</div>
	
<script>
	var btncreatelicences = document.getElementById('btncreatelicences');
	btncreatelicences.addEventListener('click', function() {
		document.location.href = 'creerLicense.php';
	});
			
	var btnfoundlicences = document.getElementById('btnfoundlicences');
	btnfoundlicences.addEventListener('click', function() {
		document.location.href = 'trouverLicense.php';
	});
			
	var btnvoirclub = document.getElementById('btnvoirclub');
	btnvoirclub.addEventListener('click', function() {
		document.location.href = 'trouverClub.php';
	});
	
    var btnaddclub = document.getElementById('btnaddclub');
    btnaddclub.addEventListener('click', function() {
        document.location.href = 'ajouterClub.php';
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>