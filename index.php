<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved. Orange SA avait acheté les droit de Helvetica sur les applications numériques. -->
    <link rel="stylesheet" href="css/orangeHelvetica.css">
    <!-- Orange Icons Copyright © 2016 Orange SA. All rights reserved -->
    <link rel="stylesheet" href="css/orangeIcons.css">
    <link rel="stylesheet" href="css/boosted.css">
    <!-- feuille de style personnalisée -->
    <link rel="stylesheet" href="css/style_personnalise.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">
    <link rel="stylesheet" href="css/edit_commentaire.css">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.tablesorter.min.js"></script>
    <script src="js/boosted.bundle.js"></script>
    <script src="js/boosted.bundle.min.js"></script>
    <script src="js/boosted.js"></script>
    <title>C4P Force</title>
    <!-- Gestion des couleurs de la durée des commandes -->
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
    <script type='text/javascript'>
      $(function() {
      //var content;
        $(".context-menu-one").contextMenu({
          selector: 'td',
          callback: function(key, options) {
            switch (key) {
              case 'edit':
                Commentaire = $(this).parent().find("td:eq(19)").text();
                $("#Commentaire").val(Commentaire);
                $('#editCommentaire').modal('show');
                break;
            }
          },
          items: {
            "edit": {name: "Editer", icon: "edit"}
          }
        });
        $('.context-menu-one').on('click',"td", function(e){// td éléments dynamiques : faut passer par délégate.
            console.log('clicked', this);
        });
        
        /* getHtmlData*/
        getHtmlData=function(){
          var html="";
          $.ajax({
            url:'traitementHtml.php',
            type:'post',
            dataType:'html',
            success:function(retour){
              $("#news-table tbody").html(retour);
            },
            error:function(e){
              alert("erreur Ajax :"+e.responseText);
            }
          });//fin ajax
        };
        getHtmlData(); 
      });
    </script>
  </head>
  <body>
    <div class="skiplinks" >
      <div class="skiplinks-section sr-only">
        <ul>
          <li id="cdu-skiplink"></li>
          <li>
            <a href="#content" class="skiplinks-trigger">content</a>
          </li>
        </ul>
      </div>
    </div>
    <header role="banner">
      <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/orange_logo.jpg" alt="Page d'acceuil" title="Page d'acceuil"/>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#orange-navbar-collapse" aria-controls="orange-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse justify-content-between collapse" id="orange-navbar-collapse">
            <ul class="navbar-nav" role="tablist">
              <li class="nav-item">
                <a class="nav-link" href="http://eforce-ft.sso.francetelecom.fr/psp/FT01PRO1/EMPLOYEE/CRM/h/?tab=DEFAULT&languageCd=FRA" target="_blank" title="Ouvrir e-force" role="button">E-force &nbsp;
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link svg-settings sample-svg-settings" href="#" role="button">Préférences</a>
              </li>
            </ul>
            <ul class="navbar-nav">
              <li role="presentation" class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown" role="button">
                  <span class="svg-avatar" aria-hidden="true">
                  </span>Bonjour
                  <!-- <span class="orange">Admin&nbsp;
                  </span> -->
                  <span class="orange">
                    <?php 
                      if(isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo'])){
                        //echo  $_SESSION['pseudo'] ;
                        if(isset($a->pseudo[$_SESSION])){
                          echo  plxUtils::strCheck($a->pseudo[$_SESSION['pseudo']]);
                        } 
                      }
                    ?> &nbsp;
                  </span> 
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a class="dropdown-item" href="../sign_in/deconnexion.php">Déconnexion</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../sign_in/espace-membre.php?modifier">Modifier mon profil</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../sign_in/espace-membre.php?supprimer">Supprimer mon compte</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>
    </header>
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
    <main id="content" class="container-fluid">
      <div class="well d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="well col-md-10"></div>
        <div class="input-group col-md-2">
          <form methode="POST" enctype="multipart/form-data" action="import.php" class="col-md-2">
            <input name="userFile" type="file" value="table"/>
            <input name="submit" type="submit" value="Importer"/>
          </form>
        </div>
        <!-- <div class="input-group col-md-2">
          <form methode="POST" enctype="multipart/form-data" action="import.php">
            <input name="userFile" type="file" value="table"/>
            <input name="submit" type="submit" value="Importer"/>
          </form> -->
          <!-- <div class="custom-file">
            <input type="file" class="custom-file-input">
            <label class="custom-file-label">Choisir fichier</label>
          </div>
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">Envoyer</button>
          </div> -->
          <!-- <div class="custom-file">
            <input type="file" class="custom-file-input">
            <label class="custom-file-label">Choisir fichier</label>
          </div>
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">Envoyer</button>
          </div> 
        </div>-->
      </div>
      <a href="index.php" class="btn btn-primary">Pilotage</a>
      <a href="performance.php" target ="_blank" class="btn btn-primary">Performance</a>
      <a href="entraide" target ="_blank" class="btn btn-primary">Délégation/Entraide</a>
      <a href="#" class="btn btn-primary">DMD</a>
      
      

      <!-- <a class="btn-file">
        <input type="file" class="file-input" id="inputGroupFile02">
        <label class="file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
      </a> -->
        <!-- <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div> -->
      <!-- <a href="#" class="btn btn-primary">Importer Commande</a> -->
      <div class="table-responsive">
        <table id="news-table" class="table tablesorter">
          <thead>
            <tr>
              <th scope="col" class="header">N° CMD</th>
              <th scope="col" class="header">Entité Client</th>
              <th scope="col" class="header">Nbre de jour en instance</th>
              <th scope="col" class="header">Date d'envoi ADV</th>
              <th scope="col" class="header">Nom du client</th>
              <th scope="col" class="header">SIREN client</th>
              <th scope="col" class="header">Description</th>
              <th scope="col" class="header">Existance produit RAC2</th>
              <th scope="col" class="header">Existance produit RAC1</th>
              <th scope="col" class="header">Eligible SST</th>
              <th scope="col" class="header">Segment</th>
              <th scope="col" class="header">Affaires sensibles</th>
              <th scope="col" class="header">Prioritaire</th>
              <th scope="col" class="header">INT Proservia Acticall Assist</th>
              <th scope="col" class="header">Nom Manager</th>
              <th scope="col" class="header">Nom du RAC affecté</th>
              <th scope="col" class="header">Date Affect CMD</th>
              <th scope="col" class="header">Guichet unique</th>
              <th scope="col" class="header">Type d'affectation</th>
              <th scope="col" class="header">Commentaire</th>
              <th scope="col" class="header">Validation</th>
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
            <form action ="index.php" method = "POST">
              <tr class="<?= $trClass ?>">
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
                    echo $NbreJour->format('%a'); //affichage au format nombre
                    //$modifNbreJour="UPDATE commande SET NbreJourInstance=$NbreJrInstance WHERE NbreJourInstance=$NbreJourInstance";
                  ?>
                </td>
                <td>
                  <?php
                    echo $ligne['DateEnvoiADV'];
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
                  <select class="custom-select custom-select-sm" id="controlSelectRAC2">
                    <option selected></option>
                    <option>OUI</option>
                    <option>NON</option>
                  </select>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectRAC1">
                    <option selected></option>
                    <option>OUI</option>
                    <option>NON</option>
                  </select>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectSST">
                    <option selected></option>
                    <option>OUI</option>
                    <option>NON</option>
                  </select>
                </td>
                <td>
                  <?php
                    echo $ligne['Segment'];
                  ?>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectSensible">
                    <option selected></option>
                    <option>OUI</option>
                  </select>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectPrio">
                    <option selected></option>
                    <option>OUI</option>
                    <option>NON</option>
                  </select>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectIntProservia">
                    <option selected></option>
                    <option>INT</option>
                    <option>Proservia</option>
                    <option>CDS Proservia</option>
                    <option>Acticall</option>
                    <option>Assist</option>
                    <option>Mig. BTIC</option>
                    <option>CCER Vie de Soll</option>
                  </select>
                </td>
                <td>
                  <?php
                    echo $ligne['NomManager'];
                  ?>
                </td>
                <td>
                  <?php
                    echo $ligne['NomRacAffecte'];
                  ?>
                </td>
                <td>
                  <input type="text" class="datepicker">
                </td>
                <td>
                  <?php
                    echo $ligne['GuichetUnique'];
                  ?>
                </td>
                <td>
                  <select class="custom-select custom-select-sm" id="controlSelectTypeAffectation">
                    <option selected></option>
                    <option>Comité</option>
                    <option>Hors comité</option>
                    <option>Rocade (GU)</option>
                    <option>Délégation</option>
                    <option>Partenaire</option>
                  </select>
                </td>
                <td>
                  <textarea class="form-commentaire form-commentaire-only" id="commentaire" rows="1">
                    <?php
                      echo $ligne['Commentaire'];
                    ?>
                  </textarea>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#editCommentaire">Editer</button>
                </td>
                <td>
                  <!-- <button class="btn btn-primary" data-toggle="#" data-target="#">Enregistrer</button> -->
                  <input type = "submit" name ="enregistrer" class="btn btn-primary">
                </td>
              </tr>
            </form>
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
                <textarea class="form-control" id="commentaire" rows="5" maxlength="255"></textarea>
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
    <!--/.container-->

    <!-- Pied de page -->
    <?php
      include("footer.php");
    ?>

    <!-- le script d'ajout de la date d'affectation -->
    <script>
      $( function() {
        $( ".datepicker" ).datepicker({
          changeMonth: true,
          changeYear: false
        });
      } );
    </script>

    <!-- script pour la partie edition modale commentaire -->
    <script> 
      $(function(){ 
        $('form').submit(function(e) { 
          e.preventDefault() 
          var $form = $(this) 
          $.post($form.attr('action'), $form.serialize()) 
          .done(function(data) { 
            $('#editCommentaire').modal('hide') 
          }) 
          .fail(function() { 
            alert('ça ne marche pas...') 
          }) 
        }) 
        $('.modal').on('shown.bs.modal', function(){ 
          $('input:first').focus() 
        }) 
      }) 
    </script> 

    <script>
      $(document).ready(function() {
        $("#news-table").tablesorter({
            // pass the headers argument and assing a object
            headers: {
                // assign the secound column (we start counting zero)
                4: {
                    // disable it by setting the property sorter to false
                    sorter: false
                }
            }
        });
      });
    </script>

    <script>
      // Surcharge des valeurs du script de la toolbar
      accessibilitytoolbar_custom={
        idSkipLinkIdLinkMode:"cdu-skiplink",
        cssSkipLinkClassName: "skiplinks-trigger",
        callback:skiplinksAfterLoad
      };
      $(".skiplinks-trigger").focus(function(){
        $(".skiplinks-section").addClass("skiplinks-show").removeClass("sr-only")
      });
      $(".skiplinks-trigger").blur(function(){
        $(".skiplinks-section").removeClass("skiplinks-show").addClass("sr-only")
      });
      function skiplinksAfterLoad(){
        $(".skiplinks-trigger").focus(function(){
          $(".skiplinks-section").addClass("skiplinks-show").removeClass("sr-only")
        });
        $(".skiplinks-trigger").blur(function(){
          $(".skiplinks-section").removeClass("skiplinks-show").addClass("sr-only")
        });
      }
    </script>
  </body>
</html>