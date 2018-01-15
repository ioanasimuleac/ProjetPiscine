<?php
require_once(File::build_path(array("model", "modelEditeur.php")));
require_once(File::build_path(array("model", "modelContact.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerContact{

  public static function add(){
      $pageTitle = "Ajouter un contact";
      $idEditeur = $_GET['idEditeur'];
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "contact", "create.php")));
      require (File::build_path(array("view", "footer.php")));
  }

  public static function added(){
    if(isset($_POST['nomContact']) && isset($_POST['prenomContact']) && isset($_POST['numTelContact']) && isset($_POST['mailContact']) && isset($_POST['idEditeur'])){
      $nomContact = htmlspecialchars($_POST['nomContact']);
      $prenomContact = htmlspecialchars($_POST['prenomContact']);
      $numTelContact = htmlspecialchars($_POST['numTelContact']);
      $mailContact = htmlspecialchars($_POST['mailContact']);
      $estPrincipalContact = htmlspecialchars($_POST['estPrincipalContact']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      $ajoutContact = new modelContact($idContact = NULL, $nomContact, $prenomContact, $numTelContact, $mailContact, $estPrincipalContact, $idEditeur);
      $ajoutContact->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "contact", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création du contact");
    }
  }

  public static function updateEstPrincipal(){
    $pageTitle = "Contact modifié";
    if(isset($_POST['val']) && isset($_POST['idContact']) && isset($_POST['idEditeur'])){
      $val = htmlspecialchars($_POST['val']);
      $idContact = htmlspecialchars($_POST['idContact']);
      $idEditeur = htmlspecialchars($_POST['idEditeur']);
      if($val == 0){
        $val = 1;
      }
      else{
        $val = 0;
      }
      $modifieContact = new modelContact($idContact, NULL, NULL, NULL, NULL, $val, NULL);
      $modifieContact->updateEstPrincipal();
      require (File::build_path(array("view", "navbar.php")));
      require (File::build_path(array("view", "contact", "updated.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème durant la mise à jour du contact.");
    }
  }

  public static function delete(){
    $pageTitle = "Suppression";
    if(isset($_GET['idContact'])){
      $idContact = htmlspecialchars($_GET['idContact']);
      $idEditeur = htmlspecialchars($_GET['idEditeur']);
      $supprimeContact = new modelContact ($idContact , NULL, NULL, NULL, NULL, NULL, NULL);
      $supprimeContact ->delete();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "contact", "deleted.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la suppression du contact");
    }
  }
}
