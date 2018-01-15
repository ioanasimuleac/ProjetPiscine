<?php
require_once(File::build_path(array("model", "model.php")));

class modelCategorie{
  /** ATTRIBUTS **/
  private $idCategorie;
  private $nomCategorie;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $nom = NULL){
if(!is_null($nom)){
    $this->idCategorie = $id;
    $this->nomCategorie = $nom;
  }
elseif(!is_null($id)){
    $this->idCategorie = $id;
  }
}

/** GETTERS **/
public function getIdCategorie(){
  return $this->idCategorie;
}

public function getNomCategorie(){
  return $this->nomCategorie;
}


/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readAll(){
  $sql = "SELECT * FROM categorie";
  $rep = model::$pdo->query($sql);
  $rep->setFetchMode(PDO::FETCH_CLASS, 'modelCategorie');
  return $rep->fetchAll();
}

public function create(){
}

public function update(){
}

public function delete(){
}
}
