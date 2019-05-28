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
    $this->isUser = $idUser;
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
  
  public function setIdEvent( int $idEvent )
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
  
  public function getIdEvent()
  {
    return $this->idEvent;
  }
  
  public function getContent()
  {
    return $this->content;
  }
}