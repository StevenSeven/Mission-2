<?php
include 'connexion.php';
//Nb
$sql = "SELECT COUNT(*) as NB FROM licencie";
$rep = $db->query($sql);
while($data = $rep->fetch())
{
	$nb=$data['NB']+1;
}
//gestion de l'image
$destination = "img/";
$filename = $_FILES['my_image']['tmp_name'];
$tmpnom = $nb.".";
$f = $_FILES['my_image']['name'];
$file_ext=strtolower(end(explode('.',$f)));
$nom=$tmpnom.$file_ext;
$fichier = basename($nom);
move_uploaded_file($filename  , $destination . $fichier);

//ajout à la bdd
$datetime = date("Y");
$validite=0;
echo $datetime;
$sql = "INSERT INTO licencie(nomlicencie,prenomlicencie,datedenaissance,photolicencie,sexelicencie,categorielicencie,positionlicencie,	adr_licencie,adr_cp_licencie,adr_ville_licencie,tel_licencie,mail_licencie,nationnalite_licencie,classification_licencie,validite_CM,premiere_licence,annee_reprise,id_ClubLicencie,validation) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$req = $db->prepare($sql);
$req->execute (array(
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['datenaiss'],
	$nom,
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