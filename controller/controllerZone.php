<?php
require_once(File::build_path(array("model", "modelZone.php")));
require_once(File::build_path(array("model", "modelCategorie.php")));
require_once(File::build_path(array("model", "modelJeu.php")));
require_once(File::build_path(array("model", "modelComporter.php")));
require_once(File::build_path(array("model", "modelEditeur.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerZone{

  public static function read(){
    $pageTitle = "Zone";
    $zone = modelZone::read();
    $tab_jeu = modelComporter::readAllZone();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "zone", "detail.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function add(){
      $pageTitle = "Ajouter une zone";
      $anneeFestival = $_GET['anneeFestival'];
      $tab_categorie = modelCategorie::readAll();
      $tab_editeur = modelEditeur::readAll();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "zone", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['nomZone']) && isset($_POST['anneeFestival']) && (isset($_POST['idEditeur']) || isset($_POST['idCategorie']))){
      $nomZone = htmlspecialchars($_POST['nomZone']);
      $anneeFestival = htmlspecialchars($_POST['anneeFestival']);
      if($_POST['choix'] == "edit"){
        $idEditeur = htmlspecialchars($_POST['idEditeur']);
        $ajoutZone = new modelZone($idZone = NULL, $nomZone, $anneeFestival, $idEditeur, $idCategorie = NULL);
      }
      else{
        $idCategorie = htmlspecialchars($_POST['idCategorie']);
        $ajoutZone = new modelZone($idZone = NULL, $nomZone, $anneeFestival, $idEditeur = NULL, $idCategorie);
      }
      $ajoutZone->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "zone", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création de la zone");
    }
  }

  public static function delete(){
    $pageTitle = "Suppression";
    if(isset($_GET['idZone'])){
      $idZone = htmlspecialchars($_GET['idZone']);
      $supprimeZone = new modelZone($idZone, NULL, NULL, NULL, NULL);
      $supprimeZone->delete();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "zone", "deleted.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression du jeu");
    }
  }

}
