<?php
include 'connexion.php';
$req = $db->prepare("UPDATE licencie SET validation=1 WHERE numlicencie=".$_GET['id']."");
$req->execute();

header("Location: validerlicences.php");