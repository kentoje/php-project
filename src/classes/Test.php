<?php

class Humain {
  private $nom;
  /* Les getter et setter permettent d'intéragir avec les variables private */
  /* Ceci est un setter */
  public function setNom( $newName ) {
    $this->nom = $newName;
  } 

  /* Ceci est un getter */
  public function getNom() {
    return "Je s'appelle " . $this->nom;
  } 
}

?>