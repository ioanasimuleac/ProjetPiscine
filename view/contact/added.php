<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
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
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Créer un contact</div>
        <div class="card-body">
          <div class="loadertext">
            Contact ajouté avec succès ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez <a href="index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>">ici.</a>
          </div>
          <img src="./img/loader.gif" alt="" class="loadergif">
          <script type="text/javascript">
          <!--
          var obj = 'window.location.replace("index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>");';
          setTimeout(obj,1000);
          // -->
          </script>
      </div>
    </div>
  </div>
