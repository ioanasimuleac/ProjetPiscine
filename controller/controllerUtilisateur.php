<?php
require_once(File::build_path(array("model","modelUtilisateur.php")));
require_once(File::build_path(array("lib","security.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerUtilisateur{

  public static function readAll(){
    $pageTitle = "Utilisateurs";
    $tab_u = modelUtilisateur::readAll();
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "utilisateur", "list.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function create(){
    $pageTitle = "Créer un compte";
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "utilisateur", "create.php")));
    require (File::build_path(array("view", "footer.php")));

  }

  public static function created(){
    if(isset($_POST['idUtilisateur']) && isset($_POST['mdpUtilisateur']) && isset($_POST['mdpUtilisateurBis'])){
      if($_POST['mdpUtilisateur'] == $_POST['mdpUtilisateurBis']){
        $idUtilisateur = $_POST['idUtilisateur'];
        $mdpUtilisateur = security::chiffrer($_POST['mdpUtilisateur']);
        $utilisateur = new modelUtilisateur($idUtilisateur, $mdpUtilisateur);
        $utilisateur->create();
        require (File::build_path(array("view", "navbar.php")));
        require	(File::build_path(array("view", "utilisateur", "added.php")));
        require (File::build_path(array("view", "footer.php")));
      }
      else{
        controllerErreur::erreur("Les mots de passe ne coïncident pas.");
      }
    }
    else{
      controllerErreur::erreur("Erreur durant la création de l'utilisateur.");
    }
  }

  public static function connect(){
    $pageTitle = "Connexion";
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "utilisateur", "connect.php")));
    require (File::build_path(array("view", "footer.php")));

  }

  public static function connected(){
    $login = htmlspecialchars($_POST['idUtilisateur']);
    $mdp = htmlspecialchars($_POST['mdpUtilisateur']);
    $mdpchiffre = security::chiffrer($mdp);
    $rep = modelUtilisateur::checkPassword($login, $mdpchiffre);
    if ($rep == true) {
      $_SESSION['login'] = $login;
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "utilisateur", "connected.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Les identifiants et mots de passe ne correspondent pas.");
    }
  }

  public static function deconnect(){
      unset($_SESSION['login']);
      $pageTitle = "Connexion";
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "utilisateur", "connect.php")));
      require (File::build_path(array("view", "footer.php")));


  }

  public static function delete(){
    $pageTitle = "Utilisateurs";
    if(isset($_GET['idUtilisateur'])){
      $res = modelUtilisateur::countUser();
      if($res['0'] > 1){
        $idUtilisateur = htmlspecialchars($_GET['idUtilisateur']);
        $supprimeUtil = new modelUtilisateur($idUtilisateur, NULL, NULL, NULL, NULL);
        $supprimeUtil->delete();
        require (File::build_path(array("view", "navbar.php")));
        require	(File::build_path(array("view", "utilisateur", "deleted.php")));
        require (File::build_path(array("view", "footer.php")));
      }
      else{
        controllerErreur::erreur("Vous ne pouvez pas supprimer le dernier utilisateur");
      }
    }
    else{
      controllerErreur::erreur("Problème dans la suppression de l'utilisateur");
    }
  }

  public static function update(){
    $pageTitle = "Modifier votre mot de passe";
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "utilisateur", "update.php")));
    require (File::build_path(array("view", "footer.php")));
  }

  public static function updated(){
    if(isset($_POST['mdpUtilisateur']) && isset($_SESSION['login'])){
      if($_POST['mdpUtilisateur'] == $_POST['mdpUtilisateurBis']){
        $idUtilisateur = $_SESSION['login'];
        $mdpUtilisateur = security::chiffrer($_POST['mdpUtilisateur']);
        $utilisateur = new modelUtilisateur($idUtilisateur, $mdpUtilisateur);
        $utilisateur->update();
        require (File::build_path(array("view", "navbar.php")));
        require	(File::build_path(array("view", "utilisateur", "updated.php")));
        require (File::build_path(array("view", "footer.php")));
      }
      else{
        controllerErreur::erreur("Les mots de passe ne coïncident pas.");
      }
    }
    else{
      controllerErreur::erreur("Erreur durant la modification de votre mot de passe.");
    }
  }

}
