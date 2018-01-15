<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=readAll">Éditeurs</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=read&id=<?php echo $_POST['idEditeur']; ?>">Détail</a>
      </li>
      <li class="breadcrumb-item active">Assigner</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Assigner un jeu à la zone</div>
        <div class="card-body">
          <div class="loadertext">
            Jeu assigné avec succès ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez <a href="index.php?controller=editeur&action=read&id=<?php echo $_POST['idEditeur']; ?>">ici.</a>
          </div>
          <img src="./img/loader.gif" alt="" class="loadergif">
          <script type="text/javascript">
          <!--
          var obj = 'window.location.replace("index.php?controller=editeur&action=read&id=<?php echo $_POST['idEditeur']; ?>");';
          setTimeout(obj,600);
          // -->
          </script>
      </div>
    </div>
  </div>
