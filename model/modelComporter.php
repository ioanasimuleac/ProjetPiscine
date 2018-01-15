<?php
require_once(File::build_path(array("model", "model.php")));

class modelComporter{
  /** ATTRIBUTS **/
  private $idZone;
  private $idReservation;
  private $idJeu;
  private $nbComporter;
  private $recuComporter;
  private $retourComporter;
  private $donComporter;

  /** CONSTRUCTEUR **/
public function __construct($idZ = NULL, $idR = NULL, $idJ = NULL, $nbC = NULL, $recuC = NULL, $retourC = NULL, $donC = NULL){
if(!is_null($idZ) && !is_null($idR) && !is_null($idJ)){
    $this->idZone = $idZ;
    $this->idReservation = $idR;
    $this->idJeu = $idJ;
    $this->nbComporter = $nbC;
    $this->recuComporter = $recuC;
    $this->retourComporter = $retourC;
    $this->donComporter = $donC;
  }
  if(!is_null($idZ) && !is_null($idR)){
      $this->idZone = $idZ;
      $this->idReservation = $idR;
    }
}

/** GETTERS **/
public function getIdZone(){
  return $this->idZone;
}

public function getIdReservation(){
  return $this->idReservation;
}

public function getIdJeu(){
  return $this->idJeu;
}

public function getNbComporter(){
  return $this->nbComporter;
}

public function getRecuComporter(){
  return $this->recuComporter;
}

public function getRetourComporter(){
  return $this->retourComporter;
}

public function getDonComporter(){
  return $this->donComporter;
}

public function getNomJeu(){
  $sql = "SELECT nomJeu FROM jeu WHERE idJeu = :idJ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idJ" => $this->idJeu);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomJeu'];
}

public function getIdEditeur(){
  $sql = "SELECT idEditeur FROM reservation R WHERE idReservation = :idR";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idR" => $this->idReservation);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['idEditeur'];
}

public function getNomEditeur(){
  $sql = "SELECT E.nomEditeur FROM editeur E JOIN reservation R ON R.idEditeur = E.idEditeur WHERE R.idReservation = :idR";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idR" => $this->idReservation);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomEditeur'];
}


/** SETTERS **/


/** METHODES **/


public static function readAll($idReservation){
  $sql = "SELECT * FROM comporter WHERE idReservation = :idR";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idR" => $idReservation);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelComporter');
  return $req_prep->fetchAll();
}

public static function readAllZone(){
  $sql = "SELECT * FROM comporter WHERE idZone = :idZ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $_GET['idZone']);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelComporter');
  return $req_prep->fetchAll();
}

public static function read(){
}

public function create(){
  $sql = "INSERT INTO comporter(idZone, idReservation, idJeu, nbComporter, recuComporter, retourComporter, donComporter) VALUES (:idZ, :idR, :idJ, :nbC, :recuC, :retourC, :donC)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone, "idR" => $this->idReservation, "idJ" => $this->idJeu, "nbC" => $this->nbComporter, "recuC" => $this->recuComporter, "retourC" => $this->retourComporter, "donC" => $this->donComporter);
  $req_prep->execute($values);
}

public function update(){
}

public function delete(){
  $sql = "DELETE FROM comporter WHERE idZone = :idZ AND idReservation = :idR";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idZ" => $this->idZone, "idR" => $this->idReservation);
  $req_prep->execute($values);
}
}
