<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=utilisateur&action=readAll">Utilisateurs</a>
      </li>
      <li class="breadcrumb-item active">Modification</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Modifier votre mot de passe</div>
        <div class="card-body">

          <form id="modification-utilisateur" method="post" action="index.php?controller=utilisateur&action=updated">
            <fieldset>
              <legend class="text-center">Modication de votre mot de passe</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="mdp">Nouveau mot de passe <span class="text-danger">*</span></label>
                  <input id="mdp" value="" type="password" name="mdpUtilisateur" required/>
                  <label for="mdp_confirm">Confirmez le mot de passe <span class="text-danger">*</span></label>
                  <input id="mdp_confirm" value="" type="password" name="mdpUtilisateurBis" required/>
                </div>
              </div>
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Modifier</button>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
