<?php
include 'connexion.php';
$req = $db->prepare("CALL validerLicence(".$_GET['id'].")");
$req->execute();

header("Location: validerlicences.php");