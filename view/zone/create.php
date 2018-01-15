<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Créer une zone</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Créer une zone</div>
        <div class="card-body">
          <form id="creation-zone" method="post" action="index.php?controller=zone&action=added">
            <fieldset>
              <legend class="text-center">Ajout d'une zone</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nom" class="label-marged">Nom <span class="text-danger">*</span></label>
                  <input id="nom" value="" type="text" placeholder="Nom" name="nomZone"  class="input-centered" required/>
                </div>
              </div>
              <div class="row justify-content-center mt-3">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <input onclick="choixediteur()" type="radio" id="choix1" name="choix" value="edit" checked>
                    <label onclick="choixediteur()" for="choix1"> Réservée à un éditeur</label>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <input onclick="choixcategorie()" type="radio" id="choix2" name="choix" value="categ">
                  <label onclick="choixcategorie()" for="choix2"> Réservée à une catégorie de jeu</label>
                </div>
              </div>

              <div id="selectEdit" class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="editeur" class="label-marged">Éditeur <span class="text-danger">*</span></label>
                  <select id="editeur" name="idEditeur">
                  <?php
                    foreach ($tab_editeur as $i =>$v){
                      $idEditeur = $v-> getIdEditeur();
                      $nomEditeur = $v-> getNomEditeur();
                      echo "<option value='".$idEditeur."'>".$nomEditeur."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div id="selectCateg" style="display: none;" class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="categorie" class="label-marged">Catégorie <span class="text-danger">*</span></label>
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

              <input name="anneeFestival" type="hidden" value="<?php echo $_GET['anneeFestival']; ?>">
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Créer</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function choixediteur(){
      document.getElementById('selectEdit').style = "display : flex;";
      document.getElementById('selectCateg').style = "display : none;";
    }

    function choixcategorie(){
      document.getElementById('selectEdit').style = "display : none;";
      document.getElementById('selectCateg').style = "display : flex;";
    }
  </script>
