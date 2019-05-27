<?php

class Humain {
  private $nom;

  public function setNom( $newName ) {
    $this->nom = $newName;
  } 

  public function getNom() {
    return "Je s'appelle " . $this->nom;
  } 
}

?>