<?php
require_once(File::build_path(array("model", "model.php")));

class modelReservation{
  /** ATTRIBUTS **/
  private $idReservation;
  private $nbLogementsReservation;
  private $dateReservation;
  private $commentaireReservation;
  private $prixNegoReservation;
  private $statutReservation;
  private $etatFactureReservation;
  private $idEditeur;
  private $anneeFestival;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $logements = NULL, $date = NULL, $commentaire = NULL, $prix = NULL, $statut = NULL, $etat = NULL, $idE = NULL, $annee = NULL){
if(!is_null($date) && !is_null($statut) && !is_null($etat) && !is_null($idE) && !is_null($annee)){
    $this->idReservation = $id;
    $this->nbLogementsReservation = $logements;
    $this->dateReservation = $date;
    $this->commentaireReservation = $commentaire;
    $this->prixNegoReservation = $prix;
    $this->statutReservation = $statut;
    $this->etatFactureReservation = $etat;
    $this->idEditeur = $idE;
    $this->anneeFestival = $annee;
  }
}

/** GETTERS **/
public function getIdReservation(){
  return $this->idReservation;
}

public function getNbLogementsReservation(){
  return $this->nbLogementsReservation;
}

public function getDateReservation(){
  return $this->dateReservation;
}

public function getCommentaireReservation(){
  return $this->commentaireReservation;
}

public function getPrixNegoReservation(){
  return $this->prixNegoReservation;
}

public function getStatutReservation(){
  return $this->statutReservation;
}

public function getEtatFactureReservation(){
  return $this->etatFactureReservation;
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
public static function readEditeurFestival($anneeFestival){
  $sql = "SELECT * FROM reservation WHERE idEditeur = :idEd AND anneeFestival = :annee";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEd" => $_GET['id'], "annee" => $anneeFestival);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  return $rep;
}

public function create(){
  $sql = "INSERT INTO reservation(nbLogementsReservation, dateReservation, commentaireReservation, prixNegoReservation, statutReservation, etatFactureReservation, idEditeur, anneeFestival) VALUES (:nbLogementsR, :dateR, :commR, :prixNR, :statutR, :etatFR, :idE, :anneeF)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nbLogementsR" => $this->nbLogementsReservation, "dateR" => $this->dateReservation, "commR" => $this->commentaireReservation, "prixNR" => $this->prixNegoReservation, "statutR" => $this->statutReservation, "etatFR" => $this->etatFactureReservation, "idE" => $this->idEditeur, "anneeF" => $this->anneeFestival);
  $req_prep->execute($values);
}

public function update(){
  $sql = "UPDATE reservation SET nbLogementsReservation = :nbLogementsR, dateReservation = :dateR, commentaireReservation = :commR, prixNegoReservation = :prixNR, statutReservation = :statutR, etatFactureReservation = :etatFR WHERE idEditeur = :idE AND anneeFestival = :anneeF";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nbLogementsR" => $this->nbLogementsReservation, "dateR" => $this->dateReservation, "commR" => $this->commentaireReservation, "prixNR" => $this->prixNegoReservation, "statutR" => $this->statutReservation, "etatFR" => $this->etatFactureReservation, "idE" => $this->idEditeur, "anneeF" => $this->anneeFestival);
  $req_prep->execute($values);
}

public function delete(){
}
}
