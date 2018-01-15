<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Utilisateurs</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-user"></i> Liste des utilisateurs</div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="btn-container">
                <a href="index.php?controller=utilisateur&action=create">
                  <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Ajouter un compte</button>
                </a>
                <a href="index.php?controller=utilisateur&action=update">
                  <button type="button" class="text-white btn btn-warning"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier mon mot de passe</button>
                </a>
              </div>
            </div>
          </div>

          <div class="table-responsive">
          <table class="table table-bordered text-center" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Identifiant du compte</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($tab_u as $i =>$v){
                $idUtilisateur = $v-> getIdUtilisateur();
              ?>
                <tr>
                  <td><?php echo htmlspecialchars($idUtilisateur); ?></td>
                  <td>
                    <button title="Supprimer" type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalSupp<?php echo htmlspecialchars($idUtilisateur); ?>">
                      <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <div class="modal fade" id="modalSupp<?php echo htmlspecialchars($idUtilisateur); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Êtes vous sûrs de vouloir supprimer le compte <?php echo htmlspecialchars($idUtilisateur); ?> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <a href='index.php?controller=utilisateur&action=delete&idUtilisateur=<?php echo htmlspecialchars($idUtilisateur); ?>'>
                              <button type="button" class="btn btn-primary">Confirmer</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
              }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
