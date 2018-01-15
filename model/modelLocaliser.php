<?php
require_once(File::build_path(array("model", "model.php")));

class modelLocaliser{
  /** ATTRIBUTS **/
  private $idZone;
  private $idReservation;
  private $nbPlaces;

  /** CONSTRUCTEUR **/
public function __construct($idZ = NULL, $idR = NULL, $nb = NULL){
if(!is_null($idZ) && !is_null($idR) && !is_null($nb)){
    $this->idZone = $idZ;
    $this->idReservation = $idR;
    $this->nbPlaces = $nb;
  }
}

/** GETTERS **/
public function getIdZone(){
  return $this->idZone;
}

public function getIdReservation(){
  return $this->idReservation;
}

public function getNbPlaces(){
  return $this->nbPlaces;
}

public function getNomZone(){
  $sql = "SELECT nomZone FROM zone WHERE idZone = :idZ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomZone'];
}

/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readAllReservation($idReservation){
  $sql = "SELECT * FROM localiser WHERE idReservation = :idR";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idR" => $idReservation);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelLocaliser');
  return $req_prep->fetchAll();
}

public static function sumNbPlaces(){
  $sql = "SELECT SUM(nbPlaces) FROM localiser";
  $rep = model::$pdo->query($sql);
  return $rep->fetch();
}

public function create(){
  $sql = "INSERT INTO localiser(idZone, idReservation, nbPlaces) VALUES (:idZ, :idR, :nbPl)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone, "idR" => $this->idReservation, "nbPl" => $this->nbPlaces);
  $req_prep->execute($values);
}

public function delete(){
  $sql = "DELETE FROM localiser WHERE idZone = :idZ AND idReservation = :idR AND nbPlaces = :nbP";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone, "idR" => $this->idReservation, "nbP" => $this->nbPlaces);
  $req_prep->execute($values);
}

}
