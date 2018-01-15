<?php
require_once(File::build_path(array("model", "modelComporter.php")));
require_once(File::build_path(array("model", "modelJeu.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerComporter{

  public static function readAll(){
  }

  public static function read(){
  }

  public static function add(){
      $pageTitle = "Assigner un jeu à la réservation";
      $idEditeur = $_GET['idEditeur'];
      $tab_j = modelJeu::readAllEditeur();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "comporter", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['idJeu'])){
      $idJeu = htmlspecialchars($_POST['idJeu']);
      $idReservation = htmlspecialchars($_POST['idReservation']);
      $idZone = htmlspecialchars($_POST['idZone']);
      if(empty($_POST['nbComporter'])){
        $nbComporter = null;
      }
      else{
        $nbComporter = htmlspecialchars($_POST['nbComporter']);
      }
      if(empty($_POST['recuComporter'])){
        $recuComporter = null;
      }
      else{
        $recuComporter = htmlspecialchars($_POST['recuComporter']);
      }
      if(empty($_POST['retourComporter'])){
        $retourComporter = null;
      }
      else{
        $retourComporter = htmlspecialchars($_POST['retourComporter']);
      }
      if(empty($_POST['donComporter'])){
        $donComporter = null;
      }
      else{
        $donComporter = htmlspecialchars($_POST['donComporter']);
      }
      $ajoutComporter = new modelComporter($idZone, $idReservation, $idJeu, $nbComporter, $recuComporter, $retourComporter, $donComporter);
      $ajoutComporter->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "comporter", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans l'assignation du jeu'");
    }
  }

  public static function update(){
  }

  public static function delete(){
    $pageTitle = "Suppression";
    if(isset($_GET['idJeu'])){
      $idJeu = htmlspecialchars($_GET['idJeu']);
      $idEditeur = htmlspecialchars($_GET['idEditeur']);
      $supprimeJeu = new modelJeu($idJeu, NULL, NULL, NULL, NULL, NULL, NULL);
      $supprimeJeu->delete();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "jeu", "deleted.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression du jeu");
    }
  }

}
