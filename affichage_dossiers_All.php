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
    <h2>Information sur Nos patients</h2>
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
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];
            $poids = $_POST['poids'];
            $groupe_sangain = $_POST['groupe_sangain'];
            $telephone = $_POST['telephone'];
            $domicile = $_POST['domicile'];
            $email = $_POST['email'];
            
        }
        
        
        $sql = "SELECT * FROM patients";
        $resultat = $connexion->query($sql);
         // Vérification du résultat de la requête
    if ($resultat->num_rows > 0) {
        ?>
        <table>
        <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>age</th>
                <th>sexe</th>
                <th>poids</th>
                <th>groupe_sangain</th>
                <th>telephone</th>
                <th>domicile</th>
                <th>email</th>
                <th>Actions</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultat)) {
    
        ?>
        <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['prenom']?></td>
        <td><?=$row['age']?></td>
        <td><?=$row['sexe']?></td>
        <td><?=$row['poids']?></td>
        <td><?=$row['groupe_sangain']?></td>
        <td><?=$row['telephone']?></td>
        <td><?=$row['domicile']?></td>
        <td><?=$row['email']?></td>
        <td class="icones"><a href="modifier_dossier.php?id=<?=$row['id']?>"><img src="icones/icons8-modifier-la-propriété-48.png" alt="" title="modifier"></a></td>
        <td class="icones"><a href="supprimer_dossier.php?id=<?=$row['id']?>"><img src="icones/icons8-supprimer-pour-toujours-48.png" alt="" title="supprimer"></a></td><br>
        </tr>
        </table>
        <?php
        
        }
    } else{
        echo "aucun patient trouvé";
    }
    echo "</table>";
    
?>
</body>
</html>

