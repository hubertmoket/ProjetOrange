<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- Copyright © 2014 Monotype Imaging Inc. All rights reserved
        Orange SA avait acheté les droit de Helvetica sur les applications numériques. -->
        <link rel="stylesheet" href="css/orangeHelvetica.css">
        <!-- 
            Orange Icons
            Copyright © 2016 Orange SA. All rights reserved
        -->
        <link rel="stylesheet" href="css/orangeIcons.css">
        <!-- Boosted CSS -->
        <link rel="stylesheet" href="css/boosted.css">
        <!-- <link rel="stylesheet" href="css/boosted.min.css"> -->
        <!-- feuille de style personnalisée -->
        <!-- <link rel="stylesheet" href="css/style_perso.css"> -->
        <!-- <link rel="stylesheet" href="css/style.css"> -->
        <link rel="stylesheet" href="css/styles_formulaire.css">
        <link rel="shortcut icon" href="favicon.ico">
        <title>Contacter nous</title>
    </head>

    <body>
            <div class="skiplinks" >
            <div class="skiplinks-section sr-only">
                <ul>
                <li id="cdu-skiplink">
                </li>
                <li>
                    <a href="#mainNav" class="skiplinks-trigger">main navigation</a>
                </li>
                <li>
                    <a href="#content" class="skiplinks-trigger">content</a>
                </li>
                </ul>
            </div>
            </div>
            <!-- partie header  -->
            <?php include("header.php"); ?>

            <main id="content" class="container-fluid" style="margin-bottom: 1000px;">
                <!-- <div class="well">Merci de bien vouloir completer les champs suivants.</div> -->
                <div class="row">
                    <div class="col-sm-6">
                        <form role="form" id="myForm">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-3 col-form-label is-required">Nom(s)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputFirstName" class="col-sm-3 col-form-label is-required">Prénom(s)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputFirstName" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-3 col-form-label is-required">Téléphone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="inputPhone" required pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-3 col-form-label is-required">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="email@orange.com" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputComment" class="col-sm-3 col-form-label">Votre message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="inputComment"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputFile" class="col-sm-3 col-form-label">Pièces jointes</label>
                                <div class="col-sm-9">
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Taille max du  fichier : 100MB</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-9 col-sm-9">
                                    <button type="submit" class="btn btn-secondary btn-sm">Soumettre</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main><!--/.container-->

            <!-- <footer role="contentinfo">
                <div class="container-fluid ">
                    <p class="mb-0">
                        <a href="#"><span>contact</span></a>
                        <a href="#" class="float-md-right"><span>help</span></a>
                    </p>
                </div>
            </footer> -->

        <!-- Boosted core JavaScript
            ================================================== -->
            <script src="js/jquery.js"></script>
            <script src="js/boosted.bundle.js"></script>
            <script src="js/boosted.bundle.min.js"></script>
            <!-- Include all compiled plugins bootstrap, bootstrap accessibility plugin and boosted specific components (below), or include individual files as needed -->
            <script src="js/boosted.js"></script>

            <script src="js/formulaire.js"></script>

        <script>
            // Surcharge des valeurs du script de la toolbar
            accessibilitytoolbar_custom={
            idLinkModeContainer:"id-for-cdu-link",
            cssLinkModeClassName:"nav-item-cdu",
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
        <!-- <script type="text/javascript" src="http://confort-plus.orange.com/js/toolbar-min.js"></script> -->
    </body>
</html>

