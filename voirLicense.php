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
		<?php
		include "conn.ini.php";
			echo '
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
					</div>
					<div class="col-sm-10" style="background-color:lavenderblush;">';
						
						
							
							$sql = "SELECT * FROM licencié WHERE id_licencie = '".$_GET['viewlicences']."'";
							$rep = $db->query($sql);
							while($data = $rep->fetch())
							{
								$nom=$data['nom_Licencie'];
								$prenom=$data['prenom_Licencie'];
								$datenaiss=$data['dateNaiss_Licencie'];
								$sexe=$data['sexe_Licencie'];
								$categorie=$data['categorie_Licencie'];
								$position=$data['position_Licencie'];
								$adresse=$data['adrRue_Licencie'];
								$cp=$data['adrCP_Licencie'];
								$ville=$data['adrVille_Licencie'];
								$telephone=$data['tel_Licencie'];
								$email=$data['email_Licencie'];
								$nationnalite=$data['nationnalite_Licencie'];
								$classification=$data['classification_Licencie'];
								$finvaliditeCM=$data['finValiditeCM_Licencie'];
								$firstanneelicence= $data['firstAnneeLicence_Licencie'];
								$lastanneereprise= $data['lastAnneeReprise_Licencie'];
							}
						
echo '
						<span class="span-center">Visualisation de la licence de '.$nom.' '.$prenom.' </span>
						<a href="index.php">Retours</a>
						<a href="">Modifier</a>
								
						<span class="span-right">N° Licence: </span>
						<span class="span-right">N° Club: </span>
								
						<div class="row">
							<div class="col-sm-7">
								<span class="span-etatcivil">Etat Civil</span>
								<table align="left" style="width:100%;">
									<tr>
										<td width="20%"><label for="nom"> Nom:</label></td>
										<td width="50"><label for="nom">'.$nom.'</label></td>
									</tr>
									<tr>
										<td width="20%"><label for="prenom"> Prenom:</label></td>
										<td width="50"><label for="prenom">'.$prenom.'</label></td>
									</tr>
									<tr>
										<td width="20%"><label for="datenaiss"> Date de naissance:</label></td>
										<td width="50"><label for="datenaiss">'.$datenaiss.'</label></td>
									</tr>
									<tr>
										<td width="20%"><label for="sexe"> Sexe:</label></td>
										<td width="50"><label for="sexe">'.$sexe.'</label></td>
									</tr>
									<tr>
										<td width="20%"><label for="categorie"> Catégorie:</label></td>
										<td width="50"><label for="categorie">'.$categorie.'</label></td>
									</tr>
									<tr>
										<td width="20%"><label for="position"> Position:</label></td>
										<td width="50"><label for="position">'.$position.'</label></td>
									</tr>
								</table>
							</div>
							<div class="col-sm-4">
								<span class="span-coordonnee">Coordonnée</span>
								<table align="left" style="width:100%;">
									<tr>
										<td width="40%"><label for="adresse"> Adresse:</label></td>
										<td><label for="adresse">'.$adresse.'</label></td>
									</tr>
									<tr>
										<td></td>
										<td><label for="cp">'.$cp.'</label> <label for="ville">'.$ville.'</label></td>
									</tr>
									<tr>
										<td width="40%"><label for="telephone"> Téléphone:</label></td>
										<td><label for="telephone">'.$telephone.'</label></td>
									</tr>
									<tr>
										<td width="40%"><label for="email"> Email:</label></td>
										<td><label for="email">'.$email.'</label></td>
									</tr>
									<tr>
										<td width="40%"><label for="nationnalite"> Nationnalité:</label></td>
										<td><label for="nationnalite">'.$nationnalite.'</label></td>
									</tr>
									<tr>
										<td width="40%"><label for="classification"> Classification:</label></td>
										<td><label for="classification">'.$classification.'</label></td>
									</tr>
									<tr>
										<td width="40%"><label for="finvaliditeCM" style="color:red;"> Fin de validité du certificat médical:</label></td>
										<td><label for="finvaliditeCM">'.$finvaliditeCM.'</label></td>
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
										<td><label for="firstanneelicence">'.$firstanneelicence.'</label></td>
										<td width="35%"><a href="">Dernière année de reprise</a></td>
										<td><label for="lastanneereprise">'.$lastanneereprise.'</label></td>
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
			';
		
		?>
	
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
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>