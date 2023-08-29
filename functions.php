<?php 

//function affichePagnan($ville, $postal){
  //  echo $ville.' '.$postal;
   
//}

//affichePagnan("Soissons", "02200");


   

//function calcul($nb){
   //$results = $nb * $nb * $nb;
   //echo $results;
//}
 
// exécution de notre fonction
//calcul(50);

function salutation($fName, $lName){
  echo "Bonjour".' '.$lName.' '.$fName.' '."! Comment vas tu ?";  
  if (preg_match("/^[a-zA-ZÀ-ÿ]+$/", $lName)) { 
    echo "C'est TOUT BON !";
  } else {
    echo "Erreur";
  }
  
}
salutation("Kule", "Jean02");


function dbConnect($hote, $dbName, $user, $psw) {
  
    $conn = new PDO(
        "mysql:host=$hote;dbname=$dbName;charset=utf8","$user","$psw"    
    );
    return $conn;
}




   


function insertClient($lName, $fName, $mail, $pwd, $chev) {
    $connect = dbconnect("localhost", "bk", "root", ""); // Obtenir la connexion à la base de données

    
    // Requête SQL d'insertion
    if($connect){
      $req = "INSERT INTO clients (nom, prenom, email) VALUES ('$lName', '$fName', '$mail', '$pwd', '$chev')";
      $exec = $connect->query($req);

      if($exec){
        return(TRUE);
      }
    }
    
    
 
} 

function convertisseur($results){
   echo $results."euros font".$results*1.08."US Dollars";
}
 

convertisseur(100);
// PROCEDURE 

function delete($clID){
  $connect = dbconnect("localhost", "bk", "root", "");
  
  if($connect){
    $req = "DELETE FROM client WHERE id = $clID";
    $exec = $connect->query($req);
  }


  if ($exec){
    $result = TRUE;
   
  } else {
  $result = FALSE;
  
  }
  return $result;
}

echo delete(1);


// array select
function select(){
  $connect = dbconnect("localhost", "bk", "root", "");

  if($connect){
    $req = "SELECT * FROM client";
    $exec = $connect->query($req);
  }
  if ($exec){
    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
  } 
  else {
   $result = FALSE;
  }
  return $result;
  
}
$clients = select(); ?>
<table>
  <tbody>
  <thead>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Email</th>
    <th>Mot de passe</th>
    <th>Chevalet</th>
  </thead>
  <?php
foreach($clients as $single){ ?>
<tr>
  <td><?= $single['nom']; ?></td>
  <td><?= $single['prenom']; ?></td>
  <td><?= $single['email']; ?></td>
  <td><?= $single['password']; ?></td>
  <td><?= $single['id_1']; ?></td>
</tr>
<?php } ?>
  </tbody>
</table>



<?php

  function update($id, $nom, $prenom, $email, $motdepasse, $chev){
    $connect = dbconnect("localhost", "bk", "root", "");
    if($connect){
      $req = "UPDATE Client SET nom='$nom', prenom='$prenom', email='$email', password='$motdepasse', id_1=$chev WHERE id='$id'";
      $execute = $connect->query($req);
    }
        if($execute){
          $return = TRUE;
        }
        else{
          $return = FALSE;
        }
      return $return;
  }
   update(1, 'Au-Revoir', 'Bonjou', 'aurevoirbonjou@gmail.com', '123testPepito', 1);
  ?>