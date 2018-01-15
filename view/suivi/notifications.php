<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Notifications</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Notifications</div>
        <div class="card-body">
          <h2 class="mt-4">Notifications</h2>
          <p class="ml-3">Éditeurs n'ayant pas répondu depuis plus de 2 semaines :</p>
          <?php
          foreach ($tabEditeur as $i =>$v){
            $idEditeur = $v['idEditeur'];
            $nomEditeur = $v['nomEditeur'];
            ?>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-exclamation-triangle"></i>
                </div>
                <div class="mr-5"><?php echo $nomEditeur; ?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>">
                <span class="float-left">Voir la page de l'éditeur</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
