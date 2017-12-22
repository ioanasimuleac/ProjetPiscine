<?php
require_once(File::build_path(array("model", "modelEditeur.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerEditeur{
  /* Récupérer la liste des éditeurs */
  public static function readAll(){
    $pageTitle = "Editeur";
    $tab_t = modelEditeur::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "editeur", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function add(){
      $pageTitle = "Ajouter un éditeur";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "create.php")));
      /* require	(File::build_path(array("view", "editeurs", "nomDeLaVue.php"))); */
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    $pageTitle = "Éditeur ajouté";
    if(isset($_POST['nomEditeur']) && isset($_POST['rueEditeur']) && isset($_POST['villeEditeur']) && isset($_POST['CPEditeur'])){
      $nomEditeur = htmlspecialchars($_POST['nomEditeur']);
      $rueEditeur = htmlspecialchars($_POST['rueEditeur']);
      $villeEditeur = htmlspecialchars($_POST['villeEditeur']);
      $CPEditeur = htmlspecialchars($_POST['CPEditeur']);
      $ajoutEditeur = new modelEditeur($idEditeur = NULL, $nomEditeur, $rueEditeur, $villeEditeur, $CPEditeur);
      $ajoutEditeur->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "created.php")));
      /* require	(File::build_path(array("view", "editeurs", "nomDeLaVue.php"))); */
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création de l'editeur");
    }
  }

  public static function update(){
    $pageTitle = "...";
    if(isset($_POST['type'])){
      $nomType = htmlspecialchars($_POST['type']);
      $modifieType = new modelTypes($nomType);
      $modifieType->update();
      require (File::build_path(array("view", "navbar.php")));
      /* require	(File::build_path(array("view", "types", "nomDeLaVue.php"))); */
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la modification du type");
    }
  }

  public static function delete(){
    $pageTitle = "Éditeurs";
    if(isset($_GET['idEditeur'])){
      $idEditeur = htmlspecialchars($_GET['idEditeur']);
      $supprimeEditeur = new modelEditeur($idEditeur, NULL, NULL, NULL, NULL);
      $supprimeEditeur->delete();
      $tab_t = modelEditeur::readAll();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "editeur", "list.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression de l'éditeur");
    }
  }

  /* Action reservée pour un administrateur */
  public static function something(){
    if(session::is_admin()){
      $pageTitle = "...";
    }
    else{
      controllerErreur::erreur("Action non autorisée pour un client");
    }
  }
}
