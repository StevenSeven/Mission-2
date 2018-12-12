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
		include "connexion.php";
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
						
						
echo'				</div>
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
				btnfoundlicences.addEventListener('click', function() {
					document.location.href = 'voirClub.php';
				});
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>