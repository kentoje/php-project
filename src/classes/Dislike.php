<?php

namespace App;

class Dislike {
  private $id_dislike;
  private $id_user;
  private $id_event;

  function __construct( $idDislike, $idUser, $idEvent )
  {
    $this->id_dislike = $idDislike;
    $this->id_user = $idUser;
    $this->id_event = $idEvent;
  }

  public function getIdDislike() 
  {
    return $this->id_dislike;
  }
  
  public function getIdUser() 
  {
    return $this->id_user;
  }

  public function getIdEvent() 
  {
    return $this->id_event;
  }

  
  public function setIdDislike( int $idDislike)
  {
    $this->id_dislike = $idDislike;
  }
  
  public function setIdUser( int $idUser )
  {
    $this->id_user = $idUser;
  }
  
  public function setIdEvent( int $idEvent )
  {
    $this->id_event = $idEvent;
  }

  public function saveBdd()
  {
    $stmt = Database::$pdo->prepare('INSERT INTO dislikes (id_user, id_event) VALUES(:idUser, :idEvent)');
    $stmt->execute(
      [
        'idUser' => $this->id_user,
        'idEvent' => $this->id_event
      ]
    );
    /* $user = $stmt->fetch();
    return $user; */
  }

  public function deleteBdd()
  {
    $stmt = Database::$pdo->prepare('DELETE FROM dislikes WHERE id_user = :idUser AND id_event = :idEvent');
    $stmt->execute(
      [
        'idUser' => $this->id_user,
        'idEvent' => $this->id_event
      ]
    );
  }

  public function existBdd()
  {
    $stmt = Database::$pdo->prepare('SELECT * FROM dislikes WHERE id_user = :idUser AND id_event = :idEvent');
    $stmt->execute(
      [
        'idUser' => $this->id_user,
        'idEvent' => $this->id_event
      ]
    );
    $user = $stmt->fetch();
    return $user;
  }
}