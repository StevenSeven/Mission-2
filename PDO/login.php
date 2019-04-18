
<?php
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
        require('connexion.inc.php'); // On réclame le fichier
        $login = $_GET['login'];
        $motdepasse = $_GET['motdepasse'];

         $sql = "SELECT * FROM connexion WHERE log_conn='".$login."'";

        // On vérifie si ce login existe
        $requete_1 = $conn->query($sql) or die ( $conn->errorInfo() );

        if($requete_1->rowCount()==0)
        {
            echo 'Ce login nexiste pas ! <br/>';
            echo '<a href="index.php" temp_href="index.php">Réessayer</a>';
            exit();
        }
        else {
            // On vérifie si le login et le mot de passe correspondent au compte utilisateur
            $sql = "SELECT mdp_conn FROM connexion WHERE log_conn='".$login."'";
            $requete_2 = $conn->query($sql);
            $mdp=$requete_2->fetch();

            if ($mdp['mdp_conn']==$motdepasse){
                $sql = "SELECT id_conn FROM connexion WHERE log_conn='".$login."'and mdp_conn='".$motdepasse."'";
                $requete_3 = $conn->query($sql);
                $id=$requete_3->fetch();
                echo "Felicitations";
                include("RedirectionConn.php");

               // header("Location: espaceperso.php?id=".$id['id']);
            }else{
                echo 'Mot de passe incorrect ! <br/>';
                echo '<a href="index.php" temp_href="index.php">Réessayer</a>';
                exit();
            }

        }

    }
}
?>