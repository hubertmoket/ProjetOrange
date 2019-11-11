<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved. Orange SA avait acheté les droit de Helvetica sur les applications numériques. -->
    <link rel="stylesheet" href="css/orangeHelvetica.css">
    <!-- Orange Icons Copyright © 2016 Orange SA. All rights reserved -->
    <link rel="stylesheet" href="css/orangeIcons.css">
    <link rel="stylesheet" href="css/boosted.css">
    <link rel="stylesheet" href="css/vendor/swiper.min.css">
    <!-- feuille de style personnalisée -->
    <link rel="stylesheet" href="css/style_personnalise.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">
    <link rel="stylesheet" href="css/edit_commentaire.css">
    <link rel="stylesheet" href="css/performance.css">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.tablesorter.min.js"></script>
    <script src="js/boosted.bundle.js"></script>
    <script src="js/boosted.bundle.min.js"></script>
    <script src="js/boosted.js"></script>
    <script src="js/performance.js"></script>
    <title>Pré délégation</title>
    <style>
      .ligneInstanceEleve {
        background-color:#cd3c14; /* rouge */
        border-color: #cd3c14;
      }
      .ligneInstanceMilieu {
        background-color: #ffcc00; /* jaune */
        border-color: #ffcc00;
      }
      .ligneInstanceNormal {
        background-color: #32c832; /* vert */
        border-color: #32c832;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="entraide.php"> Pré Délégation
        <!-- <img src="img/orange_logo.jpg" alt="Page d'acceuil" title="Page d'acceuil"/> -->
      </a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Recherche" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Déconnexion</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="delegation.php" target="_blank" class="nav-link active">DELEGATION</a>
              </li>
              <li class="nav-item">
                <a href="commandeInstance.php" class="nav-link active">COMMANDES EN INSTANCES</a>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link active">Type de produit</a>
              </li> -->
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
          <!-- Connexion et extraction des données depuis la bdd et son affichage dans le tableau -->
          <?php
            //infos de connexion à la base de données:
            $BDD = array();
            $BDD['host'] = "localhost";
            $BDD['user'] = "root";
            $BDD['pass'] = "";
            $BDD['db'] = "bdd_c4p";
            //on se connecte à la base de données:
            $mysqli = mysqli_connect($BDD['host'],$BDD['user'],$BDD['pass'],$BDD['db']);
            $mysqli->set_charset("utf8"); //affichage des caracteres accentués
            $requete = 'SELECT * FROM commande';
            $resultat = $mysqli->query($requete); //execution de la requete puis stockage dans la variable $resultat
          ?>

          <!-- <h2>Evolution des commandes</h2> -->
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Souhait de délégation</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <input class="form-control" type="text" placeholder="Nbre des cmd affectées..." readonly>
                <button type="button" class="btn btn-sm btn-outline-secondary">Actualiser</button>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>N° CMD</th>
                  <th>Ent. Client</th>
                  <th>Nom Client</th>
                  <th>SIREN</th>
                  <th>Description</th>
                  <th>Type Prod</th>
                  <th>Nb Site</th>
                  <th>Possib. Entraide</th>
                  <th>Commentaire</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  //on parcours ligne par ligne avec la boucle while puis stockage dans $ligne
                  while ($ligne = mysqli_fetch_assoc($resultat)){
                  //Les varaibles
                  //$NbreJrInstance=$ligne['NbreJourInstance'];
                  $date1=new DateTime('now'); // la date du jour en cours
                  $date2=new DateTime($ligne['DateEnvoiADV']); //extraction de la date d'envoi ADV depuis la base de donnee puis son stockage dans la varaible $date2
                  $NbreJour=$date2->diff($date1); //calcul de date1-date2
                  $valeur=$NbreJour->format('%a'); //stockage du $NbreJour pour l'utilisation des couleurs.
                  //Dynamisation de la couleur des lignes
                  if($valeur>=21){
                    $trClass='ligneInstanceEleve'; //couleur rouge
                  } elseif($valeur>=14){
                    $trClass='ligneInstanceMilieu'; //couleur jaune
                  }else{
                    $trClass='ligneInstanceNormal'; // couleur verte
                  }
                ?>
                <tr>
                  <td>
                    <?php
                      echo $ligne['NumCommande'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['EntiteClient'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['NomClient'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['SirenClient'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['Description'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['Segment'];
                    ?>
                  </td>
                  <td>
                    <?php
                      echo $ligne['GuichetUnique'];
                    ?>
                  </td>
                  <td>
                  <select class="custom-select custom-select-sm" id="controlSelect">
                    <option selected></option>
                    <option>OUI</option>
                    <option>NON</option>
                </select>
                  </td>
                  <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editCommentaire">Editer</button>
                  </td>
                </tr>
                <?php
                } //fin de la boucle, le tableau contient toute la BDD
                //$mysqli->close(); //deconnection de mysql
                ?>
            </tbody>
            </table>
          </div>
          <!-- Modal édition de commentaire -->
          <div class="modal fade" id="editCommentaire" role="dialog" aria-labelledby="editCommentaireLabel" tabindex="-1"><!-- Facaliser l'ecran sur le formulaire d'edition -->
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h2 class="modal-title h4" id="editCommentaireLabel">Modifier le commentaire</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span> <!--masquer (par defaut) la fenetre modale aux technologies d'assistance-->
                </button>
                </div>
                <div class="modal-body">
                  <form class="col-form">
                    <div class="form-group">
                      <label for="commentaire" class="col-form-label">Commentaire</label>
                      <textarea class="form-control" id="commentaire" rows="5"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" id="enregistrerCommentaire">Enregistrer</button>
                </div>
              </div>
            </div>
          </div>
          <!-- fin modal -->
        </main>
      </div>
    </div>
  </body>
  </html>