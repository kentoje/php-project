<?php

namespace App;

class Comment {
  private $idComment;
  private $idUser;
  private $idEvent;
  private $content;

  public function __construct( $idComment, $idUser, $idEvent, $content )
  {
    $this->idComment = $idComment;
    $this->idUser = $idUser;
    $this->idEvent = $idEvent;
    $this->content = $content;
  }

  /* setters */

  public function setIdComment( int $idComment )
  {
    $this->idComment = $idComment;
  }
  
  public function setIdUser( int $idUser )
  {
    $this->idUser = $idUser;
  }
  
  public function setEvent( string $idEvent )
  {
    $this->idEvent = $idEvent;
  }

  public function setContent( string $content )
  {
    $this->content = $content;
  }
  
  /* getters */

  public function getIdComment()
  {
    return $this->idComment;
  }
  
  public function getIdUser()
  {
    return $this->idUser;
  }

  public function getEvent()
  {
    return $this->idEvent;
  }
  
  public function getContent()
  {
    return $this->content;
  }

  public function sendDb()
  {
    $stmt = Database::$pdo->prepare("  INSERT INTO comments (
      id_user,
      id_event,
      content
    ) VALUES (:user, :idevent, :content)");
    $stmt->execute(
      [
        'user'    => $this->idUser,
        'idevent' => $this->idEvent,
        'content' => $this->content
      ]
    );
    /* $commentaire = $stmt->fetch();
    return $commentaire; */
  }

  public function updteDb()
  {
    $stmt = Database::$pdo->prepare("  UPDATE comments SET content = :content WHERE id_user = :user AND id_event = :idevent ");
    $stmt->execute(
      [
        'user'    => $this->idUser,
        'idevent' => $this->idEvent,
        'content' => $this->content
      ]
    );
    /* $commentaire = $stmt->fetch();
    return $commentaire; */
  }
}


