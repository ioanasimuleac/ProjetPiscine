<?php
require_once(File::build_path(array("model", "modelJeu.php")));
require_once(File::build_path(array("model", "modelCategorie.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerJeu{

  public static function readAll(){
  }

  public static function read(){
  }

  public static function add(){
      $pageTitle = "Ajouter un jeu";
      $idEditeur = $_GET['idEditeur'];
      $tab_categorie = modelCategorie::readAll();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "jeu", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['nomJeu']) && isset($_POST['idEditeur']) && isset($_POST['idCategorie'])){
      $nomJeu = htmlspecialchars($_POST['nomJeu']);
      if(empty($_POST['nbJoueursJeu'])){
        $nbJoueursJeu = null;
      }
      else{
        $nbJoueursJeu = htmlspecialchars($_POST['nbJoueursJeu']);
      }
      if(empty($_POST['dateSortieJeu'])){
        $dateSortieJeu = null;
      }
      else{
        $dateSortieJeu = htmlspecialchars($_POST['dateSortieJeu']);
      }
      if(empty($_POST['dureePartieJeu'])){
        $dureePartieJeu = null;
      }
      else{
        $dureePartieJeu = htmlspecialchars($_POST['dureePartieJeu']);
      }
      $idCategorie = htmlspecialchars($_POST['idCategorie']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $ajoutJeu = new modelJeu($idJeu = NULL, $nomJeu, $nbJoueursJeu, $dateSortieJeu, $dureePartieJeu, $idCategorie, $idEditeur);
      $ajoutJeu->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "jeu", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création du jeu");
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
