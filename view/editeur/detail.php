<?php

$idEditeur = $tab_editeur["idEditeur"];
$nomEditeur = $tab_editeur["nomEditeur"];
$villeEditeur = $tab_editeur["villeEditeur"];
$rueEditeur = $tab_editeur["rueEditeur"];
$cpEditeur = $tab_editeur["CPEditeur"];

?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Gestionnaire</a>
      </li>
      <li class="breadcrumb-item">
        <a href="index.php?controller=editeur&action=readAll">Éditeurs</a>
      </li>
      <li class="breadcrumb-item active">Détail</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-id-card-o"></i> Détail de l'éditeur</div>
        <div class="card-body">
          <h1><?php echo $nomEditeur; ?></h1>
          <p class="text-center"><?php echo $rueEditeur.", ".$villeEditeur." ".$cpEditeur; ?></p>


          <h2 class="mt-4">Jeux</h2>
          <?php
          if(sizeof($tab_jeu) == 0){
            ?>
            <p class="text-center">Aucun jeu n'a été enregistré pour cet éditeur. <a href="index.php?controller=jeu&action=add&idEditeur=<?php echo $idEditeur; ?>">Ajouter !</a></p>
            <?php
          }
          else{
            ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="btn-container">
                  <a href="index.php?controller=jeu&action=add&idEditeur=<?php echo $idEditeur; ?>">
                    <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Ajouter un jeu</button>
                  </a>
                </div>
              </div>
            </div>
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Nombre de joueurs</th>
                  <th>Date de sortie</th>
                  <th>Durée</th>
                  <th>Catégorie</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tab_jeu as $i =>$v){
                  $idJeu = $v-> getIdJeu();
                  $nomJeu = $v-> getNomJeu();
                  $nbJoueursJeu = $v-> getnbJoueursJeu();
                  $dateSortieJeu = $v-> getDateSortieJeu();
                  $dureePartieJeu = $v-> getDureePartieJeu();
                  $idCategorie = $v-> getIdCategorie();
                  $nomCategorie = $v-> getNomCategorie();
                  ?>
                  <tr>
                    <td><?php echo $nomJeu; ?></td>
                    <td>
                      <?php if($nbJoueursJeu == NULL){
                        echo "<span class='italique text-secondary'>Non renseigné</span>";
                      }
                      else{
                        echo $nbJoueursJeu;
                      }
                      ?>
                    </td>
                    <td>
                      <?php if($dateSortieJeu == NULL){
                        echo "<span class='italique text-secondary'>Non renseigné</span>";
                      }
                      else{
                        echo $dateSortieJeu;
                      }
                      ?>
                    </td>
                    <td>
                      <?php if($dureePartieJeu == NULL){
                        echo "<span class='italique text-secondary'>Non renseigné</span>";
                      }
                      else{
                        echo $dureePartieJeu;
                      }
                      ?>
                    </td>
                    <td><?php echo $nomCategorie; ?></td>
                    <td>
                      <button title="Supprimer" type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalSupp<?php echo htmlspecialchars($idJeu); ?>">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                      <div class="modal fade" id="modalSupp<?php echo htmlspecialchars($idJeu); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Êtes vous sûrs de vouloir supprimer le jeu <?php echo htmlspecialchars($nomJeu); ?> ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <a href='index.php?controller=jeu&action=delete&idEditeur=<?php echo $_GET['id']; ?>&idJeu=<?php echo htmlspecialchars($idJeu); ?>'>
                                <button type="button" class="btn btn-primary">Confirmer</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>

            <?php
          }
          ?>
          <h2  class="mt-4">Contacts</h2>
          <?php
          if(sizeof($tab_contact) == 0){
            ?>
            <p class="text-center">Aucun contact n'a été enregistré pour cet éditeur. <a href="index.php?controller=contact&action=add&idEditeur=<?php echo $idEditeur; ?>">Ajouter !</a></p>
            <?php
          }
          else{
            ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="btn-container">
                  <a href="index.php?controller=contact&action=add&idEditeur=<?php echo $idEditeur; ?>">
                    <button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Ajouter un contact</button>
                  </a>
                </div>
              </div>
            </div>
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Nom</th>
                  <th>Téléphone</th>
                  <th>Mail</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($tab_contact as $i =>$v){
                  $idContact = $v-> getIdContact();
                  $nomContact = $v-> getNomContact();
                  $prenomContact = $v-> getprenomContact();
                  $numTelContact = $v-> getNumTelContact();
                  $mailContact = $v-> getMailContact();
                  $estPrincipalContact = $v-> getEstPrincipalContact();
                  ?>
                  <tr>
                    <?php
                    if($estPrincipalContact == 1){
                      ?>
                      <td class="text-center text-warning">
                        <form method="post" action="index.php?controller=contact&action=updateEstPrincipal">
                          <input type="hidden" name="idContact" value="<?php echo $idContact; ?>">
                          <input type="hidden" name="val" value="<?php echo $estPrincipalContact; ?>">
                          <input type="hidden" name="idEditeur" value="<?php echo $idEditeur; ?>">
                          <button type="button submit" class="btn btn-fav"><i class="fa fa-star text-warning" aria-hidden="true"></i></button>
                        </form>
                      </td>
                      <?php
                    }
                    else{
                      ?>
                      <td class="text-center text-secondary">
                        <form method="post" action="index.php?controller=contact&action=updateEstPrincipal">
                          <input type="hidden" name="idContact" value="<?php echo $idContact; ?>">
                          <input type="hidden" name="val" value="<?php echo $estPrincipalContact; ?>">
                          <input type="hidden" name="idEditeur" value="<?php echo $idEditeur; ?>">
                          <button type="button submit" class="btn btn-fav"><i class="fa fa-star text-secondary" aria-hidden="true"></i></button>
                        </form>
                      </td>
                      <?php
                    }
                    ?>
                    <td><?php echo $nomContact." ".$prenomContact; ?></td>
                    <td><?php echo $numTelContact; ?></td>
                    <td><?php echo $mailContact; ?></td>
                    <td>
                      <button title="Supprimer" type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalSuppCont<?php echo htmlspecialchars($idContact); ?>">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                      <div class="modal fade" id="modalSuppCont<?php echo htmlspecialchars($idContact); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Êtes vous sûrs de vouloir supprimer le contact <?php echo htmlspecialchars($prenomContact); ?> <?php echo htmlspecialchars($nomContact); ?> ?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                              <a href='index.php?controller=contact&action=delete&idEditeur=<?php echo $_GET['id']; ?>&idContact=<?php echo htmlspecialchars($idContact); ?>'>
                                <button type="button" class="btn btn-primary">Confirmer</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
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
<div class="container-fluid">
  <div class="row">
    <?php
    if(empty($reservation)){
      ?>
      <div class="col-md-6 padd-edit">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-id-card-o"></i> Suivi de l'éditeur
          </div>
          <div class="card-body">
            <h2  class="mt-4">Suivi en cours</h2>
            <?php
            if(empty($suivi)){
              ?>

              <form id="creation-suivi" method="post" action="index.php?controller=suivi&action=added">
                <fieldset>
                  <legend class="text-center">Enregistrer le suivi</legend>
                  <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-8">
                      <label for="premierC">Date du premier contact <span class="text-danger">*</span></label>
                      <input id="premierC" value="" type="date" placeholder="" name="premierContactSuivi" required/>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-8">
                      <label for="derniereR">Date de la dernière relance <span class="text-danger">*</span></label>
                      <input id="derniereR" value="" type="date" placeholder="" name="derniereRelanceSuivi" required/>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-sm-10 col-lg-8">
                      <label for="reponseE">Réponse de l'éditeur <span class="text-danger">*</span></label>
                      <select id="reponseE" name="reponseEditeurSuivi" required>
                        <option value="0" selected>Pas de réponse</option>
                        <option value="1">Souhaite réserver</option>
                        <option value="2">Ne souhaite pas réserver</option>
                      </select>
                    </div>
                  </div>
                  <input name="idEditeur" type="hidden" value="<?php echo $_GET['id']; ?>">
                  <input name="anneeFestival" type="hidden" value="<?php echo $anneeFestival; ?>">
                  <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Enregistrer</button>
              </fieldset>
            </form>


              <?php
            }
            else{
              ?>

              <h3 class="mt-3">Caractéristiques</h3>
              <div id="carac-suivi" class="text-center">
                <div>Premier contact : <?php echo $suivi['premierContactSuivi']; ?></div>
                <div>Dernière relance : <?php echo $suivi['derniereRelanceSuivi']; ?></div>
                <div><?php if($suivi['reponseEditeurSuivi'] == 0){
                  ?>
                  <span class="text-warning">L'éditeur n'a pas répondu</span>
                  <?php
                }
                elseif($suivi['reponseEditeurSuivi'] == 1){
                  ?>
                  <span class="text-success">L'éditeur a prévu de venir.</span>
                  <?php
                }
                else{
                  ?>
                  <span class="text-danger">L'éditeur ne vient pas.</span>
                  <?php
                }
                ?>
              </div>
            </div>
            <form id="update-suivi" method="post" action="index.php?controller=suivi&action=updated" class="d-none">
              <fieldset>
                <legend class="text-center">Modifier le suivi</legend>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="premierC">Date du premier contact <span class="text-danger">*</span></label>
                    <input id="premierC"  type="date" value="<?php echo $suivi['premierContactSuivi']; ?>" name="premierContactSuivi" required/>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="derniereR">Date de la dernière relance <span class="text-danger">*</span></label>
                    <input id="derniereR" type="date" value="<?php echo $suivi['derniereRelanceSuivi']; ?>" name="derniereRelanceSuivi" required/>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="reponseE">Réponse de l'éditeur <span class="text-danger">*</span></label>
                    <select id="reponseE" name="reponseEditeurSuivi" required>
                      <option value="0" <?php if($suivi['reponseEditeurSuivi'] == 0){ echo "selected";}?>>Pas de réponse</option>
                      <option value="1" <?php if($suivi['reponseEditeurSuivi'] == 1){ echo "selected";}?>>Souhaite réserver</option>
                      <option value="2" <?php if($suivi['reponseEditeurSuivi'] == 2){ echo "selected";}?>>Ne souhaite pas réserver</option>
                    </select>
                  </div>
                </div>
                <input name="idEditeur" type="hidden" value="<?php echo $_GET['id']; ?>">
                <input name="anneeFestival" type="hidden" value="<?php echo $anneeFestival; ?>">
                <div class="text-center">
                  <button type='button' class='btn-secondary text-white btn btn-md mt-3' onclick="annulerModifierSuivi()"><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Annuler</button>
                  <button type='button submit' class='btn btn-success btn-md mt-3'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Enregistrer</button>
                </div>
            </fieldset>
          </form>
            <div class="btn-container">
                <button id="btn-modif-suivi" type="button" class="text-white btn btn-warning" onclick="modifierSuivi()"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier le suivi</button>
            </div>

              <?php
            }
              ?>
          </div>
        </div>
    </div>

    <?php
  }
      ?>

    <div class="col-md-6 padd-edit">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-id-card-o"></i> Réservation en cours
        </div>
        <div class="card-body">
          <h2 class="mt-4">Réservation en cours</h2>
          <?php
          if(empty($reservation)){
            ?>

            <form id="creation-reservation" method="post" action="index.php?controller=reservation&action=added">
              <fieldset>
                <legend class="text-center">Enregistrer la réservation</legend>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="date">Date de la réservation <span class="text-danger">*</span></label>
                    <input id="date" value="" type="date" placeholder="" name="dateReservation" required/>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="prixNego">Prix négocié</label>
                    <input id="prixNego" value="" type="number" placeholder="" name="prixNegoReservation"/>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="logements">Nombre de personnes à loger <span class="text-danger">*</span></label>
                    <input id="logements" value="0" type="number" name="nbLogementsReservation"/>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="etat">État de la facture <span class="text-danger">*</span></label>
                    <select id="etat" name="etatFactureReservation" required>
                      <option value="0" selected>Pas éditée</option>
                      <option value="1">Éditée</option>
                      <option value="2">Payée</option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-10 col-lg-8">
                    <label for="comm">Commentaire</label>
                    <textarea id="comm" name="commentaireReservation" rows=4 cols=40></textarea>
                  </div>
                </div>
                <input name="idEditeur" type="hidden" value="<?php echo $_GET['id']; ?>">
                <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Enregistrer</button>
            </fieldset>
          </form>

            <?php
          }
          else{
            ?>
            <h3 class="mt-3">Caractéristiques</h3>
            <div id="carac-reservation" class="text-center">
              <div>Date : <?php echo $reservation['dateReservation']; ?></div>
              <div><?php if($reservation['etatFactureReservation'] == 0){
                ?>
                <span class="text-danger">La facture n'est pas encore éditée.</span>
                <?php
              }
              elseif($reservation['etatFactureReservation'] == 1){
                ?>
                <span class="text-warning">La facture n'est pas encore payée.</span>
                <?php
              }
              else{
                ?>
                <span class="text-success">La facture est payée.</span>
                <?php
              }
              ?>
            </div>
            <div><?php if($reservation['nbLogementsReservation'] == 0){
              ?>
              <span class="text-secondary italique">Pas de logements prévus pour cette réservation.</span>
              <?php
            }
            else{
              ?>
              Nombre de personnes à loger : <?php echo $reservation['nbLogementsReservation']; ?>
              <?php
            }
            ?>
          </div>
          <div><?php if($reservation['prixNegoReservation'] == NULL){
            ?>
            <span class="text-secondary italique">Cette réservation ne bénéficie pas de prix négocié.</span>
            <?php
          }
          else{
            ?>
            Prix négocié : <?php echo $reservation['prixNegoReservation']; ?> €
            <?php
          }
          ?>
        </div>
        <div><?php if($reservation['commentaireReservation'] == NULL){
          ?>
          <span class="text-secondary italique">Pas de commentaire associé à cette réservation.</span>
          <?php
        }
        else{
          ?>
          <?php echo $reservation['commentaireReservation']; ?>
          <?php
        }
        ?>
      </div>
    </div>


    <form id="update-reservation" class="d-none" method="post" action="index.php?controller=reservation&action=updated">
      <fieldset>
        <legend class="text-center">Modifier la réservation</legend>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg-8">
            <label for="dateRes">Date de la réservation <span class="text-danger">*</span></label>
            <input id="dateRes" value="<?php echo $reservation['dateReservation']; ?>" type="date" placeholder="" name="dateReservation" required/>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg-8">
            <label for="prixNegoRes">Prix négocié</label>
            <input id="prixNegoRes" value="<?php echo $reservation['prixNegoReservation']; ?>" type="number" placeholder="" name="prixNegoReservation"/>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg-8">
            <label for="logementsRes">Nombre de personnes à loger <span class="text-danger">*</span></label>
            <input id="logementsRes" value="<?php echo $reservation['nbLogementsReservation']; ?>" type="number" name="nbLogementsReservation"/>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg-8">
            <label for="etatRes">État de la facture <span class="text-danger">*</span></label>
            <select id="etatRes" name="etatFactureReservation" required>
              <option value="0" <?php if($reservation['etatFactureReservation'] == 0){ echo "selected"; }?>>Pas éditée</option>
              <option value="1" <?php if($reservation['etatFactureReservation'] == 1){ echo "selected"; }?>>Éditée</option>
              <option value="2" <?php if($reservation['etatFactureReservation'] == 2){ echo "selected"; }?>>Payée</option>
            </select>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-lg-8">
            <label for="commRes">Commentaire</label>
            <textarea id="commRes" name="commentaireReservation" rows=4 cols=40><?php echo $reservation['commentaireReservation']; ?></textarea>
          </div>
        </div>
        <input name="idEditeur" type="hidden" value="<?php echo $_GET['id']; ?>">
        <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Enregistrer</button>
    </fieldset>
  </form>

    <div class="btn-container mt-2">
        <button id="btn-modif-reservation" type="button" class="text-white btn btn-warning" onclick="modifierReservation()"><i class="fa fa-fw fa-pencil-square-o"></i> Modifier la réservation</button>
    </div>
    <?php
  }
  ?>
        </div>
      </div>
  </div>
  <?php
  if(!empty($reservation)){
    ?>
    <div class="col-md-6 padd-edit">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-id-card-o"></i> Places assignées
        </div>
        <div class="card-body">

          <h3 class="mt-3">Places réservées</h3>
          <div class="text-center">
            <?php
            if(empty($tab_tables)){
              ?>
              <p class="text-center">Aucune place n'est enregistrée dans cette réservation.</p>
              <?php
            }
            else{
              ?>
              <?php
              foreach ($tab_tables as $i =>$v){
                $idZone = $v-> getIdZone();
                $nomZone = $v-> getNomZone();
                $nbPlaces = $v-> getNbPlaces();
                ?>
                <table class="table table-bordered mb-0" width="100%">
                  <tbody>
                    <tr>
                      <td><?php echo "<span class='font-weight-bold'>".$nomZone."</span>"; ?></td>
                      <td><?php echo $nbPlaces; ?></td>
                      <td width="70px"><a href="index.php?controller=comporter&action=add&idZone=<?php echo $idZone; ?>&idEditeur=<?php echo $_GET['id']; ?>&idReservation=<?php echo $reservation['idReservation']; ?>"><i class="fa fa-plus text-success c-pointer" title="Assigner un jeu à la zone" aria-hidden="true"></i></a>
                        <a href="index.php?controller=localiser&action=delete&idZone=<?php echo $idZone; ?>&idEditeur=<?php echo $_GET['id']; ?>&nbPlaces=<?php echo $nbPlaces; ?>&idReservation=<?php echo $reservation['idReservation']; ?>"><i class="fa fa-times text-danger c-pointer pl-1" title="Supprimer la réservation de cette zone" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered" width="100%">
                  <tbody>
                    <?php
                    foreach ($tab_co as $i =>$v){
                      $nomJeu = $v-> getNomJeu();
                      $idZoneComp = $v-> getIdZone();
                      $nbComporter = $v-> getNbComporter();
                      $recuComporter = $v-> getRecuComporter();
                      $retourComporter = $v-> getRetourComporter();
                      $donComporter = $v-> getDonComporter();

                      if($idZoneComp == $idZone){
                        ?>
                        <tr>
                          <td><?php echo "<span class='font-weight-normal'>".$nomJeu."</span>"; ?></td>
                          <td title="Nombre à recevoir"><?php
                            if($nbComporter == NULL){
                              echo "<span class='text-secondary'>-</span>";
                            }else{
                              echo $nbComporter;
                            }?>
                          </td>
                          <td title="Nombre reçu">
                            <?php
                            if($recuComporter == NULL){
                              echo "<span class='text-secondary'>-</span>";
                            }else{
                              echo $recuComporter."/".$nbComporter;
                            }?>
                          </td>
                          <td title="Nombre renvoyé">
                            <?php
                            if($retourComporter == NULL){
                              echo "<span class='text-secondary'>-</span>";
                            }else{
                              echo $retourComporter;
                            }?>
                          </td>
                          <td title="Nombre de jeux donnés">
                          <?php
                          if($donComporter == NULL){
                            echo "<span class='text-secondary'>-</span>";
                          }else{
                            echo $donComporter;
                          }?></td>
                        </tr>
                      <?php
                      }?>
                    <?php
                      }
                      ?>
                  </tbody>
                </table>
                <?php
              }
              ?>
              <?php
            }
            ?>
            <br>
            <?php
            if(empty($tab_tables) && empty($tab_zonesDispo)){
              ?>
              <p class="text-center">Pas de zones disponibles.</p>
              <?php
            }elseif(empty($tab_zonesDispo)){
              ?>
              <p class="text-center">Plus de zones disponibles.</p>
              <?php
            }else{
              ?>
              <form id="creation-places" method="post" action="index.php?controller=localiser&action=added">
                <label for="cp">Zone <span class="text-danger">*</span> :</label>
                <select id="zone" name="idZone">
                  <?php
                  foreach ($tab_zonesDispo as $i =>$v){
                    $idZone = $v-> getIdZone();
                    $nomZone = $v-> getNomZone();
                    echo "<option value='".$idZone."'>".$nomZone."</option>";
                  }
                  ?>
                </select>
                <br>
                <label for="places">Nombre de places <span class="text-danger">*</span> :</label>
                <input id="places" value="0" type="number" name="nbPlaces" max="99999" style="max-width : 70px;" required/>
                <input name="idReservation" type="hidden" value="<?php echo $reservation['idReservation']; ?>">
                <input name="idEditeur" type="hidden" value="<?php echo $idEditeur; ?>">
                <button type='button submit' class='btn btn-success btn-md mt-3 center-block'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Ajouter</button>
              </form>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
  </div>

  <?php
}
    ?>
</div>
</div>
