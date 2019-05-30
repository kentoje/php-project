<?php

namespace App;

class Comment {
  private $idComment;
  private $idUser;
  private $idEvent;
  private $content;
  private $date;

  public function __construct( $idComment, $idUser, $idEvent, $content, $date)
  {
    $this->idComment = $idComment;
    $this->idUser = $idUser;
    $this->idEvent = $idEvent;
    $this->content = $content;
    $this->date = $date;
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
      content,
      date_post
    ) VALUES (:user, :idevent, :content, :datepost)");
    $stmt->execute(
      [
        'user'    => $this->idUser,
        'idevent' => $this->idEvent,
        'content' => $this->content,
        'datepost' => $this->date
      ]
    );
    /* $commentaire = $stmt->fetch();
    return $commentaire; */
  }

  public function updateDb()
  {
    $stmt = Database::$pdo->prepare("  UPDATE comments SET content = :content, date_post = :datepost WHERE id_comment = :idcomment ");
    $stmt->execute(
      [
        'content'      => $this->content,
        'idcomment'    => $this->idComment,
        'datepost'     => $this->date
      ]
    );
    /* $commentaire = $stmt->fetch();
    return $commentaire; */
  }
}