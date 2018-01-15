<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=utilisateur&action=readAll">Utilisateurs</a>
      </li>
      <li class="breadcrumb-item active">Création</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Créer un utilisateur</div>
        <div class="card-body">

          <form id="creation-utilisateur" method="post" action="index.php?controller=utilisateur&action=created">
            <fieldset>
              <legend class="text-center">Création d'un utilisateur</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="id">Identifiant <span class="text-danger">*</span></label>
                  <input id="id" value="" type="text" name="idUtilisateur" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="mdp">Mot de passe <span class="text-danger">*</span></label>
                  <input id="mdp" value="" type="password" name="mdpUtilisateur" required/>
                  <label for="mdp_confirm">Confirmez le mot de passe <span class="text-danger">*</span></label>
                  <input id="mdp_confirm" value="" type="password" name="mdpUtilisateurBis" required/>
                </div>
              </div>
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Créer</button>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
