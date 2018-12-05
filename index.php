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
						<button type="button" id="btnviewlicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Visualisation des licences</button>
						<button type="button" id="btnfoundlicences" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Rechercher un(e) licencé(e)</button>
						<button type="button" id="btnviewclub" class="btn btn-primary" style="margin-left:5px; margin-bottom:1px; width:210px;">Visualiser un club</button>
					</div>
					<div class="col-sm-10" style="background-color:lavenderblush;">';
						if(isset($_GET['createlicences'])){
							echo '
								<span class="span-center">Création des Licenciés</span>
								
							';
						}
						if(isset($_GET['viewlicences'])){
							
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
						if ($_GET['viewlicences']!= null){
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
								';				
						}
						}
						if(isset($_GET['foundlicencie'])){
							echo'
							<span class="span-center">Liste des licenciés</span>
							
							<form action="index.php?foundlicencie" method="post">
								<table align="left" style="width:50%;">
									<tr>
										<td width="20%"><label for="numlicence"> N° licence:</label></td>
										<td width="50"><input name="debnumlicence"></td>
										<td width="50"><input name="finnumlicence"></td>
									</tr>
									<tr>
										<td width="20%"><label for="nom"> Nom:</label></td>
										<td width="50"><input name="debnom"></td>
										<td width="50"><input name="finnom"></td>
									</tr>
									<tr>
										<td width="20%"><label for="club"> Club:</label></td>
										<td width="50"><input name="debclub"></td>
										<td width="50"><input name="finclub"></td>
									</tr>
								</table>
								<button type="Submit">Valider</button>
							</form>
							<button>Annuler</button>
							<button type="button" id="btncreatelicences">Créer</button>
								';
							if(isset($_POST['debclub'])){
								echo $_POST['finclub'];
							}								
						}
						if(isset($_GET['viewclub'])){
							$sql = "SELECT * FROM club WHERE numAffiliation_Club = '".$_GET['viewclub']."'";
							$rep = $db->query($sql);
							while($data = $rep->fetch())
							{
								$numAffiliation_Club=$data['numAffiliation_Club'];
								$designation_Club=$data['designation_Club'];
								$adrRueSiege_Club=$data['adrRueSiege_Club'];
								$adrVilleSiege_Club=$data['adrVilleSiege_Club'];
								$adrCPSiege_Club=$data['adrCPSiege_Club'];
								$anneeAffiliation_Club=$data['anneeAffiliation_Club'];
								$tel_Club=$data['tel_Club'];
								$email_Club=$data['email_Club'];
								$adrRueCourrier_Club=$data['adrRueCourrier_Club'];
								$adrVilleCourrier_Club=$data['adrVilleCourrier_Club'];
								$adrCPCourrier_Club=$data['adrCPCourrier_Club'];
								$numPrefecture_Club=$data['numPrefecture_Club'];
							}
							$sql = "SELECT COUNT(*)as nb FROM licencié WHERE id_ClubLicencie = '".$_GET['viewclub']."'";
							$rep = $db->query($sql);
							while($data = $rep->fetch())
							{
								$nblicencies=$data['nb'];
								
							}
						if ($_GET['viewclub']!= null){
							echo '
								<span class="span-center">Visualisation du club '.$numAffiliation_Club.' '.$designation_Club.' </span>
								<a href="index.php">Retours</a>
								
								<div class="row">
									<div class="col-sm-7">
										<span class="span-etatcivil">Année de dernière affiliation '.$anneeAffiliation_Club.'</span>
										<table align="left" style="width:100%;">
											<tr>
												<td width="50%"><label for="Adresse du Siège"> Adresse du Siège:</label></td>
												<td width="50%"><label for="Envoi du courrier">Envoi du courrier:</label></td>
											</tr>
											<tr>
												<td width="50%"><label for="AdrRueSiege">'.$adrRueSiege_Club.'</label></td>
												<td width="50%"><label for="AdrRueCourrier">'.$adrRueCourrier_Club.'</label></td>
											</tr>
											<tr>
												<td width="50%"><label for="AdrCPSiege">'.$adrCPSiege_Club.' </label> <label for="AdrVilleSiege">'.$adrVilleSiege_Club.' </label></td>
												<td width="50%"><label for="AdrCPCourrier">'.$adrCPCourrier_Club.' </label> <label for="AdrVilleCourrier">'.$adrVilleCourrier_Club.' </label></td>
											</tr>
											
										</table>
									</div>
									<div class="row">
									<div class="col-sm-12">
										<table align="left" style="width:100%;">
											<tr>
												<td width="50%"><label for="Coordonnées">Coordonnées:</label></td>
											</tr>
											<tr>
												<td width="50%"><label for="tel">Téléphone</label></td>
												<td width="50%"><label for="tel">'.$tel_Club.'</label></td>
												<td width="50%"><label for="email">Email</label></td>
												<td width="50%"><label for="tel">'.$email_Club.'</label></td>
											</tr>	
										</table>
									</div>
									
									<label for "n°enregistrement">N° d\'enregistrement à la préfecture: </label>'.$numPrefecture_Club.'
									<label for "nblicenciés">Nombre de licenciés:</label>'.$nblicencies.'
									
								
								';				
						}
						}
echo'				</div>
				</div>
			';
		
		?>
	
		 <script>
			var btncreatelicences = document.getElementById('btncreatelicences');
				btncreatelicences.addEventListener('click', function() {
					document.location.href = 'index.php?createlicences';
				});
			
			var btnfoundlicences = document.getElementById('btnfoundlicences');
				btnfoundlicences.addEventListener('click', function() {
					document.location.href = 'index.php?foundlicencie';
				});
			var btnviewclub = document.getElementById('btnviewclub');
				btnviewclub.addEventListener('click', function() {
					document.location.href = 'index.php?viewclub';
				});
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>