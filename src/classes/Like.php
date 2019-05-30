<?php

namespace App;

class Like {
  private $id_like;
  private $id_user;
  private $id_event;

  function __construct( $id_like, $id_user, $id_event )
  {
    $this->id_like;
    $this->id_user;
    $this->id_event;
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

  
  public function setIdLike( int $id_like)
  {
    $this->id_like = $id_like;
  }
  
  public function setIdUser( int $id_user )
  {
    $this->id_user = $id_user;
  }
  
  public function setIdEvent( int $id_event )
  {
    $this->id_event = $id_event;
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
    $user = $stmt->fetch();
    return $user;
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