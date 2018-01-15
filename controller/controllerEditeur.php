<?php
require_once(File::build_path(array("model", "modelEditeur.php")));
require_once(File::build_path(array("model", "modelJeu.php")));
require_once(File::build_path(array("model", "modelCategorie.php")));
require_once(File::build_path(array("model", "modelContact.php")));
require_once(File::build_path(array("model", "modelFestival.php")));
require_once(File::build_path(array("model", "modelSuivi.php")));
require_once(File::build_path(array("model", "modelReservation.php")));
require_once(File::build_path(array("model", "modelZone.php")));
require_once(File::build_path(array("model", "modelComporter.php")));
require_once(File::build_path(array("model", "modelLocaliser.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerEditeur{
  /* Récupérer la liste des éditeurs */
  public static function readAll(){
    $pageTitle = "Editeur";
    $tab_t = modelEditeur::readAll();
    $anneeFestival = modelFestival::getAnneeCurrent();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "editeur", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function read(){
    $pageTitle = "Editeur";
    if(isset($_GET['id'])){
      $tab_editeur = modelEditeur::read();
      $tab_jeu = modelJeu::readAllEditeur();
      $tab_contact = modelContact::readAllEditeur();
      $anneeFestival = modelFestival::getAnneeCurrent();
      $suivi = modelSuivi::readEditeurFestival($anneeFestival);
      $reservation = modelReservation::readEditeurFestival($anneeFestival);
      $tab_co = modelComporter::readAll($reservation['idReservation']);
      if(!empty($reservation)){
        $tab_tables = modelLocaliser::readAllReservation($reservation['idReservation']);
        $tab_zonesDispo = modelZone::readAllZonesLibres($reservation['idReservation']);
      }
      if($tab_editeur != false){
        require (File::build_path(array("view", "navbar.php")));
        require	(File::build_path(array("view", "editeur", "detail.php")));
        require (File::build_path(array("view", "footer.php")));
      }
      else{
        controllerErreur::erreur("Cet éditeur n'existe pas.");
      }
    }
  }

  public static function add(){
      $pageTitle = "Ajouter un éditeur";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['nomEditeur']) && isset($_POST['rueEditeur']) && isset($_POST['villeEditeur']) && isset($_POST['CPEditeur'])){
      $nomEditeur = htmlspecialchars($_POST['nomEditeur']);
      $rueEditeur = htmlspecialchars($_POST['rueEditeur']);
      $villeEditeur = htmlspecialchars($_POST['villeEditeur']);
      $CPEditeur = htmlspecialchars($_POST['CPEditeur']);
      $ajoutEditeur = new modelEditeur($idEditeur = NULL, $nomEditeur, $rueEditeur, $villeEditeur, $CPEditeur);
      $ajoutEditeur->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création de l'éditeur");
    }
  }

  public static function update(){
  }

  public static function delete(){
    $pageTitle = "Éditeurs";
    if(isset($_GET['idEditeur'])){
      $idEditeur = htmlspecialchars($_GET['idEditeur']);
      $supprimeEditeur = new modelEditeur($idEditeur, NULL, NULL, NULL, NULL);
      $supprimeEditeur->delete();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "deleted.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression de l'éditeur");
    }
  }

}
