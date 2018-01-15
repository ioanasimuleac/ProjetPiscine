<div class="content-wrapper">
  <div class="container-fluid">
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
      <li class="breadcrumb-item active">Assigner</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Assigner un jeu à la zone</div>
        <div class="card-body">

          <form id="creation-comporter" method="post" action="index.php?controller=comporter&action=added">
            <fieldset>
              <legend class="text-center">Assigner un jeu à la zone</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="idJeu">Jeu à ajouter <span class="text-danger">*</span></label>
                  <select id="idJeu" name="idJeu">
                  <?php
                    foreach ($tab_j as $i =>$v){
                      $idJeu = $v-> getIdJeu();
                      $nomJeu = $v-> getNomJeu();
                      echo "<option value='".$idJeu."'>".$nomJeu."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nbComporter">Nombre de jeux</label>
                  <input id="nbComporter" placeholder="Non renseigné" type='number' name="nbComporter"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="recuComporter">Nombre de jeux reçu</label>
                  <input id="recuComporter" placeholder="Non renseigné" type='number' name="recuComporter"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="retourComporter">Nombre de jeux renvoyés</label>
                  <input id="retourComporter" placeholder="Non renseigné" type='number' name="retourComporter"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="donComporter">Nombre de jeux offerts</label>
                  <input id="donComporter" placeholder="Non renseigné" type='number' name="donComporter"/>
                </div>
              </div>
              <input name="idEditeur" type="hidden" value="<?php echo $_GET['idEditeur']; ?>">
              <input name="idZone" type="hidden" value="<?php echo $_GET['idZone']; ?>">
              <input name="idReservation" type="hidden" value="<?php echo $_GET['idReservation']; ?>">
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Ajouter</button>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
