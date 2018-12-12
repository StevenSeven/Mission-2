<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<meta http-equiv="refresh" content="5; URL=http://localhost/Seaquarium/accueil.php">-->
    <title>Document</title>
</head>
<body>

<?php
include("connexion.php");


if(isset($_POST['designation_Club']))      $libelle=$_POST['designation_Club'];
else      $libelle="";

if(isset($_POST['adrRueSiege_Club']))      $ruesiege=$_POST['adrRueSiege_Club'];
else      $ruesiege="";

if(isset($_POST['adrVilleSiege_Club']))      $villesiege=$_POST['adrVilleSiege_Club'];
else      $villesiege="";

if(isset($_POST['adrCPSiege_Club']))      $cpsiege=$_POST['adrCPSiege_Club'];
else      $cpsiege="";

if(isset($_POST['anneeAffiliation_Club']))      $anneeaffiliation=$_POST['anneeAffiliation_Club'];
else      $anneeaffiliation="";

if(isset($_POST['tel_Club']))      $tel=$_POST['tel_Club'];
else      $tel="";

if(isset($_POST['email_Club']))      $mail=$_POST['email_Club'];
else      $mail="";

if(isset($_POST['adrRueCourrier_Club']))      $ruecourrier=$_POST['adrRueCourrier_Club'];
else      $ruecourrier="";

if(isset($_POST['adrVilleCourrier_Club']))      $villecourrier=$_POST['adrVilleCourrier_Club'];
else      $villecourrier="";

if(isset($_POST['adrCPCourrier_Club']))      $cpcourrier=$_POST['adrCPCourrier_Club'];
else      $cpcourrier="";

if(isset($_POST['numPrefecture_Club']))      $prefecture=$_POST['numPrefecture_Club'];
else      $prefecture="";

//if(empty($nom) || empty($sexe))
{
    //'<p color="red">Attention, champs 1 ou 2 vide !  </p>';
//}
//else {


// on écrit la requéte sql

     $sql = "INSERT INTO club(designation_Club,adrRueSiege_Club,adrVilleSiege_Club,adrCPSiege_Club,anneeAffiliation_Club,tel_Club,email_Club,adrRueCourrier_Club,adrVilleCourrier_Club,adrCPCourrier_Club,numPrefecture_Club) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    // $sql = "select ajouter_animal('$nom','$sexe','$type','$pere','$mere','$naissance','$idfamille')";
    //$sql = "select ajouter_club(?,?,?,?,?,?,?,?,?,?,?)";

    $req = $db->prepare($sql);
    $req->execute(Array($libelle, $ruesiege,$villesiege, $cpsiege, $anneeaffiliation, $tel,$mail,$ruecourrier,$villecourrier,$cpcourrier,$prefecture));
    $req->closeCursor();

// on affiche le résultat pour le visiteur
    echo 'Vos informations ont bien été ajoutées.';
}
?>
<p><a href="index.php">Retour à l'accueil</a></p></br>

</body>
</html>