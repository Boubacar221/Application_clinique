<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion clinique</title>
</head>
<body>
    <a class="retour" href="gestion_dossier_patient.php">Retour</a>
    <h2>Information sur Les analyses patients</h2>
<?php
        $serveur = "localhost";
        $utilisateur = "root";
        $motDePasse = "";
        $nomDeLaBase = "clinique"; 
        $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomDeLaBase);
        
        if (!$connexion) {
            die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        }
        if (isset($_POST[''])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_day = $_POST['date_day'];
            $date_analyse = $_POST['date_analyse'];
            $analyse_prescrite = $_POST['analyse_prescrite'];
            
        }
        
        
        $sql = "SELECT * FROM analyse_medicale";
        $resultat = $connexion->query($sql);
         // Vérification du résultat de la requête
    if ($resultat->num_rows > 0) {
        ?>
        <table>
        <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>date_day</th>
                <th>date_analyse</th>
                <th>analyse_prescrite</th>
                <th>Actions</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultat)) {
    
        ?>
        <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['prenom']?></td>
        <td><?=$row['date_day']?></td>
        <td><?=$row['date_analyse']?></td>
        <td><?=$row['analyse_prescrite']?></td>
        <td class="icones"><a href="modifier_analyse.php?id=<?=$row['id']?>"><img src="icones/icons8-modifier-la-propriété-48.png" alt="" title="modifier"></a></td>
        <td class="icones"><a href="supprimer_analyse.php?id=<?=$row['id']?>"><img src="icones/icons8-supprimer-pour-toujours-48.png" alt="" title="supprimer"></a></td><br>
        </tr>
        </table>
        <?php
        
        }
    } else{
        echo "aucune information analyses patient trouvé";
    }
    echo "</table>";
    
?>
</body>
</html>

