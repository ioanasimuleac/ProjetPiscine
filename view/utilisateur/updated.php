<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=utilisateur&action=readAll">Utilisateurs</a>
      </li>
      <li class="breadcrumb-item active">Modification</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-plus"></i> Modifier votre mot de passe</div>
        <div class="card-body">
          <div class="loadertext">
            Mot de passe modifié avec succès ! Redirection en cours ...<br>
            Si la redirection ne fonctionne pas, cliquez <a href="index.php?controller=utilisateur&action=readAll">ici.</a>
          </div>
          <img src="./img/loader.gif" alt="" class="loadergif">
          <script type="text/javascript">
          <!--
          var obj = 'window.location.replace("index.php?controller=utilisateur&action=readAll");';
          setTimeout(obj,600);
          // -->
          </script>
      </div>
    </div>
  </div>
