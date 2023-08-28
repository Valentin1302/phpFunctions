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
    var_dump($conn);
}

dbConnect("localhost", "bk", "root", "");



   


function insertClient($nom, $prenom, $email) {
    $conn = dbconnect("localhost", "bk", "root", ""); // Obtenir la connexion à la base de données

    
    // Requête SQL d'insertion
    $query = "INSERT INTO clients (nom, prenom, email) VALUES ('$nom', '$prenom', '$email')";
    
    
 
}

?>
