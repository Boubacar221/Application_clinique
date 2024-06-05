<?php
    $id = $_GET['id'];
    if (isset($_POST['modifier'])){
        if (isset($_POST{'id'})&&
        isset($_POST{'nom'})&&
        isset($_POST{'prenom'})&&
        isset($_POST{'age'})&&
        isset($_POST{'sexe'})&&
        isset($_POST{'poids'})&&
        isset($_POST{'telephone'})&&
        isset($_POST{'domicile'})&&
        isset($_POST{'email'})&&
        $_POST('id') !="" &&
        $_POST('nom') !=="" &&
        $_POST('prenom') !=="" &&
        $_POST('age') !="" &&
        $_POST('sexe') !="" &&
        $_POST('poids') !="" &&
        $_POST('telephone') !="" &&
        $_POST('domicile') !="" &&
        $_POST('email') !=""){
            include_once"affichage_dossiers_All.php";
            extract($_POST);
            $sql = "UPDATE patients SET nom= '$nom', prenom = '$prenom',age = '$age',sexe = '$sexe', poids = '$poids',telephone = '$telephone',domicile = '$domicile', email = '$email' WHERE id = $id";
            if(mysqli_query($connexion, $sql)){
                header("location: affichage_dossiers_All.php");
                } else {
                header("location:affichage_dossiers_All.php?message=Modification echoués");
            }
        }
                else{
                header("location:affichage_dossiers_All.php?message=champs vides");
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion clinique</title>
</head>
<body background>
    
    <?php
    include_once 'affichage_dossiers_All.php';
    $sql = "SELECT * FROM patients WHERE id = $id";
    $resultat = mysqli_query($connexion, $sql);
    while($row = mysqli_fetch_assoc($resultat))
    {
        ?>
        <form class="formajoutpatient" action="" method="post">
            <h1>Modifier le dossier d'un patient</h1>
            Nom : <input type="text" name="nom" value="<?php echo $row['nom']; ?>"><br><br>
            Prénom : <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>"><br><br>
            Age : <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>
            sexe : <input type="text" name="sexe" value="<?php echo $row['sexe']; ?>"><br><br>
            poids : <input type="text" name="poids" value="<?php echo $row['poids']; ?>"><br><br>
            groupe_sangain : <input type="text" name="groupe_sangain" value="<?php echo $row['groupe_sangain']; ?>"><br><br>
            telephone : <input type="number" name="telephone" value="<?php echo $row['telephone']; ?>"><br><br>
            Domicile : <input type="text" name="domicile" value="<?php echo $row['domicile']; ?>"><br><br>
            email : <input type="text" name="email" value="<?php echo $row['email']; ?>"><br><br>
            <input type="submit" value="modifier" name="modifier">
            <button><a href="affichage_dossiers_All.php">Annuler</a></button>


        </form>
<?php

    }

?>
</body>
</html>