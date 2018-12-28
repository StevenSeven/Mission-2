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
		<form name="form" method="post" action="insererLicencie.php" enctype="multipart/form-data">
				<table>
					<tr>
						<td width="20%"><label for="nom"> Nom:</label></td>
						<td width="50"><input name="nom" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="prenom"> Prenom:</label></td>
						<td width="50"><input name="prenom" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="datenaiss"> Date de naissance:</label></td>
						<td width="50"><input type="date" name="datenaiss" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="photo">Photo:</label></td>
						<td width="50"><input type="file" accept="image/*" name="my_image" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="Sexe">Sexe:</label></td>
						<td width="50">
							<select name="sexe">
								<option value="Masculin">Masculin</option>
								<option value="Féminin">Féminin</option>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20%"><label for="categorie">Catégorie:</label></td>
						<td width="50">
							<select name="categorie">
<?php
							$sql = "SELECT * FROM categorie";
							$rep = $db->query($sql);
							while($data = $rep->fetch())
							{
								echo'<option value="'.$data['id'].'">'.$data['libelle'].'</option>';
							}
?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="20%"><label for="position">Position:</label></td>
						<td width="50"><input type="text" name="position" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="rue">Rue:</label></td>
						<td width="50"><input type="text" name="rue" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="ville">Ville:</label></td>
						<td width="50"><input type="text" name="ville" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="cp">Code Postal:</label></td>
						<td width="50"><input type="number" name="cp" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="telephone">Téléphone:</label></td>
						<td width="50"><input type="tel" name="telephone" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="mail">E-Mail:</label></td>
						<td width="50"><input type="email" name="mail"required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="nationnalite">Nationnalité:</label></td>
						<td width="50"><input type="text" name="nationnalite" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="classification">Classification:</label></td>
						<td width="50"><input type="text" name="classification" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="cm">Fin du certificat médical:</label></td>
						<td width="50"><input type="date" name="cm" required=true></td>
					</tr>
					<tr>
						<td width="20%"><label for="club">Club:</label></td>
						<td width="50">
						<select name="club">
<?php
							$sql = "SELECT * FROM club";
							$rep = $db->query($sql);
							echo'<option value="vide">Veuillez sélectionner un club</option>';
							while($data = $rep->fetch())
							{
								echo'<option value="'.$data['numAffiliation_Club'].'">'.$data['designation_Club'].'</option>';
							}
?>
							</select>
						</td>
					</tr>
				</table>
				<button type="Submit" class="btn btn-default btn-lg btn-primary" >Valider</button>
			</form>
			
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