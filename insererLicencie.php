<?php
include 'connexion.php';

//ajout à la bdd
$datetime = date("Y");
$validite=0;
echo $datetime;
$req = $db->prepare("CALL ajouterLicence(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$req->execute (array(
	$_POST['nom'],
	$_POST['prenom'],
	$_POST['datenaiss'],
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
	$validite,
	"null"
));


//Nb
$id = 0;
$sql = "SELECT LAST_INSERT_ID() as id FROM licencie";
$rep = $db->query($sql);
while($data = $rep->fetch())
{
	$id = $data['id'];
}
//gestion de l'image
$destination = "img/";
$filename = $_FILES['my_image']['tmp_name'];
$tmpnom = $id.".";
$f = $_FILES['my_image']['name'];
$file_ext=strtolower(end(explode('.',$f)));
$nom=$tmpnom.$file_ext;
$fichier = basename($nom);
move_uploaded_file($filename  , $destination . $fichier);

//update pour affecter le nom de la photo
$req2 = $db->prepare("CALL nomPhotoLicencie(?,?)");
$req2->execute (array(
	$nom,
	$id
));

header("Location: index.php");