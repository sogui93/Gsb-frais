<?php

require_once "includes/class.pdogsb.inc.php";

try{
  //  Connexion a la BDD
  $pdo = PdoGsb::getPdoGsb();

  //  Recuperation des utilisateurs
  $visiteurs = $pdo->getTousLesVisiteurs();
  
  //  Pour chaque utilisateur
  while($visiteur = $visiteurs->fetch())
  {
    //  On recuperer l'id
    $id = $visiteur['id'];
    //  On hash le mot de passe
    $hash = password_hash($visiteur['mdp'], PASSWORD_DEFAULT);
  
    //  On cree la requete sql pour la mise a jour du mot de passe
    $sql =  "UPDATE visiteur
    SET mdp = '$hash'
    WHERE id = '$id'";
  
    //  On exeute la requete
    $res = $pdo->query($sql);
  
    //  On affiche le resultat
    if ($res) {
      echo "$id => OK<br>";
    }else{    
      echo "<strong>$id</strong> => KO<br>";
    }
  }
}catch(Exception $e){
  //  Dans le cas ou il y a une erreur PHP
  var_dump($e);
}