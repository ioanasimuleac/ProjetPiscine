<div class="content-wrapper" style="margin-left: 0px;">
  <div class="container-fluid">
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Connexion</div>
        <div class="card-body">

          <form id="connexion" method="post" action="index.php?controller=utilisateur&action=connected">
            <fieldset>
              <legend class="text-center">Connexion</legend>
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
                </div>
              </div>
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Connexion</button>
            </fieldset>
          </form>

        </div>
      </div>
    </div>
