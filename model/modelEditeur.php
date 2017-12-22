<?php
require_once(File::build_path(array("model", "model.php")));

class modelEditeur{
  /** ATTRIBUTS **/
  private $idEditeur;
  private $nomEditeur;
  private $rueEditeur;
  private $villeEditeur;
  private $CPEditeur;
  /*private $something;*/

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $nom = NULL, $rue = NULL, $ville = NULL, $cp = NULL/*, $something = NULL*/){
if(!is_null($nom) && !is_null($rue) && !is_null($ville) && !is_null($cp)/* && !is_null($something)*/){
    $this->idEditeur = $id;
    $this->nomEditeur = $nom;
    $this->rueEditeur = $rue;
    $this->villeEditeur = $ville;
    $this->CPEditeur = $cp;
    /*$this->something = $something;*/
  }
elseif(!is_null($id)){
    $this->idEditeur = $id;
    /*$this->something = $something;*/
  }
}

/** GETTERS **/
public function getIdEditeur(){
  return $this->idEditeur;
}

public function getNomEditeur(){
  return $this->nomEditeur;
}

public function getVilleEditeur(){
  return $this->villeEditeur;
}

public function getRueEditeur(){
  return $this->rueEditeur;
}

public function getCPEditeur(){
  return $this->CPEditeur;
}

/*public function getSomething(){
return $this->something;
}*/

/** SETTERS **/
public function setNomEditeur($nom){
  $this->nomEditeur = $nom;
}

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readAll(){
  $sql = "SELECT * FROM editeur";
  $rep = model::$pdo->query($sql);
  $rep->setFetchMode(PDO::FETCH_CLASS, 'modelEditeur');
  return $rep->fetchAll();
}

public function create(){
  $sql = "INSERT INTO editeur(nomEditeur, villeEditeur, rueEditeur, CPEditeur) VALUES (:nomE, :villeE, :rueE, :CPE)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nomE" => $this->nomEditeur, "villeE" => $this->villeEditeur, "rueE" => $this->rueEditeur, "CPE" => $this->CPEditeur);
  $req_prep->execute($values);
}

public function update(){
  $sql = 'UPDATE editeur SET nomEditeur = :nomT';
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nomT" => $this->nomEditeur);
  $req_prep->execute($values);
}

public function delete(){
  $sql = "DELETE FROM editeur WHERE idEditeur = :idEditeur";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEditeur" => $this->idEditeur);
  $req_prep->execute($values);
}
}
