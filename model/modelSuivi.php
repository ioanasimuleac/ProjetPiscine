<?php
require_once(File::build_path(array("model", "model.php")));

class modelSuivi{
  /** ATTRIBUTS **/
  private $idSuivi;
  private $premierContactSuivi;
  private $derniereRelanceSuivi;
  private $reponseEditeurSuivi;
  private $idEditeur;
  private $anneeFestival;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $premier = NULL, $derniere = NULL, $reponse = NULL, $idE = NULL, $anneeF = NULL){
if(!is_null($reponse) && !is_null($idE) && !is_null($anneeF)){
    $this->idSuivi = $id;
    $this->premierContactSuivi = $premier;
    $this->derniereRelanceSuivi = $derniere;
    $this->reponseEditeurSuivi = $reponse;
    $this->idEditeur = $idE;
    $this->anneeFestival = $anneeF;
  }
}

/** GETTERS **/
public function getIdSuivi(){
  return $this->idSuivi;
}

public function getPremierContactSuivi(){
  return $this->premierContactSuivi;
}

public function getDerniereRelanceSuivi(){
  return $this->derniereRelanceSuivi;
}

public function getReponseEditeurSuivi(){
  return $this->reponseEditeurSuivi;
}

public function getIdEditeur(){
  return $this->idEditeur;
}

public function getAnneeFestival(){
  return $this->anneeFestival;
}

/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readFestival($anneeFestival){
  $sql = "SELECT * FROM suivi WHERE anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetchAll();
  return $rep;
}

public static function readEditeurFestival($anneeFestival){
  $sql = "SELECT * FROM suivi WHERE idEditeur = :idEd AND anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEd" => $_GET['id'], "annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep;
}

public static function nbJours($id, $anneeFestival){
    $sql = "SELECT DATEDIFF(dd, derniereRelanceSuivi, getdate()) FROM suivi WHERE idEditeur = :idEd AND anneeFestival = :annee";
    $req_prep = model::$pdo->prepare($sql);
    $values = array("idEd" => $id, "annee" => $anneeFestival);
    $req_prep->execute($values);
    $rep = $req_prep->fetch();
    return $rep;
}

public function create(){
  $sql = "INSERT INTO suivi(premierContactSuivi, derniereRelanceSuivi, reponseEditeurSuivi, idEditeur, anneeFestival) VALUES (:premier, :derniere, :reponse, :idE, :anneeF)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("premier" => $this->premierContactSuivi, "derniere" => $this->derniereRelanceSuivi, "reponse" => $this->reponseEditeurSuivi, "idE" => $this->idEditeur, "anneeF" => $this->anneeFestival);
  $req_prep->execute($values);
}

public function update(){
  $sql = "UPDATE suivi SET premierContactSuivi = :premier, derniereRelanceSuivi = :derniere, reponseEditeurSuivi = :reponse, idEditeur = :idE, anneeFestival = :anneeF WHERE idEditeur = :idE AND anneeFestival = :anneeF";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("premier" => $this->premierContactSuivi, "derniere" => $this->derniereRelanceSuivi, "reponse" => $this->reponseEditeurSuivi, "idE" => $this->idEditeur, "anneeF" => $this->anneeFestival);
  $req_prep->execute($values);
}
}
