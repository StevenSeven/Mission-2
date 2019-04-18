<?php
include "connexion.inc.php";
$id=$_GET['id'];
$select_fiche = $conn->query("SELECT * FROM personne WHERE id = '".$id."'");
$data = $select_fiche->fetch();

echo '<form action="insert_reinstallation.php" method="post">
<table>
                  <tr>
                       <td width="100"><br><label for="Nom">Nom: </label></td>
                       <td><input type="text" name="nom" class="form-control" value="'.$data['id'].'" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Prenom">Prenom: </label></td>
                       <td><input type="text" name="prenom" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Fonction">Fonction: </label></td>
                       <td><input type="text" name="Fonction" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Mail">Mail: </label></td>
                       <td><input type="text" name="Mail" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Entreprise">Entreprise: </label></td>
                       <td><input type="text" name="Entreprise" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Rue">Rue: </label></td>
                       <td><input type="text" name="Rue" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Ville">Ville: </label></td>
                       <td><input type="text" name="Ville" class="form-control" value="" required="required"></td>
                  </tr>
                  <tr>
                       <td width="100"><br><label for="Code Postal">Code Postal: </label></td>
                       <td><input type="text" name="Code Postal" class="form-control" value="" required="required"></td>
                  </tr>
                  <td><input class="btn btn-outline-light my-2 my-sm-0 "type="submit" value="OK"  style="width:200px"></td>
                  
</table>
       </form>';