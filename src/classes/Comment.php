<?php

namespace App;

class Comment {
  private $idComment;
  private $idUser;
  private $content;

  public function __construct( $idComment, $idUser, $content )
  {
    $this->idComment = $idComment;
    $this->idUser = $idUser;
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
  
  public function getContent()
  {
    return $this->content;
  }

  public function sendDb()
  {
    $stmt = Database::$pdo->prepare("  INSERT INTO comments (
      id_user,
      content
    ) VALUES (:user, :content)");
    $stmt->execute(
      [
        'user'    => $this->idUser,
        'content' => $this->content
      ]
    );
    $commentaire = $stmt->fetch();
    return $commentaire;
  }
}


