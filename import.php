<?php
  //infos de connexion à la base de données:
  //$BDD = array();
  //$BDD['host'] = "localhost";
  //$BDD['user'] = "root";
  //$BDD['pass'] = "";
  //$BDD['db'] = "bdd_c4p";
  //on se connecte à la base de données:
  //$mysqli = mysqli_connect($BDD['host'],$BDD['user'],$BDD['pass'],$BDD['db']);
  //$mysqli->set_charset("utf8"); //affichage des caracteres accentués
  //$requete = 'SELECT * FROM commande';
  //$resultat = $mysqli->query($requete); //execution de la requete puis stockage dans la variable $resultat

  extract(filter_input_array(INPUT_POST));
  $fichier=$_FILES["userFile"]["name"];
  if($fichier){
    $fp=fopen($_FILES["userFile"]["tmp_name"],r);
  }
  else{
    echo 'Fichier inconnu';
    exit();
  }
  $compteur=0;
  echo 'importation réussi';
  while(!feof($fp)){
    $ligne=fgets($fp,4096);
    $liste=explode(";",$ligne);
    $table=filter_input(INPUT_POST,'userFile');
    $liste[0]=(isset($liste[0])) ? $liste[0]:null;
    $liste[1]=(isset($liste[1])) ? $liste[1]:null;
    $liste[2]=(isset($liste[2])) ? $liste[2]:null;
    $liste[3]=(isset($liste[3])) ? $liste[3]:null;

    $liste[4]=(isset($liste[4])) ? $liste[4]:null;
    $liste[5]=(isset($liste[5])) ? $liste[5]:null;
    $liste[6]=(isset($liste[6])) ? $liste[6]:null;
    $liste[7]=(isset($liste[7])) ? $liste[7]:null;

    $liste[8]=(isset($liste[8])) ? $liste[8]:null;
    $liste[9]=(isset($liste[9])) ? $liste[9]:null;
    $liste[10]=(isset($liste[10])) ? $liste[10]:null;
    $liste[11]=(isset($liste[11])) ? $liste[11]:null;

    $liste[12]=(isset($liste[12])) ? $liste[12]:null;
    $liste[13]=(isset($liste[13])) ? $liste[13]:null;
    $liste[14]=(isset($liste[14])) ? $liste[14]:null;
    $liste[15]=(isset($liste[15])) ? $liste[15]:null;

    $liste[16]=(isset($liste[16])) ? $liste[16]:null;
    $liste[17]=(isset($liste[17])) ? $liste[17]:null;
    $liste[18]=(isset($liste[18])) ? $liste[18]:null;
    $liste[19]=(isset($liste[19])) ? $liste[19]:null;

    $liste[20]=(isset($liste[20])) ? $liste[20]:null;
    $liste[21]=(isset($liste[21])) ? $liste[21]:null;
    $liste[22]=(isset($liste[22])) ? $liste[22]:null;
    $liste[23]=(isset($liste[23])) ? $liste[23]:null;
    $champs0=$liste[0];
    $champs1=$liste[1];
    $champs2=$liste[2];
    $champs3=$liste[3];

    $champs4= $liste[4];
    $champs5= $liste[5];
    $champs6= $liste[6];
    $champs7= $liste[7];

    $champs8= $liste[8];
    $champs9= $liste[9];
    $champs10= $liste[10];
    $champs11= $liste[11];

    $champs12= $liste[12];
    $champs13= $liste[13];
    $champs14= $liste[14];
    $champs15= $liste[15];

    $champs16= $liste[16];
    $champs17= $liste[17];
    $champs18= $liste[18];
    $champs19= $liste[19];

    $champs20= $liste[20];
    $champs21= $liste[21];
    $champs22= $liste[22];
    $champs23= $liste[23];
    if($champs1!=''){
      $compteur=$compteur+1;
      //$mysqli = mysqli_connect($BDD['host'],$BDD['user'],$BDD['pass'],$BDD['db']);
      $mysqli=new mysqli('localhost','root','','bdd_c4p');
      $mysqli->set_charset("utf8"); //affichage des caracteres accentués
      $request=("insert into commande(NumCommande,EntiteClient,NbreJourInstance,DateEnvoiADV,NomClient,SirenClient,Description,ExistanceProduitRAC2,ExistanceProduitRAC1,EligibiliteSST,Segment,AffaireSensible,Prio,IntProserviaActicallAssist,NomManager,NomRacAffecte,DateAffectCMD,GuichetUnique,TypeAffectation,Commentaire,TypeProduit,NbSite,PossibilEntraide,Visible) values('$champs0','$champs1','$champs2','$champs3','$champs4',$champs5','$champs6','$champs7','$champs8','$champs9','$champs10','$champs11','$champs12','$champs13','$champs14',$champs15','$champs16','$champs17','$champs18','$champs19','$champs20','$champs21','$champs22','$champs23')");
      $result=$mysqli->query($request);
    }
  }
  fclose($fp);
?>