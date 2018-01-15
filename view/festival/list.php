<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Gestionnaire</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-life-ring"></i> Festivals archivés</div>
        <div class="card-body">
          <?php
            if(empty($tab_festival)){
          ?>
          <p>Vous n'avez aucun festival archivé. <a href="index.php?controller=festival&action=readCurrent">Retour</a></p>
          <?php
            }
            else{
          ?>
          <table class="table table-bordered text-center" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Année</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Nombre de tables</th>
                <th>Prix</th>
              </tr>
            </thead>
            <tbody>
          <?php
          foreach ($tab_festival as $i =>$v){
            $anneeFestival = $v-> getAnneeFestival();
            $dateDebutFestival = $v-> getDateDebutFestival();
            $dateFinFestival = $v-> getDateFinFestival();
            $nbTablesFestival = $v-> getNbTablesFestival();
            $prixPlaceFestival = $v-> getPrixPlaceFestival();
          ?>
          <tr>
            <td><?php echo $anneeFestival; ?></td>
            <td><?php echo $dateDebutFestival; ?></td>
            <td><?php echo $dateFinFestival; ?></td>
            <td><?php echo $nbTablesFestival; ?></td>
            <td><?php echo $prixPlaceFestival; ?> €</td>
          </tr>
          <?php
            }
            ?>
          </tbody>
        </table>
        <?php
        }
        ?>
        </div>
      </div>
    </div>
