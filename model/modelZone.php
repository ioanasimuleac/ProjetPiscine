<?php
require_once(File::build_path(array("model", "model.php")));

class modelZone{
  /** ATTRIBUTS **/
  private $idZone;
  private $nomZone;
  private $anneeFestival;
  private $idEditeur;
  private $idCategorie;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $nom = NULL, $annee = NULL, $idE = NULL, $idC = NULL){
if(!is_null($nom) && !is_null($annee) && !is_null($idE)){
    $this->idZone = $id;
    $this->nomZone = $nom;
    $this->anneeFestival = $annee;
    $this->idEditeur = $idE;
    $this->idCategorie = null;
  }
elseif(!is_null($nom) && !is_null($annee) && !is_null($idC)){
    $this->idZone = $id;
    $this->nomZone = $nom;
    $this->anneeFestival = $annee;
    $this->idEditeur = null;
    $this->idCategorie = $idC;
  }
  elseif(!is_null($id)){
      $this->idZone = $id;
    }
}

/** GETTERS **/
public function getIdZone(){
  return $this->idZone;
}

public function getNomZone(){
  return $this->nomZone;
}

public function getAnneeFestival(){
  return $this->nomZone;
}

public function getIdEditeur(){
  return $this->idEditeur;
}

public function getIdCategorie(){
  return $this->idCategorie;
}

public function getNomEditeur(){
  $sql = "SELECT nomEditeur FROM editeur WHERE idEditeur = :idE";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idE" => $this->idEditeur);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomEditeur'];
}

public function getNomCategorie(){
  $sql = "SELECT nomCategorie FROM categorie WHERE idCategorie = :idC";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idC" => $this->idCategorie);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomCategorie'];
}

public function getNbPlacesOccupees(){
  $sql = "SELECT SUM(nbPlaces) AS placesOccupees FROM localiser WHERE idZone = :idZ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['placesOccupees'];
}


/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function read(){
  $sql = "SELECT * FROM zone WHERE idZone = :idZ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $_GET['idZone']);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep;
}

public static function readAllFestival($annee){
  $sql = "SELECT * FROM zone WHERE anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("annee" => $annee);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelZone');
  return $req_prep->fetchAll();
}

public static function readAllZonesLibres($idReservation){
  $sql = "SELECT idZone, nomZone FROM zone WHERE idZone NOT IN(SELECT idZone FROM Localiser WHERE idReservation = :idR)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idR" => $idReservation);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelZone');
  return $req_prep->fetchAll();
}

public function create(){
  $sql = "INSERT INTO zone(nomZone, anneeFestival, idEditeur, idCategorie) VALUES (:nomZ, :anneeF, :idE, :idC)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nomZ" => $this->nomZone, "anneeF" => $this->anneeFestival, "idE" => $this->idEditeur, "idC" => $this->idCategorie);
  $req_prep->execute($values);
}

public function update(){
}

public function delete(){
  $sql = "DELETE FROM zone WHERE idZone = :idZ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone);
  $req_prep->execute($values);
}
}
