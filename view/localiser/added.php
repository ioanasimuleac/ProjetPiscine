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
        <i class="fa fa-table"></i> Places assignées</div>
        <div class="card-body">
          <div class="loadertext">
            Places assignées avec succès ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez <a href="index.php?controller=editeur&action=read&id=<?php echo $idEditeur; ?>">ici.</a>
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
