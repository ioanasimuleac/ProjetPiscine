<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=utilisateur&action=readAll">Utilisateurs</a>
      </li>
      <li class="breadcrumb-item active">Connexion</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Connexion</div>
        <div class="card-body">
          <div class="loadertext">
            Connexion réussie ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez <a href="index.php">ici.</a>
          </div>
          <img src="./img/loader.gif" alt="" class="loadergif">
          <script type="text/javascript">
          <!--
          var obj = 'window.location.replace("index.php");';
          setTimeout(obj,800);
          // -->
          </script>
      </div>
    </div>
  </div>
