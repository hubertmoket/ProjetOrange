<?php
    //connexion à la base de données:
    $BDD = array();
    $BDD['host'] = "localhost";
    $BDD['user'] = "root";
    $BDD['pass'] = "";
    $BDD['db'] = "bddconnexion";
    //$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
    try {
        $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
        //$bdd = new PDO('mysql:host=localhost;dbname=developpeztests', 'root', '');
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
    $requete = 'SELECT * FROM commande';
    //$query="SELECT * FROM matable"; // le nom 'table' est résérvé a mysql.
    $html="";
    $resultat = $mysqli->query($requete); //execution de la requete puis stockage dans la variable $resultat
    //$resultats= $bdd->query($query);
    //mysqli_fetch_array($resultat)
    //$ligne=$resultats->fetch()
    while($ligne=mysqli_stmt_fetch($resultat)){
        $html.="<td>".$ligne['Commentaire']."</td>";
        //$html.="<tr><td>".$donnee['sda']."</td><td>".$donnee['service']."</td></tr>";
    }
    $resultat->closeCursor();
    echo $html;
?>