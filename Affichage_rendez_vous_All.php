<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion clinique</title>
</head>
<body>
<h2>Tous les rendez_vous patients à votre portée</h2>
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
    $date_rendez_vous = $_POST['date_rendez_vous'];
    $lieu = $_POST['lieu'];
    
}
// Requête SQL pour vérifier l'existence de l'utilisateur
$sql = "SELECT * FROM rendez_vous";
$resultat = $connexion->query($sql);
 // Vérification du résultat de la requête
if ($resultat->num_rows > 0) {
    ?>
    <table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date_day</th>
        <th>date_rendez_vous</th>
        <th>date_prochain_rendez_vous</th>
        <th>lieu</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($row = $resultat->fetch_assoc()) {
        ?>
    <tr>
        <td><?=$row['nom']?></td>
        <td><?=$row['prenom']?></td>
        <td><?=$row['date_day']?></td>
        <td><?=$row['date_rendez_vous']?></td>
        <td><?=$row['date_prochain_rendez_vous']?></td>
        <td><?=$row['lieu']?></td> 
        <td><a href="modifier_rv.php?id=<?=$row['id']?>"><img class="iconesaction" src="icones/icons8-modifier-la-propriété-48.png" alt="" title="modifier"></a></td>
        <td><a href="supprimer_rv.php?id=<?=$row['id']?>"><img class="iconesaction" src="icones/icons8-supprimer-pour-toujours-48.png" alt="" title="supprimer"></a></td><br>
    </tr>
    </table>
    <?php
}
}
else{
    echo"<h3>aucun rendez-vous<h3>";
}
echo "</table>";

?>

</body>
</html>