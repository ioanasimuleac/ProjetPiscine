<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=readAll">Éditeurs</a>
      </li>
      <li class="breadcrumb-item active">Création</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Créer un éditeur</div>
        <div class="card-body">

          <form method="post" action="index.php?controller=editeur&action=added">
            <fieldset>
              <legend>Création d'un éditeur</legend>
              <div class="row">
                <div class="col-md-3">
                  <label>Nom</label> :
                  <input  value="" type="text" placeholder="Société" name="nomEditeur" required/>
                </div>
                <div class="col-md-3">
                  <label>Rue</label> :
                  <input value="" type="text" placeholder="Ex : 1200.99" name="rueEditeur" required/>
                </div>
                <div class="col-md-3">
                  <label>Ville</label> :
                  <input value="" type="text" placeholder="Ex : 250" name="villeEditeur" required/>
                </div>
                <div class="col-md-3">
                  <label for="marque_id">Code Postal</label> :
                  <input value="" type="text" placeholder="Ex : 250" name="CPEditeur" required/>
                </div>
              </div>
              <button type='button submit' class='btn btn-success btn-md'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Créer</button>
          </fieldset>
        </form>

      </div>
      <div class="card-footer small text-muted">Mis à jour le ...</div>
    </div>
  </div>
