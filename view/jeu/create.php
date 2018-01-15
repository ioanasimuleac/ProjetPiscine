<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=readAll">Éditeurs</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>">Détail</a>
      </li>
      <li class="breadcrumb-item active">Ajout d'un jeu</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Ajouter un jeu</div>
        <div class="card-body">

          <form id="creation-jeu" method="post" action="index.php?controller=jeu&action=added">
            <fieldset>
              <legend class="text-center">Création d'un jeu</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nom">Nom <span class="text-danger">*</span></label>
                  <input id="nom" value="" type="text" placeholder="" name="nomJeu" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nbjoueur">Nombre de joueurs</label>
                  <input id="nbjoueur" value="" type="text" placeholder="" name="nbJoueursJeu"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="date">Date de sortie</label>
                  <input id="date" value="" type="date" placeholder="" name="dateSortieJeu"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="duree">Durée de partie</label>
                  <input id="duree" value="" type="text" placeholder="" name="dureePartieJeu"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="categorie">Catégorie <span class="text-danger">*</span></label>
                  <select id="categorie" name="idCategorie">
                  <?php
                    foreach ($tab_categorie as $i =>$v){
                      $idCategorie = $v-> getIdCategorie();
                      $nomCategorie = $v-> getNomCategorie();
                      echo "<option value='".$idCategorie."'>".$nomCategorie."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <input name="idEditeur" type="hidden" value="<?php echo $idEditeur; ?>">
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Créer</button>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
