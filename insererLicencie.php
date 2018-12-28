<?php
include 'connexion.php';
$datetime = date("Y");
$validite=0;
echo $datetime;
$sql = "INSERT INTO licencie(nomlicencie,prenomlicencie,datedenaissance,photolicencie,sexelicencie,categorielicencie,positionlicencie,	adr_licencie,adr_cp_licencie,adr_ville_licencie,tel_licencie,mail_licencie,nationnalite_licencie,classification_licencie,validite_CM,premiere_licence,annee_reprise,id_ClubLicencie,validation) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$req = $db->prepare($sql);
$req->execute (array(
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['datenaiss'],
	$_POST['photo'],
	$_POST['sexe'],
	$_POST['categorie'],
	$_POST['position'],
	$_POST['rue'],
	$_POST['cp'],
	$_POST['ville'],
	$_POST['telephone'],
	$_POST['mail'],
	$_POST['nationnalite'],
	$_POST['classification'],
	$_POST['cm'],
	$datetime,
	$datetime,
	$_POST['club'],
	$validite
));

header("Location: index.php");