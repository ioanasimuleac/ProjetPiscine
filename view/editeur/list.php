<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Éditeurs</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Liste des éditeurs</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="btn-container">
                <a href="index.php?controller=editeur&action=add">
                  <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Ajouter un éditeur</button>
                </a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Adresse</th>
                  <th>A payé</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Adresse</th>
                  <th>A payé</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($tab_t as $i =>$v){
                  $idEditeur = $v-> getIdEditeur();
                  $nomEditeur = $v-> getNomEditeur();
                  $villeEditeur = $v-> getVilleEditeur();
                  $rueEditeur = $v-> getRueEditeur();
                  $cpEditeur = $v-> getCPEditeur();
                  echo "
                  <tr>
                  <td>".htmlspecialchars($nomEditeur)."</td>
                  <td>".htmlspecialchars($rueEditeur).", ".htmlspecialchars($villeEditeur)." ".htmlspecialchars($cpEditeur)."</td>
                  <td class=\"text-success\">Oui</td>
                  <td>
                  <button class=\"btn btn-warning\">
                  <i class=\"text-white fa fa-pencil-square-o\" aria-hidden=\"true\"></i>
                  </button>
                  <button type=\"button\" class=\"btn btn-danger\"  data-toggle=\"modal\" data-target=\"#modalSupp".htmlspecialchars($idEditeur)."\">
                  <i class=\"fa fa-times\" aria-hidden=\"true\"></i>
                  </button>
                  <div class=\"modal fade\" id=\"modalSupp".htmlspecialchars($idEditeur)."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                    <div class=\"modal-dialog\" role=\"document\">
                      <div class=\"modal-content\">
                        <div class=\"modal-header\">
                          <h5 class=\"modal-title\" id=\"exampleModalLabel\">Suppression</h5>
                          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                          </button>
                        </div>
                        <div class=\"modal-body\">
                          Êtes vous sûrs de vouloir supprimer l'éditeur ".htmlspecialchars($nomEditeur)." ?
                        </div>
                        <div class=\"modal-footer\">
                          <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Annuler</button>
                          <a href='index.php?controller=editeur&action=delete&idEditeur=".htmlspecialchars($idEditeur)."'>
                            <button type=\"button\" class=\"btn btn-primary\">Confirmer</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
                  </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Mis à jour le ...</div>
      </div>
    </div>
