<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Gestionnaire</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-life-ring"></i> Festival actuel</div>
        <div class="card-body">
          <img src="img/logo.jpg" alt="" class="center-block logo">
          <h2>Caractéristiques</h2>
          <div class="mt-3 text-center">
            <?php echo $festival['anneeFestival']; ?><br>
            Du <?php echo $festival['dateDebutFestival']; ?> au <?php echo $festival['dateFinFestival']; ?><br>
            <?php
            $res = modelLocaliser::sumNbPlaces();
            if($res['0'] > $festival['nbTablesFestival']){
               echo "<span class='text-danger'>".$res['0']."</span>/".$festival['nbTablesFestival'];
             }
             else{
              echo $res['0']."/".$festival['nbTablesFestival'];
             }?> tables<br>
            Prix standard : <?php echo $festival['prixPlaceFestival']; ?>
          </div>
          <h2 class="mt-4">Zones</h2>
          <?php
          if(sizeof($tab_zone) == 0){
            ?>
            <p class="text-center">Aucune zone n'est enregistrée pour ce festival. <a href="index.php?controller=zone&action=add&anneeFestival=<?php echo $festival['anneeFestival']; ?>">Ajouter !</a></p>
            <?php
          }
          else{
            ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="btn-container">
                  <a href="index.php?controller=zone&action=add&anneeFestival=<?php echo $festival['anneeFestival']; ?>">
                    <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Ajouter une zone</button>
                  </a>
                </div>
              </div>
            </div>
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Éditeur</th>
                  <th>Catégorie</th>
                  <th>Places occupées</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tab_zone as $i =>$v){
                  $idZone = $v-> getIdZone();
                  $nomZone = $v-> getNomZone();
                  $idEditeur = $v-> getIdEditeur();
                  $idCategorie = $v-> getIdCategorie();
                  $nbPlaces = $v-> getNbPlacesOccupees();
                  if($idCategorie == NULL){
                    $nomEditeur = $v-> getNomEditeur();
                  }
                  else{
                    $nomCategorie = $v-> getNomCategorie();
                  }
                  ?>
                  <tr>
                    <td><a href="index.php?controller=zone&action=read&idZone=<?php echo $idZone; ?>"><?php echo $nomZone; ?></a></td>
                    <td>
                      <?php if($idEditeur == NULL){
                        echo "<span class='italique text-secondary'>-</span>";
                      }
                      else{
                        echo $nomEditeur;
                      }
                      ?>
                    </td>
                    <td>
                      <?php if($idCategorie == NULL){
                        echo "<span class='italique text-secondary'>-</span>";
                      }
                      else{
                        echo $nomCategorie;
                      }
                      ?>
                    </td>
                    <td>
                      <?php if($nbPlaces == NULL){
                        echo "0";
                      }
                      else{
                        echo $nbPlaces;
                      }
                      ?>
                    </td>
                    <td class='text-center'>
                      <button title="Supprimer" type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalSupp<?php echo htmlspecialchars($idZone); ?>">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                      <div class="modal fade" id="modalSupp<?php echo htmlspecialchars($idZone); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Êtes vous sûrs de vouloir supprimer la zone <?php echo htmlspecialchars($nomZone); ?> et les réservations qui lui sont associées ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <a href='index.php?controller=zone&action=delete&idZone=<?php echo htmlspecialchars($idZone); ?>'>
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
            <?php
          }
          ?>
            <div class="row mt-5">
              <div class="col-sm-12">
                <div class="btn-container">
                  <a href="index.php?controller=festival&action=readAllOld">
                    <button type="button" class="btn btn-info"><i class="fa fa-fw fa-book"></i> Consulter les anciens festivals</button>
                  </a>
                  <a href="index.php?controller=festival&action=add">
                    <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Nouveau festival</button>
                  </a>
                  <a href="index.php?controller=festival&action=update">
                    <button type="button" class="text-white btn btn-warning"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier festival actuel</button>
                  </a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
