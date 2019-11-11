
<div>
	<h1 align="center">Table des produits</h1>
	<table border="1" align="center">
        <style>
            .lignecoloree {
                background-color:#CC0033;
            }
            .lignenormale {
                background-color:#33FFCC;
            }
        </style>
        <?php
        $mysqli = new mysqli("localhost", "root", "", "gestion_stock");
    
        //Exemple de select avec mySQLi
        $reqSeuil = $mysqli->query("SELECT* FROM produit");
            echo "<tr>
                <th>Designation</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Quantité Seuil</th>											
            </tr>";
            while($dnseuil = mysqli_fetch_array($reqSeuil)){
            $classe=isset($dnseuil['designation']) && $dnseuil['quantite']<=$dnseuil['quantite_seuil'] ? 'lignecoloree' : 'lignenormale';?>
            <tr class="<?php echo $classe; ?>">
                <td><?php echo $dnseuil['designation']; ?></td>
                <td><?php echo $dnseuil['pu']; ?></td>
                <td><?php echo $dnseuil['quantite']; ?></td>
                <td><?php echo $dnseuil['quantite_seuil']; ?></td>
            </tr>
        <?php 
    } ?>
 
	</table>
 
</div>