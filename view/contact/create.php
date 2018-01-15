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
      <li class="breadcrumb-item active">Ajout de contact</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Créer un contact</div>
        <div class="card-body">

          <form id="creation-contact" method="post" action="index.php?controller=contact&action=added">
            <fieldset>
              <legend class="text-center">Création d'un contact</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="nom">Nom <span class="text-danger">*</span></label>
                  <input id="nom" value="" type="text" placeholder="Dupont" name="nomContact" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="prenom">Prénom <span class="text-danger">*</span></label>
                  <input id="prenom" value="" type="text" placeholder="Jean" name="prenomContact" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="numtel">Numéro de téléphone <span class="text-danger">*</span></label>
                  <input id="numtel" value="" type="text" placeholder="06 12 34 56 78" name="numTelContact" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="mail">Mail <span class="text-danger">*</span></label>
                  <input id="mail" value="" type="text" placeholder="jean.dupont@mail.com" name="mailContact" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="princ">Contact principal <span class="text-danger">*</span></label>
                  <select id="princ" name="estPrincipalContact" required>
                    <option value="0" selected>Non</option>
                    <option value="1">Oui</option>
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
