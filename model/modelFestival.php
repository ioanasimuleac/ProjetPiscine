<?php
require_once(File::build_path(array("model", "model.php")));

class modelFestival{
  /** ATTRIBUTS **/
  private $anneeFestival;
  private $dateDebutFestival;
  private $dateFinFestival;
  private $nbTablesFestival;
  private $prixPlaceFestival;
  private $estActifFestival;
  /*private $something;*/

  /** CONSTRUCTEUR **/
public function __construct($annee = NULL, $datedebut = NULL, $datefin = NULL, $nbtables = NULL, $prixplace = NULL/*, $something = NULL*/){
if(!is_null($datedebut) && !is_null($datefin) && !is_null($nbtables) && !is_null($prixplace)/* && !is_null($something)*/){
    $this->anneeFestival = $annee;
    $this->dateDebutFestival = $datedebut;
    $this->dateFinFestival = $datefin;
    $this->nbTablesFestival = $nbtables;
    $this->prixPlaceFestival = $prixplace;
    $this->estActifFestival = 1;
    /*$this->something = $something;*/
  }
elseif(!is_null($annee)){
    $this->anneeFestival = $annee;
    /*$this->something = $something;*/
  }
}

/** GETTERS **/
public function getAnneeFestival(){
  return $this->anneeFestival;
}

public function getDateDebutFestival(){
  return $this->dateDebutFestival;
}

public function getDateFinFestival(){
  return $this->dateFinFestival;
}

public function getNbTablesFestival(){
  return $this->nbTablesFestival;
}

public function getPrixPlaceFestival(){
  return $this->prixPlaceFestival;
}

public function getEstActifFestival(){
  return $this->estActifFestival;
}

/*public function getSomething(){
return $this->something;
}*/

/** SETTERS **/


/*public function setSomething($something){
$this->something = $something;
}*/

/** METHODES **/
public static function readAllOld(){
  $sql = "SELECT * FROM festival WHERE estActifFestival = 0";
  $rep = model::$pdo->query($sql);
  $rep->setFetchMode(PDO::FETCH_CLASS, 'modelFestival');
  return $rep->fetchAll();
}

public static function getAnneeCurrent(){
  $sql = "SELECT anneeFestival FROM festival WHERE estActifFestival = 1";
  $req = model::$pdo->query($sql);
  $rep = $req->fetch();
  return $rep['anneeFestival'];
}

public static function readCurrent(){
  $sql = "SELECT * FROM festival WHERE estActifFestival = 1";
  $req = model::$pdo->query($sql);
  $rep = $req->fetch();
  return $rep;
}

public function create(){
  modelFestival::updateOldActif();
  $sql = "INSERT INTO festival(anneeFestival, dateDebutFestival, dateFinFestival, nbTablesFestival, prixPlaceFestival, estActifFestival) VALUES (:anneeF, :datedebutF, :datefinF, :nbtablesF, :prixplaceF, 1)";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("anneeF" => $this->anneeFestival, "datedebutF" => $this->dateDebutFestival, "datefinF" => $this->dateFinFestival, "nbtablesF" => $this->nbTablesFestival, "prixplaceF" => $this->prixPlaceFestival);
  $req_prep->execute($values);
}

public static function updateCurrent($data){
  $sql = "UPDATE festival SET anneeFestival =:aF, dateDebutFestival = :dDF, dateFinFestival = :dFF, nbTablesFestival = :nTF, prixPlaceFestival = :pPF, estActifFestival = 1 WHERE estActifFestival = 1";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("aF" =>$data['anneeFestival'], "dDF" => $data['dateDebutFestival'], "dFF" => $data['dateFinFestival'], "nTF" => $data['nbTablesFestival'], "pPF" => $data['prixPlaceFestival']);
  $req_prep->execute($values);
}

public function delete(){
  $sql = "DELETE FROM festival WHERE anneeFestival = :anneeF";
  $req_prep = model::$pdo->prepare($sql);
  $values = array("anneeF" => $this->anneeFestival);
  $req_prep->execute($values);
}

public static function updateOldActif(){
  $sql = "UPDATE festival SET estActifFestival = 0 WHERE estActifFestival = 1";
  $rep = model::$pdo->query($sql);
}

}
