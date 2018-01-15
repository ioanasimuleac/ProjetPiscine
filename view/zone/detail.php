<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Détail Zone</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Détail Zone</div>
        <div class="card-body">
          <h1><?php echo $zone['nomZone']; ?></h1>
          <h2>Jeux enregistrés</h1>
            <?php
            if($tab_jeu == NULL){
              echo "<div class='text-secondary text-center'>Pas de jeu enregistré dans cette zone.</div>";
            }
            else{
              ?>
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Jeu</th>
                  <th>Editeur</th>
                  <th>Nombre</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tab_jeu as $i =>$v){
                  $idJeu = $v-> getIdJeu();
                  $nomJeu = $v-> getNomJeu();
                  $idEditeur = $v-> getIdEditeur();
                  $nomEditeur = $v-> getNomEditeur();
                  $nbJeu = $v-> getNbComporter();
                  ?>
                  <tr>
                    <td><?php echo $nomJeu; ?></td>
                    <td><?php echo $nomEditeur; ?></td>
                    <td><?php if($nbJeu ==NULL){
                      echo "<span class='text-secondary'>Non renseigné</span>";
                    }else{
                      echo $nbJeu;
                    } ?></td>
                    <td>
                      <a href='index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>'>
                        <button type="button" class="btn btn-warning text-white"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                      </a>
                    </td>

                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          <?php
        } ?>
      </div>
    </div>
  </div>
