<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if(!isset($y)){ echo $pageTitle;}else{echo "Gestionnaire";} ?></title>
  <link rel="icon" href="img/favicon.ico" />
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
          <a class="navbar-brand" href="index.php">Gestionnaire du festival</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php  if (isset($_SESSION['login'])) {?>
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Tableau de bord</span>
                </a>

              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Editeur">
                <a class="nav-link" href="index.php?controller=editeur&action=readAll">
                  <i class="fa fa-fw fa-address-book"></i>
                  <span class="nav-link-text">Éditeurs</span>
                </a>
              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Utilisateurs">
                <a class="nav-link" href="index.php?controller=utilisateur&action=readAll">
                  <i class="fa fa-fw fa-user"></i>
                  <span class="nav-link-text">Utilisateurs</span>
                </a>
              </li>

            </ul>
            <ul class="navbar-nav sidenav-toggler">
              <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                </a>
              </li>
            </ul>
          <?php }?>
            <ul class="navbar-nav ml-auto">
              <?php  if (isset($_SESSION['login'])) {?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?controller=suivi&action=readNotifications">
                    <i class="fa fa-fw fa-bell"></i>
                  </a>
                </li>
              <?php
            }
            ?>
              <?php  if (isset($_SESSION['login'])) {?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?controller=utilisateur&action=deconnect">
                  <i class="fa fa-fw fa-sign-out"></i>Se déconnecter
                </a>
              </li>
              <?php
            }
            else{
              ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?controller=utilisateur&action=connect">
                  <i class="fa fa-fw fa-sign-in"></i>Se connecter
                </a>
              </li>
              <?php
            }
            ?>
            </ul>
          </div>
        </nav>
