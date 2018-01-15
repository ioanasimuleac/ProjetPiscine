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
      <li class="breadcrumb-item active">Création</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Créer un éditeur</div>
        <div class="card-body">

          <form id="creation-editeur" method="post" action="index.php?controller=editeur&action=added">
            <fieldset>
              <legend class="text-center">Création d'un éditeur</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nom">Nom <span class="text-danger">*</span></label>
                  <input id="nom" value="" type="text" placeholder="Société" name="nomEditeur" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="rue">Rue <span class="text-danger">*</span></label>
                  <input id="rue" value="" type="text" placeholder="rue" name="rueEditeur" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="ville">Ville <span class="text-danger">*</span></label>
                  <input id="ville" value="" type="text" placeholder="Paris" name="villeEditeur" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="cp">Code Postal <span class="text-danger">*</span></label>
                  <input id="cp" value="" type="number" placeholder="12345" name="CPEditeur" max="99999" required/>
                </div>
              </div>
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Créer</button>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
