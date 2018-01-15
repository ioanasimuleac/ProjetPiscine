<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item active">Nouvelle réservation</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Nouvelle réservation</div>
        <div class="card-body">
          <div class="loadertext">
            Réservation ajoutée avec succès ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez ici.
          </div>
          <img src="./img/loader.gif" alt="" class="loadergif">
          <script type="text/javascript">
          <!--
          var obj = 'window.location.replace("index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>");';
          setTimeout(obj,600);
          // -->
          </script>
      </div>
    </div>
  </div>
