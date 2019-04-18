
<?php
session_start();
if(!isset($_GET['login']) && !isset($_GET['motdepasse']))
{
    header('Location: index.php');
}
else
{
    // On va vérifier les variables
    if(!preg_match('/^[[:alnum:]]+$/', $_GET['login']) or
        !preg_match('/^[[:alnum:]]+$/', $_GET['motdepasse']))
    {
        echo 'Vous devez entrer uniquement des lettres ou des chiffres <br/>';
        echo '<a href="index.php" temp_href="index.php">Réessayer</a>';
        exit();
    }
    else
    {
        require('conn.ini.php'); // On réclame le fichier
        $login = $_GET['login'];
        $motdepasse = $_GET['motdepasse'];

         $sql = "SELECT * FROM connexion WHERE login_conn='".$login."'";

        // On vérifie si ce login existe
        $requete_1 = $db->query($sql) or die ( $db->errorInfo() );

        if($requete_1->rowCount()==0)
        {
            echo 'Ce login nexiste pas ! <br/>';
            echo '<a href="index.php" temp_href="index.php">Réessayer</a>';
            exit();
        }
        else {
            // On vérifie si le login et le mot de passe correspondent au compte utilisateur
            $sql = "SELECT mdp_conn FROM connexion WHERE login_conn='".$login."'";
            $requete_2 = $db->query($sql);
            $mdp=$requete_2->fetch();

            if ($mdp['mdp_conn']==$motdepasse){
                $sql = "SELECT id_club FROM connexion WHERE login_conn='".$login."'";
                $requete_3 = $db->query($sql);
                $id=$requete_3->fetch();
                echo "Felicitations";

				$_SESSION["login"]=$login;
				date_default_timezone_set('Europe/Paris');
				$_SESSION["date"]=$today = date("d/m/Y H:i:s");
				$_SESSION["id"]=$id['id_club'];
				echo $_SESSION["login"];
				header("Location: index.php");
            }else{
                echo 'Mot de passe incorrect ! <br/>';
                echo '<a href="indexconnexion.php" temp_href="index.php">Réessayer</a>';
                exit();
            }

        }

    }
}
echo $_SESSION["login"];
?>