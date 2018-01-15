<?php
require_once(File::build_path(array("model", "modelLocaliser.php")));
require_once(File::build_path(array("model", "modelComporter.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerLocaliser{

  public static function added(){
    if(isset($_POST['idZone']) && isset($_POST['nbPlaces']) && isset($_POST['idReservation'])){
      $idReservation = htmlspecialchars($_POST['idReservation']);
      $idZone = htmlspecialchars($_POST['idZone']);
      $nbPlaces = htmlspecialchars($_POST['nbPlaces']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $ajoutPlaces = new modelLocaliser($idZone, $idReservation, $nbPlaces);
      $ajoutPlaces->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "localiser", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans l'assignation de vos tables");
    }
  }

  public static function delete(){
    $pageTitle = "Suppression";
    if(isset($_GET['idZone']) && isset($_GET['nbPlaces']) && isset($_GET['idReservation'])){
      $idZone = htmlspecialchars($_GET['idZone']);
      $nbPlaces = htmlspecialchars($_GET['nbPlaces']);
      $idReservation = htmlspecialchars($_GET['idReservation']);
      $idEditeur = htmlspecialchars($_GET['idEditeur']);
      $supprimeLocaliser = new modelLocaliser($idZone, $idReservation, $nbPlaces);
      $supprimeLocaliser->delete();
      $supprimeComporter = new modelComporter($idZone, $idReservation, NULL, NULL, NULL, NULL, NULL);
      $supprimeComporter->delete();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "localiser", "deleted.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression du jeu");
    }
  }

}
