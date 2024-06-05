<?php
    $id = $_GET['id'];
    if (isset($_POST['modifier'])){
        if (isset($_POST{'id'})&&
        isset($_POST{'nom'})&&
        isset($_POST{'prenom'})&&
        isset($_POST{'date_day'})&&
        isset($_POST{'date_rendez_vous'})&&
        isset($_POST{'lieu'})&&
        isset($_POST{'date_prochain_rendez_vous'})&&
        $_POST('id') !="" &&
        $_POST('nom') !=="" &&
        $_POST('prenom') !=="" &&
        $_POST('date_day') !="" &&
        $_POST('date_rendez_vous') !="" &&
        $_POST('date_prochain_rendez_vous') !="" &&
        $_POST('lieu') !=""){
            include_once"affichage_rendez_vous_All.php";
            extract($_POST);
            $sql = "UPDATE rendez_vous SET nom= '$nom', prenom = '$prenom',date_day = '$date_day',date_rendez_vous = '$date_rendez_vous',lieu = '$lieu' WHERE id = $id";
            if(mysqli_query($connexion, $sql)){
                header("location: affichage_rendez_vous_All.php");
                } else {
                header("location:affichage_rendez_vous_All.php?message=Modification echoués");
            }
        }
                else{
                header("location:affichage_rendez_vous_All.php?message=champs vides");
            }
        }
        elseif (isset($_POST['ajouter'])){

            include_once"affichage_rendez_vous_All.php";
            extract($_POST);
            $sql = "UPDATE rendez_vous SET date_prochain_rendez_vous = '$date_prochain_rendez_vous' WHERE id = $id";  
            mysqli_query($connexion, $sql);
            echo " Prochain rendez-vous enregistré avec succès! '<br>";
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
    include_once 'affichage_rendez_vous_All.php';
    $sql = "SELECT * FROM rendez_vous WHERE id = $id";
    $resultat = mysqli_query($connexion, $sql);
    while($row = mysqli_fetch_assoc($resultat))
    {
        ?>
        <form class="formajoutpatient" action="" method="post">
            <h1>Modifier le rendez_vous d'un patient</h1>
            Nom : <input type="text" name="nom" value="<?php echo $row['nom']; ?>"><br><br>
            Prénom : <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>"><br><br>
            date_day : <input type="date" name="date_day" value="<?php echo $row['date_day']; ?>"><br><br>
            date_rendez_vous : <input type="date" name="date_rendez_vous" value="<?php echo $row['date_rendez_vous']; ?>"><br><br>
            date_prochain_rendez_vous : <input type="date" name="date_prochain_rendez_vous" value="<?php echo $row['date_prochain_rendez_vous']; ?>"><br><br>
            lieu : <input type="text" name="lieu" value="<?php echo $row['lieu']; ?>"><br><br>
            <input type="submit" value="modifier" name="modifier">
            <input type="submit" value="ajouter" name="ajouter">
            <a href="affichage_rendez_vous_All.php">Annuler</a>
            <!-- <a href="date_prochain_rendez_vous">Ajouter date prochain rendez-vous</a> -->

        </form>
<?php

    }

?>
</body>
</html>