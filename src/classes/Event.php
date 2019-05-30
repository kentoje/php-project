<?php
namespace App;

class Event
{
  private $id;
  private $title;
  private $description;
  private $image;
  private $site;

  function __construct($id, $title, $description, $image, $site)
  {

    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image = $image;
    $this->site = $site;
  }

  // Liste des getters

  public function id()
  {
    return $this->_id;
  }

  public function title()
  {
    return $this->title;
  }

  public function description()
  {
    return $this->description;
  }

  public function image()
  {
    return $this->image;
  }

  public function site()
  {
    return $this->site;
  }

  // Liste des setters

  public function setId(int $id)
  {
    $this->_id = $id;
  }

  public function setTitle(string $title)
  {
    $this->title = $title;
  }

  public function setDescription(string $description)
  {
    $this->description = $description;
  }

  public function setImage(string $image)
  {
    $this->image = $image;
  }

  public function setSite(string $site)
  {
    $this->site = $site;
  }

  public function saveBdd()
  {
    $stmt = Database::$pdo->prepare("  INSERT INTO events (
      title,
      description,
      image,
      site
    ) VALUES (:title, :description, :image,:site)");
    $stmt->execute(
      [
        'title'    => $this->title,
        'description' => $this->description,
        'image'     => $this->image,
        'site'     => $this->site
      ]
    );
  }
}
