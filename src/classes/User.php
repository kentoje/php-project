<?php 

namespace App;

class User {
  private $id;
  private $name;
  private $mail;
  private $password;
  private $image;

  public function __construct( $id, $name, $mail, $password, $image )
  {
    $this->id = $id;
    $this->name = $name;
    $this->mail = $mail;
    $this->password = $password;
    $this->image = $image;
  }

  /* setters */

  public function setId( int $id )
  {
    $this->id = $id;
  }

  public function setName( string $name )
  {
    $this->name = $name;
  }

  public function setMail( string $mail )
  {
    $this->mail = $mail;
  }

  public function setPassword( string $password )
  {
    $this->password = password_hash( $password, PASSWORD_DEFAULT );
  }

  public function setImage( string $image )
  {
    $this->image = $image;
  }

  /* getters */

  public function getId()
  {
    return $this->id;
  }
  
  public function getName()
  {
    return $this->name;
  }
  
  public function getMail()
  {
    return $this->mail;
  }
  
  public function getPassword()
  {
    /* TODO: déhasher le mot de passe */
    /* $this->password = password_verify() */
    return $this->password;
  }
  
  public function getImage()
  {
    return $this->image;
  }
}