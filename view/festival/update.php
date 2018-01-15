<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Modifier un festival</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Modifier un festival</div>
        <div class="card-body">

          <form id="creation-festival" method="post" action="index.php?controller=festival&action=updated">
            <fieldset>
              <legend class="text-center">Modification du festival actuel</legend>
              <?php echo'
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="annee">Année <span class="text-danger">*</span></label>
                  <input id="annee" value="' . $anneeFestival . '" type="number" name="anneeFestival" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="datedebut">Date de début <span class="text-danger">*</span></label>
                  <input id="datedebut" value="' . $dateDebutFestival . '" type="date" name="dateDebutFestival" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="datefin">Date de fin <span class="text-danger">*</span></label>
                  <input id="datefin" value="' . $dateFinFestival . '" type="date" name="dateFinFestival" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nbtable">Nombre de tables <span class="text-danger">*</span></label>
                  <input id="nbtable" value="' . $nbTablesFestival . '" type="number" name="nbTablesFestival" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="prix">Prix standard <span class="text-danger">*</span></label>
                  <input id="prix" value="' . $prixPlaceFestival . '" type="number" name="prixPlaceFestival" required/>
                </div>
              </div>' ?>
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Modifier</button>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
