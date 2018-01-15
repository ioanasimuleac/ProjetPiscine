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

public function getIdCurrentReservation($anneeFestival){
  $sql = "SELECT idReservation FROM reservation R JOIN editeur E ON E.idEditeur = R.idEditeur WHERE E.idEditeur = :idE AND R.anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idE" => $this->idEditeur, "annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['idReservation'];
}

public function getEtatFactureCurrentReservation($anneeFestival){
  $sql = "SELECT etatFactureReservation FROM reservation R JOIN editeur E ON E.idEditeur = R.idEditeur WHERE E.idEditeur = :idE AND R.anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idE" => $this->idEditeur, "annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['etatFactureReservation'];
}

public function getReponseEditeurSuivi($anneeFestival){
  $sql = "SELECT S.reponseEditeurSuivi FROM suivi S JOIN editeur E ON E.idEditeur = S.idEditeur WHERE E.idEditeur = :idE AND S.anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idE" => $this->idEditeur, "annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['reponseEditeurSuivi'];
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

public static function read(){
  $sql = "SELECT * FROM editeur WHERE idEditeur = :idEd";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEd" => $_GET['id']);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep;
}

public static function readParam($id){
  $sql = "SELECT * FROM editeur WHERE idEditeur = :idEd";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEd" => $id);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep;
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
