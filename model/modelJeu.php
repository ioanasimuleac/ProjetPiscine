<?php
require_once(File::build_path(array("model", "model.php")));

class modelJeu{
  /** ATTRIBUTS **/
  private $idJeu;
  private $nomJeu;
  private $nbJoueursJeu;
  private $dateSortieJeu;
  private $dureePartieJeu;
  private $idCategorie;
  private $idEditeur;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $nom = NULL, $nb = NULL, $date = NULL, $duree = NULL, $idC = NULL, $idE = NULL){
if(!is_null($id)){
    $this->idJeu = $id;
    $this->nomJeu = $nom;
    $this->nbJoueursJeu = $nb;
    $this->dateSortieJeu = $date;
    $this->dureePartieJeu = $duree;
    $this->idCategorie = $idC;
    $this->idEditeur = $idE;
  }
elseif(!is_null($nom)){
    $this->idJeu = $id;
    $this->nomJeu = $nom;
    $this->nbJoueursJeu = $nb;
    $this->dateSortieJeu = $date;
    $this->dureePartieJeu = $duree;
    $this->idCategorie = $idC;
    $this->idEditeur = $idE;
}
}

/** GETTERS **/
public function getIdJeu(){
  return $this->idJeu;
}

public function getNomJeu(){
  return $this->nomJeu;
}

public function getnbJoueursJeu(){
  return $this->nbJoueursJeu;
}

public function getDateSortieJeu(){
  return $this->dateSortieJeu;
}

public function getDureePartieJeu(){
  return $this->dureePartieJeu;
}

public function getIdCategorie(){
  return $this->idCategorie;
}

public function getIdEditeur(){
  return $this->idEditeur;
}

public function getNomCategorie(){
  $sql = "SELECT nomCategorie FROM categorie WHERE idCategorie = :idC";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idC" => $this->idCategorie);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep['nomCategorie'];
}


/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/


public static function readAllEditeur(){
  $sql = "SELECT * FROM jeu WHERE idEditeur = :idEd";
  $req_prep = model::$pdo->prepare($sql);
  if(isset($_GET['id'])){
    $values = array("idEd" => $_GET['id']);
  }else{
    $values = array("idEd" => $_GET['idEditeur']);
  }
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelJeu');
  return $req_prep->fetchAll();
}

public static function read(){
}

public function create(){
  $sql = "INSERT INTO jeu(nomJeu, nbJoueursJeu, dateSortieJeu, dureePartieJeu, idCategorie, idEditeur) VALUES (:nomJ, :nbJoueursJ, :dateSortieJ, :dureePartieJ, :idC, :idE)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nomJ" => $this->nomJeu, "nbJoueursJ" => $this->nbJoueursJeu, "dateSortieJ" => $this->dateSortieJeu, "dureePartieJ" => $this->dureePartieJeu, "idC" => $this->idCategorie, "idE" => $this->idEditeur);
  $req_prep->execute($values);
}

public function update(){
}

public function delete(){
  $sql = "DELETE FROM jeu WHERE idJeu = :idJ";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idJ" => $this->idJeu);
  $req_prep->execute($values);
}
}
