<?php
require_once(File::build_path(array("model", "modelReservation.php")));
require_once(File::build_path(array("model", "modelFestival.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerReservation{

  public static function add(){
      $pageTitle = "Nouvelle réservation";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "reservation", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['dateReservation']) && isset($_POST['etatFactureReservation'])){
      if(empty($_POST['nbLogementsReservation'])){
        $nbLogementsReservation = 0;
      }
      else{
        $nbLogementsReservation = htmlspecialchars($_POST['nbLogementsReservation']);
      }
      $dateReservation = htmlspecialchars($_POST['dateReservation']);
      if(empty($_POST['commentaireReservation'])){
        $commentaireReservation = null;
      }
      else{
        $commentaireReservation = htmlspecialchars($_POST['commentaireReservation']);
      }
      if(empty($_POST['prixNegoReservation'])){
        $prixNegoReservation = null;
      }
      else{
        $prixNegoReservation = htmlspecialchars($_POST['prixNegoReservation']);
      }
      $statutReservation = 1;
      $etatFactureReservation = htmlspecialchars($_POST['etatFactureReservation']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $anneeFestival = modelFestival::getAnneeCurrent();
      $ajoutReservation = new modelReservation($idReservation = NULL, $nbLogementsReservation, $dateReservation, $commentaireReservation, $prixNegoReservation, $statutReservation, $etatFactureReservation, $idEditeur, $anneeFestival);
      $ajoutReservation->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "reservation", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création de la réservation");
    }
  }

  public static function updated(){
    if(isset($_POST['dateReservation']) && isset($_POST['etatFactureReservation'])){
      if(empty($_POST['nbLogementsReservation'])){
        $nbLogementsReservation = 0;
      }
      else{
        $nbLogementsReservation = htmlspecialchars($_POST['nbLogementsReservation']);
      }
      $dateReservation = htmlspecialchars($_POST['dateReservation']);
      if(empty($_POST['commentaireReservation'])){
        $commentaireReservation = null;
      }
      else{
        $commentaireReservation = htmlspecialchars($_POST['commentaireReservation']);
      }
      if(empty($_POST['prixNegoReservation'])){
        $prixNegoReservation = null;
      }
      else{
        $prixNegoReservation = htmlspecialchars($_POST['prixNegoReservation']);
      }
      $statutReservation = 1;
      $etatFactureReservation = htmlspecialchars($_POST['etatFactureReservation']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $anneeFestival = modelFestival::getAnneeCurrent();
      $ajoutReservation = new modelReservation($idReservation = NULL, $nbLogementsReservation, $dateReservation, $commentaireReservation, $prixNegoReservation, $statutReservation, $etatFactureReservation, $idEditeur, $anneeFestival);
      $ajoutReservation->update();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "reservation", "updated.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création de la réservation");
    }
  }
}
