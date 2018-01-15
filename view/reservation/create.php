<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Nouvelle réservation</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Nouvelle réservation</div>
        <div class="card-body">

          <form id="creation-reservation" method="post" action="index.php?controller=reservation&action=added">
            <fieldset>
              <legend class="text-center">Enregistrer la réservation</legend>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="date">Date de la réservation <span class="text-danger">*</span></label>
                  <input id="date" value="" type="date" placeholder="" name="dateReservation" required/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="prixNego">Prix négocié</label>
                  <input id="prixNego" value="" type="number" placeholder="" name="prixNegoReservation"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="logements">Nombre de personnes à loger <span class="text-danger">*</span></label>
                  <input id="logements" value="0" type="number" name="nbLogementsReservation"/>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="etat">État de la facture <span class="text-danger">*</span></label>
                  <select id="etat" name="etatFactureReservation" required>
                    <option value="0" selected>Pas éditée</option>
                    <option value="1">Éditée</option>
                    <option value="2">Payée</option>
                  </select>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4">
                  <label for="comm">Commentaire</label>
                  <textarea id="comm" name="commentaireReservation" rows=4 cols=40></textarea>
                </div>
              </div>
              <input name="idEditeur" type="hidden" value="<?php echo $_GET['idEditeur']; ?>">
              <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Enregistrer</button>
          </fieldset>
        </form>

      </div>
    </div>
  </div>
