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
      <li class="breadcrumb-item active">Création</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Éditeur créé avec succès</div>
        <div class="card-body">
          <div class='table-responsive table-bordered mar-10'>
            <table class='table'>
              <tr>
                <th class='w10'><img src='$imgProduit' alt='Image du produit' class='thumb-img'></th>
                <th class='w40 l-height100'>$nomProd</th>
                <th class='w40 l-height100'>$prixProd</th>
              </tr>
            </table>
          </div>
          <a href='index.php?c'>
            <button type='button' class=' mar-10 btn btn-info btn-md'>
                <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span> Retour aux éditeurs
              </button>
            </a>

      </div>
      <div class="card-footer small text-muted">Mis à jour le ...</div>
    </div>
  </div>
