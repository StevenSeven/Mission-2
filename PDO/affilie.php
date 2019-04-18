<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="background.css" />
    <title>AjouterLicencie</title>
</head>
<div class="centrer">

    <h1>ici on ajoute une affiliation : </h1>

    <form method="post" action="redirectionaffilie.php">




        <p><h1>Veuillez indiquer le nom du licencie:</h1> <br />

        <input type=text name="nomlicencie">

        </p>



        <p><h1>Veuillez indiquer le prenom du licencie:</h1> <br />

        <input type=text name="prenomlicencie">

        </p>



        <p> <h1>Veuillez indiquer le sexe du licencie :</h1><br />

        <select  class="sexelicencie" name="sexelicencie">
            <option>Masculin</option>
            <option>Féminin</option>
        </select>

        </p>



        <p><h1>Veuillez indiquer la categorie du licencie:</h1> <br />

        <input type=number name="categorielicencie">

        </p>



        <p><h1>Veuillez indiquer la position du licencie:</h1> <br />

        <input type=text name="positionlicencie">

        </p>


        <p><h1>Veuillez indiquer l'adresse du licencie:</h1> <br />

        <input type=text name="adr_licencie">

        </p>

        <p><h1>Veuillez indiquer la ville du licencie:</h1> <br />

        <input type=text name="ville_licencie">

        </p>

        <p><h1>Veuillez indiquer le numéro de téléphone:</h1> <br />

        <input type=text name="tel_licencie">

        </p>

        <input type="submit" value="Envoyer" />

    </form method="post" action="redirectionaffilie.php">


    </form>
    <!-- Submit Noter -->

    <!-- Note restaurant -->



    <!-- Textarea général -->


</div>
<p><a href="RedirectionConn.php">Retour à l'accueil</a></p></br>
</body>
</html>
