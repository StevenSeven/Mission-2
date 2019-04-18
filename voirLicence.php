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
<?php
		$sql = "SELECT * FROM licencie WHERE numlicencie = '".$_GET['id']."'";
		$rep = $db->query($sql);
		while($data = $rep->fetch())
		{
			$numlicence=$data['numlicencie'];
			$nom=$data['nomlicencie'];
			$prenom=$data['prenomlicencie'];
			$datenaiss=$data['datedenaissance'];
			$sexe=$data['sexelicencie'];
			$photo=$data['photolicencie'];
			$categorie=$data['categorielicencie'];
			$position=$data['positionlicencie'];
			$adresse=$data['adr_licencie'];
			$cp=$data['adr_cp_licencie'];
			$ville=$data['adr_ville_licencie'];
			$telephone=$data['tel_licencie'];
			$email=$data['mail_licencie'];
			$nationnalite=$data['nationnalite_licencie'];
			$classification=$data['classification_licencie'];
			$finvaliditeCM=$data['validite_CM'];
			$firstanneelicence= $data['premiere_licence'];
			$lastanneereprise= $data['annee_reprise'];
			$id_club= $data['id_ClubLicencie'];
		}
		$sql = "SELECT * FROM categorie WHERE id = '".$categorie."'";
		$rep = $db->query($sql);
		while($data = $rep->fetch())
		{
			$categorie=$data['libelle'];
		}
?>				
		<span class="span-center">Visualisation de la licence de <?php echo $nom ?> <?php echo $prenom ?></span>
		<a href="trouverLicence.php">Retours</a>
		<a href="">Modifier</a>
		<br>
		<img class="image" src="img\<?php echo $photo ?>" >
		<span class="span-right">N° Licence: <?php echo $numlicence ?></span>
		<span class="span-right">N° Club: <?php echo $id_club ?></span>
		<div class="row">
			<div class="col-sm-7">
				<span class="span-etatcivil">Etat Civil</span>
				<table align="left" style="width:100%;">
					<tr>
						<td width="20%"><label for="nom"> Nom:</label></td>
						<td width="50"><label for="nom"><?php echo $nom ?></label></td>
					</tr>
					<tr>
						<td width="20%"><label for="prenom"> Prenom:</label></td>
						<td width="50"><label for="prenom"><?php echo $prenom ?></label></td>
					</tr>
					<tr>
						<td width="20%"><label for="datenaiss"> Date de naissance:</label></td>
						<td width="50"><label for="datenaiss"><?php echo $datenaiss ?></label></td>
					</tr>
					<tr>
						<td width="20%"><label for="sexe"> Sexe:</label></td>
						<td width="50"><label for="sexe"><?php echo $sexe ?></label></td>
					</tr>
					<tr>
						<td width="20%"><label for="categorie"> Catégorie:</label></td>
						<td width="50"><label for="categorie"><?php echo $categorie ?></label></td>
					</tr>
					<tr>
						<td width="20%"><label for="position"> Position:</label></td>
						<td width="50"><label for="position"><?php echo $position ?></label></td>
					</tr>
				</table>
			</div>
			<div class="col-sm-4">
				<span class="span-coordonnee">Coordonnée</span>
				<table align="left" style="width:100%;">
					<tr>
						<td width="40%"><label for="adresse"> Adresse:</label></td>
						<td><label for="adresse"><?php echo $adresse ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label for="cp"><?php echo $cp ?></label> <label for="ville"><?php echo $ville ?></label></td>
					</tr>
					<tr>
						<td width="40%"><label for="telephone"> Téléphone:</label></td>
						<td><label for="telephone"><?php echo $telephone ?></label></td>
					</tr>
					<tr>
						<td width="40%"><label for="email"> Email:</label></td>
						<td><label for="email"><?php echo $email ?></label></td>
					</tr>
					<tr>
						<td width="40%"><label for="nationnalite"> Nationnalité:</label></td>
						<td><label for="nationnalite"><?php echo $nationnalite ?></label></td>
					</tr>
					<tr>
						<td width="40%"><label for="classification"> Classification:</label></td>
						<td><label for="classification"><?php echo $classification ?></label></td>
					</tr>
					<tr>
						<td width="40%"><label for="finvaliditeCM" style="color:red;"> Fin de validité du certificat médical:</label></td>
						<td><label for="finvaliditeCM"><?php echo $finvaliditeCM ?></label></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<span class="span-etatcivil">Renseignements</span>
				<table align="left" style="width:100%;">
					<tr>
						<td width="30%"><label for="firstanneelicence">1ère année de licence: </label></td>
						<td><label for="firstanneelicence"><?php echo $firstanneelicence ?></label></td>
						<td width="35%"><a href="">Dernière année de reprise</a></td>
						<td><label for="lastanneereprise"><?php echo $lastanneereprise ?></label></td>
					</tr>
					<tr>
						<td width="30%"></td>
						<td width="10%"></td>
						<td><a href="">Demandes de cartes</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

<<script>
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