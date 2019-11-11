<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RESIL</title>

    <link rel="stylesheet" type="text/css" href="css/boosted.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/MyCSS.css"/>

</head>
<body>

<div class="container body-content">

    <div class="row bottom-buffer">
        <div class="col-md-12">
            <header role="banner">
                <nav class="navbar navbar-dark bg-dark navbar-expand-md">
                    <div class="container">
                        <a class="navbar-brand" href="#"><img src="img/orange_logo.svg" alt="Back to homepage" title="Back to homepage"/></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsing-navbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse justify-content-between collapse" id="collapsing-navbar">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a class="nav-link" href="delegation.php">Creation</a></li>
                                <li class="nav-item"><a class="nav-link" href="modif.php">Modif</a></li>
                                <li class="nav-item active"><a class="nav-link" href="resil.php">Resil</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>       
    </div>

    <div class="row bottom-buffer">
        <div class="table-responsive col-md-12">
            <table id="myTable" class="table-bordered col-md-12" style="text-align:center">
                <thead>
                  <tr>
                    <th colspan=3></th>
                    <th class="table-light" colspan=4>Souhait délégation</th>
                    <th rowspan=2>Commentaire</th>
                    <th class="table-light" rowspan=2>Possibilité entraide</th>
                    <th colspan=4>Répartition des souhaits</th>
                  </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="table-light">Entités</th>
                        <th>Instances</th>
                        <th>Affectées</th>
                        <th class="table-light">ADSL</th>
                        <th class="table-light">Non ADSL</th>
                        <th class="table-light">BIC</th>
                        <th class="table-light">EGO</th>
                        <th></th>
                        <th class="table-light"></th>
                        <th>Vers AE (Quantité)</th>
                        <th>Vers AE (Entité)</th>
                        <th>Vers Majorel</th>
                        <th>Vers Sitel</th>
                    </tr>
                </thead>
              </table>
        </div>
    </div>

    <div class="row bottom-buffer">
        <div class="col-md-5"></div>
        <div class="col-md-1">
            <button type="button" class="btn btn-primary" onclick="clearTable()">Clear</button>
        </div>   
        <div class="col-md-1">
                <button type="button" class="btn btn-primary" onclick="addData(dataTestResil,'resil')">DATA</button>
        </div>  
        <div class="col-md-5"></div>
    </div>
    
    <!-- <footer>
        <p class="text-center">&copy; 2019</p>
    </footer> -->
</div>

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/boosted.min.js"></script>
<script type="text/javascript" src="js/divAction.js"></script>
<script>
        addData(dataBeginResil, 'resil');
    </script>

</body>
</html>