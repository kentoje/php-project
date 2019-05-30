<?php

namespace App;

class Like {
  private $id_like;
  private $id_user;
  private $id_event;

  function __construct( $idLike, $idUser, $idEvent )
  {
    $this->id_like = $idLike;
    $this->id_user = $idUser;
    $this->id_event = $idEvent;
  }

  public function getIdLike() 
  {
    return $this->id_like;
  }
  
  public function getIdUser() 
  {
    return $this->id_user;
  }

  public function getIdEvent() 
  {
    return $this->id_event;
  }

  
  public function setIdLike( int $idLike)
  {
    $this->id_like = $idLike;
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
    $stmt = Database::$pdo->prepare('INSERT INTO likes (id_user, id_event) VALUES(:idUser, :idEvent)');
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
    $stmt = Database::$pdo->prepare('DELETE FROM likes WHERE id_user = :idUser AND id_event = :idEvent');
    $stmt->execute(
      [
        'idUser' => $this->id_user,
        'idEvent' => $this->id_event
      ]
    );
  }

  public function existBdd()
  {
    $stmt = Database::$pdo->prepare('SELECT * FROM likes WHERE id_user = :idUser AND id_event = :idEvent');
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