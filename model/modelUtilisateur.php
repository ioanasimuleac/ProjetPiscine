<?php
require_once(File::build_path(array("model", "model.php")));

class modelUtilisateur{
  /** ATTRIBUTS **/
  private $idUtilisateur;
  private $mdpUtilisateur;

  /** CONSTRUCTEUR **/
public function __construct($id = NULL, $mdp = NULL){
if(!is_null($id)){
    $this->idUtilisateur = $id;
    $this->mdpUtilisateur = $mdp;
  }
}

/** GETTERS **/
public function getIdUtilisateur(){
  return $this->idUtilisateur;
}

public function getMdpUtilisateur(){
  return $this->mdpUtilisateur;
}

/** SETTERS **/

/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readAll(){
  $sql = "SELECT * FROM utilisateur";
  $rep = model::$pdo->query($sql);
  $rep->setFetchMode(PDO::FETCH_CLASS, 'modelUtilisateur');
  return $rep->fetchAll();
}

public static function countUser(){
  $sql = "SELECT COUNT(*) FROM utilisateur";
  $rep = model::$pdo->query($sql);
  return $rep->fetch();
}

public function create(){
  $sql = "INSERT INTO utilisateur(idUtilisateur, mdpUtilisateur) VALUES (:idU, :mdpU)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idU" => $this->idUtilisateur, "mdpU" => $this->mdpUtilisateur);
  $req_prep->execute($values);
}

public static function checkPassword($login,$mot_de_passe_chiffre){
  $sql = "SELECT * FROM utilisateur WHERE idUtilisateur = :idU AND mdpUtilisateur = :mdpU";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idU" => $login, "mdpU" => $mot_de_passe_chiffre);
  $req_prep->execute($values);
  $rep = $req_prep->fetch();
  if(empty($rep)){
    return false;
  }
  else{
    return true;
  }
}

public function delete(){
  $sql = "DELETE FROM utilisateur WHERE idUtilisateur = :idUtilisateur";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idUtilisateur" => $this->idUtilisateur);
  $req_prep->execute($values);
}

public function update(){
  $sql = 'UPDATE Utilisateur SET mdpUtilisateur = :mdpU WHERE idUtilisateur = :idU';
  $req_prep = model::$pdo->prepare($sql);
  $values = array("idU" => $this->idUtilisateur, "mdpU" => $this->mdpUtilisateur,);
  $req_prep->execute($values);
}

}
