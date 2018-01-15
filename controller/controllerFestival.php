<?php
require_once(File::build_path(array("model", "modelFestival.php")));
require_once(File::build_path(array("model", "modelZone.php")));
require_once(File::build_path(array("model", "modelLocaliser.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerFestival{
  /* Récupérer la liste des festivals terminés */
  public static function readAllOld(){
    $pageTitle = "Festival";
    $tab_festival = modelFestival::readAllOld();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "festival", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function readCurrent(){
    $pageTitle = "Festival";
    $festival = modelFestival::readCurrent();
    $tab_zone = modelZone::readAllFestival($festival['anneeFestival']);
    if($festival != false){
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "festival", "detail.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "festival", "firstcreate.php")));
      require (File::build_path(array("view", "footer.php")));
    }
  }

  public static function add(){
      $pageTitle = "Ajouter un festival";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "festival", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    $pageTitle = "Festival ajouté";
    if(isset($_POST['anneeFestival']) && isset($_POST['dateDebutFestival']) && isset($_POST['dateFinFestival']) && isset($_POST['nbTablesFestival'])&& isset($_POST['prixPlaceFestival'])){
      $anneeFestival = htmlspecialchars($_POST['anneeFestival']);
      $dateDebutFestival = htmlspecialchars($_POST['dateDebutFestival']);
      $dateFinFestival = htmlspecialchars($_POST['dateFinFestival']);
      $nbTablesFestival = htmlspecialchars($_POST['nbTablesFestival']);
      $prixPlaceFestival = htmlspecialchars($_POST['prixPlaceFestival']);
      $ajoutFestival = new modelFestival($anneeFestival, $dateDebutFestival, $dateFinFestival, $nbTablesFestival, $prixPlaceFestival);
      $ajoutFestival->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "festival", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème lors de la création du nouveau festival");
    }
  }

  public static function update() {
    $pageTitle = "Modifier le festival";
    $festival = modelFestival::readCurrent();
    $anneeFestival = ($festival['anneeFestival']);
    $dateDebutFestival = ($festival['dateDebutFestival']);
    $dateFinFestival = ($festival['dateFinFestival']);
    $nbTablesFestival = ($festival['nbTablesFestival']);
    $prixPlaceFestival = ($festival['prixPlaceFestival']);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "festival", "update.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function updated(){
    $pageTitle = "Festival modifié";
    $festival = modelFestival::updateCurrent($_POST);
    require (File::build_path(array("view", "navbar.php")));
    require (File::build_path(array("view", "festival", "updated.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function delete(){
  }
}
