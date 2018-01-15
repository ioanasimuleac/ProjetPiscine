<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
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
          <div class="filter-container">
            <a data-toggle="collapse" href="#collapseFiltre" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="arrowFilter()">
              Filtres <i id="arrow-filtre" class="fa fa-caret-right" aria-hidden="true"></i>
            </a>
            <div class="collapse" id="collapseFiltre">
              <div class="card card-body">
                <div class="p-3">
                  <div class="row">
                    <div class="col-lg-3 col-sm-6">
                      <div class="pb-3 pt-3 font-weight-bold">Contacté</div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="c-oui" onclick="coui()" checked>
                        <label class="form-check-label" for="c-non">
                          Oui
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="c-non" onclick="cnon()" checked>
                        <label class="form-check-label" for="c-non">
                          Non
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="pb-3 pt-3 font-weight-bold">Prévu</div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pr-oui" onclick="proui()" checked>
                        <label class="form-check-label" for="pr-oui">
                          Oui
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pr-non" onclick="prnon()" checked>
                        <label class="form-check-label" for="pr-non">
                          Non
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="pb-3 pt-3 font-weight-bold">Réservé</div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="r-enregistree" onclick="renregistree()" checked>
                        <label class="form-check-label" for="r-enregistree">
                          Oui
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="r-inexistante" onclick="rinexistante()" checked>
                        <label class="form-check-label" for="r-inexistante">
                          Non
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                      <div class="pb-3 pt-3 font-weight-bold">Payé</div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="p-oui" onclick="poui()" checked>
                        <label class="form-check-label" for="p-oui">
                          Oui
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="p-non" onclick="pnon()" checked>
                        <label class="form-check-label" for="p-non">
                          Non
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTableEditeur" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Contacté</th>
                  <th>Prévu</th>
                  <th>Réservation</th>
                  <th>Payé</th>
                  <th width="150px" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tab_t as $i =>$v){
                  $idEditeur = $v-> getIdEditeur();
                  $nomEditeur = $v-> getNomEditeur();
                  $villeEditeur = $v-> getVilleEditeur();
                  $rueEditeur = $v-> getRueEditeur();
                  $cpEditeur = $v-> getCPEditeur();
                  $reponseEditeurSuivi = $v-> getReponseEditeurSuivi($anneeFestival);
                  $idReservation = $v-> getIdCurrentReservation($anneeFestival);
                  $etatFactureReservation = $v-> getEtatFactureCurrentReservation($anneeFestival);
                  ?>
                  <tr id="ligne<?php echo $idEditeur; ?>" class="">
                    <td><a href='index.php?controller=editeur&action=read&id=<?php echo htmlspecialchars($idEditeur); ?>'><?php echo htmlspecialchars($nomEditeur); ?></a></td>
                    <td>
                      <?php
                      if($reponseEditeurSuivi == NULL){
                        if($etatFactureReservation == NULL){
                          ?>
                          <script type="text/javascript">
                          document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falseContact";
                          </script>
                          <span class="text-danger" title="Cet éditeur n'a pas été contacté."><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">0</span></span>
                          <?php
                        }else{
                          ?>
                          <script type="text/javascript">
                          document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falseContact";
                          </script>
                          <span class="text-secondary-2" title="Cet éditeur n'a pas été contacté."><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">0</span></span>
                          <?php
                        }
                      }
                      else{
                        ?>
                        <script type="text/javascript">
                        document.getElementById("ligne<?php echo $idEditeur; ?>").className += " trueContact";
                        </script>
                        <span class="text-success" title="Cet éditeur a été contacté."><i class="fa fa-check" aria-hidden="true"></i><span class="d-none">1</span></span>
                        <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if($reponseEditeurSuivi == 1 || $etatFactureReservation != NULL){
                        ?>
                        <script type="text/javascript">
                        document.getElementById("ligne<?php echo $idEditeur; ?>").className += " truePrevu";
                        </script>
                        <span class="text-success" title="Cet éditeur est prévu pour le festival."><i class="fa fa-check" aria-hidden="true"></i><span class="d-none">1</span></span>
                        <?php
                      }
                      elseif($reponseEditeurSuivi == 0){
                          ?>
                          <script type="text/javascript">
                          document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falsePrevu";
                          </script>
                          <span class="text-secondary-2" title="Cet éditeur n'a pas répondu."><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">0</span></span>
                          <?php
                      }else{
                        ?>
                        <script type="text/javascript">
                        document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falsePrevu";
                        </script>
                        <span class="text-danger" title="Cet éditeur ne vient pas au festival."><i class="fa fa-check" aria-hidden="true"></i><span class="d-none">1</span></span>
                        <?php
                      }
                      ?></td>
                    <td><?php
                    if($idReservation == NULL){
                      ?>
                      <script type="text/javascript">
                      document.getElementById("ligne<?php echo $idEditeur; ?>").className += " trueReserv";
                      </script>
                      <span class="text-secondary-2" title="Cet éditeur n'a pas réservé."><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">0</span></span>
                      <?php
                    }
                    else{
                      ?>
                      <script type="text/javascript">
                      document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falseReserv";
                      </script>
                      <span class="text-success" title="Réservation enregistrée"><i class="fa fa-check" aria-hidden="true"></i><span class="d-none">1</span></span>
                      <?php
                    }
                    ?>
                  </td>
                  <td><?php
                  if($etatFactureReservation == NULL){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falsePaye";
                    </script>
                    <span class="text-secondary-2" title="Cet éditeur n'a pas réservé."><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">0</span></span>
                    <?php
                  }
                  elseif($etatFactureReservation == 2){
                    ?>
                    <script type="text/javascript">
                    document.getElementById("ligne<?php echo $idEditeur; ?>").className += " truePaye";
                    </script>
                    <span class="text-success" title="L'éditeur a payé"><i class="fa fa-check" aria-hidden="true"></i><span class="d-none">2</span></span>
                    <?php
                  }
                  else{
                    ?>
                    <script type="text/javascript">
                    document.getElementById("ligne<?php echo $idEditeur; ?>").className += " falsePaye";
                    </script>
                    <span class="text-danger" title="L'éditeur n'a pas payé"><i class="fa fa-times" aria-hidden="true"></i><span class="d-none">1</span></span>
                    <?php
                  }
                  ?>
                </td>
                <td class='text-center'>
                  <a href='index.php?controller=editeur&action=read&id=<?php echo htmlspecialchars($idEditeur); ?>'>
                    <button title="Modifier" class="btn btn-warning">
                      <i class="text-white fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button title="Supprimer" type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalSupp<?php echo htmlspecialchars($idEditeur); ?>">
                    <i class="fa fa-times" aria-hidden="true"></i>
                  </button>
                  <div class="modal fade" id="modalSupp<?php echo htmlspecialchars($idEditeur); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Êtes vous sûrs de vouloir supprimer l'éditeur <?php echo htmlspecialchars($nomEditeur); ?> et les contacts qui lui sont associés ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <a href='index.php?controller=editeur&action=delete&idEditeur=<?php echo htmlspecialchars($idEditeur); ?>'>
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
