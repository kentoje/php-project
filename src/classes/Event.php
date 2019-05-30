<?php
namespace App;

// class Event
// {
//   private $id;
//   private $title;
//   private $description;
//   private $image;
//   private $site;

//   // Liste des getters

//   public function id()
//   {
//     return $this->_id;
//   }

//   public function title()
//   {
//     return $this->title;
//   }

//   public function description()
//   {
//     return $this->description;
//   }

//   public function image()
//   {
//     return $this->image;
//   }

//   public function site()
//   {
//     return $this->site;
//   }

//   // Liste des setters

//   public function setId(int $id)
//   {
//     $this->_id = $id;
//   }

//   public function setTitle(string $title)
//   {
//     $this->title = $title;
//   }

//   public function setDescription(string $description)
//   {
//     $this->description = $description;
//   }

//   public function setImage(string $image)
//   {
//     $this->image = $image;
//   }

//   public function setSite(string $site)
//   {
//     $this->site = $site;
//   }


//   public function changeMainEvent($newEvent) {
    
//  }
// }

class Event
{
  private $mainevent = 1;

  public function setMainevent() {
    $this->mainevent = $_SESSION['mainevent'];
  }

  public function changeMainEvent($newEvent) {
    $_SESSION['mainevent'] = $newEvent;
  }
}
