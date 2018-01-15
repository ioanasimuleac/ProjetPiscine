<?php
require_once(File::build_path(array("model", "modelSuivi.php")));
require_once(File::build_path(array("model", "modelEditeur.php")));
require_once(File::build_path(array("model", "modelFestival.php")));
require_once(File::build_path(array("lib", "session.php")));

class controllerSuivi{

  public static function added(){
    $pageTitle = "Ajouté";
    if(isset($_POST['premierContactSuivi']) && isset($_POST['derniereRelanceSuivi']) && isset($_POST['reponseEditeurSuivi'])){
      $premierContactSuivi = $_POST['premierContactSuivi'];
      $derniereRelanceSuivi = $_POST['derniereRelanceSuivi'];
      $reponseEditeurSuivi = $_POST['reponseEditeurSuivi'];
      $idEditeur = $_POST['idEditeur'];
      $anneeFestival = $_POST['anneeFestival'];
      $ajoutSuivi = new modelSuivi($idSuivi = NULL, $premierContactSuivi, $derniereRelanceSuivi, $reponseEditeurSuivi, $idEditeur, $anneeFestival);
      $ajoutSuivi->create();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "suivi", "added.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la création du suivi");
    }
  }

  public static function updated(){
    $pageTitle = "Modifié";
    if(isset($_POST['premierContactSuivi']) && isset($_POST['derniereRelanceSuivi']) && isset($_POST['reponseEditeurSuivi'])){
      $premierContactSuivi = $_POST['premierContactSuivi'];
      $derniereRelanceSuivi = $_POST['derniereRelanceSuivi'];
      $reponseEditeurSuivi = $_POST['reponseEditeurSuivi'];
      $idEditeur = $_POST['idEditeur'];
      $anneeFestival = $_POST['anneeFestival'];
      $ajoutSuivi = new modelSuivi($idSuivi = NULL, $premierContactSuivi, $derniereRelanceSuivi, $reponseEditeurSuivi, $idEditeur, $anneeFestival);
      $ajoutSuivi->update();
      require (File::build_path(array("view", "navbar.php")));
      require	(File::build_path(array("view", "suivi", "updated.php")));
      require (File::build_path(array("view", "footer.php")));
    }
    else{
      controllerErreur::erreur("Problème dans la modification du suivi");
    }
  }

  public static function readNotifications(){
    $pageTitle = "Notifications";
    $anneeFestival = modelFestival::getAnneeCurrent();
    $tab_s = modelSuivi::readFestival($anneeFestival);
    $date = strtotime(date("Y-m-d"));
		$tabEditeur = array();
    foreach ($tab_s as $k ) {
            $dataRelanceSuivi = strtotime($k['derniereRelanceSuivi']) + 1209600;
            if ($dataRelanceSuivi < $date){
                $index =  $k['idEditeur'];
                $mEdi = array();
                $mEdi = modelEditeur::readParam($index);
                array_push($tabEditeur, $mEdi);
            }
		}
    require (File::build_path(array("view", "navbar.php")));
    require	(File::build_path(array("view", "suivi", "notifications.php")));
    require (File::build_path(array("view", "footer.php")));
  }
}
