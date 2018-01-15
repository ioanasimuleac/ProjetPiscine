<?php
require_once(File::build_path(array("model", "model.php")));

class modelContact{
  /** ATTRIBUTS **/
  private $idContact;
  private $nomContact;
  private $prenomContact;
  private $numTelContact;
  private $mailContact;
  private $estPrincipalContact;
  private $idEditeur;
  /*private $something;*/

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $numTel = NULL, $mail = NULL, $estP = NULL, $idE = NULL){
if(!is_null($nom) && !is_null($prenom) && !is_null($numTel) && !is_null($mail) && !is_null($idE)){
    $this->idContact = $id;
    $this->nomContact = $nom;
    $this->prenomContact = $prenom;
    $this->numTelContact = $numTel;
    $this->mailContact = $mail;
    $this->estPrincipalContact = $estP;
    $this->idEditeur = $idE;
  }
elseif(!is_null($id) && !is_null($estP)){
    $this->idContact = $id;
    $this->estPrincipalContact= $estP;
  }
elseif(!is_null($id)){
    $this->idContact = $id;
  }
}

/** GETTERS **/
public function getIdContact(){
  return $this->idContact;
}

public function getNomContact(){
  return $this->nomContact;
}

public function getPrenomContact(){
  return $this->prenomContact;
}

public function getNumTelContact(){
  return $this->numTelContact;
}

public function getMailContact(){
  return $this->mailContact;
}

public function getEstPrincipalContact(){
  return $this->estPrincipalContact;
}

public function getidEditeur(){
  return $this->idEditeur;
}


/** SETTERS **/
public function setNomContact($nom){
  $this->nomContact = $nom;
}

public function setEstPrincipalContact($val){
  $this->estPrincipalContact = $val;
}

/** METHODES **/
public static function readAllEditeur(){
  $sql = "SELECT * FROM contact WHERE idEditeur = :idEd ORDER BY estPrincipalContact DESC";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idEd" => $_GET['id']);
  $req_prep->execute($values);
  $req_prep->setFetchMode(PDO::FETCH_CLASS, 'modelContact');
  return $req_prep->fetchAll();
}

public function create(){
  $sql = "INSERT INTO contact(nomContact, prenomContact, numTelContact, mailContact, estPrincipalContact, idEditeur) VALUES (:nomC, :prenomC, :numTelC, :mailC, :estP, :idE)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("nomC" => $this->nomContact, "prenomC" => $this->prenomContact, "numTelC" => $this->numTelContact, "mailC" => $this->mailContact, "estP" => $this->estPrincipalContact, "idE" => $this->idEditeur);
  $req_prep->execute($values);
}

public function updateEstPrincipal(){
  $sql = "UPDATE contact SET estPrincipalContact = :val WHERE idContact = :idC";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("val" => $this->estPrincipalContact, "idC" => $this->idContact);
  $req_prep->execute($values);
}

public function delete(){
  $sql = "DELETE FROM contact WHERE idContact = :idC";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idC" => $this->idContact);
  $req_prep->execute($values);
}
}
