<?php
    $id = $_GET['id'];
    if (isset($_POST['modifier'])){
        if (isset($_POST{'id'})&&
        isset($_POST{'nom'})&&
        isset($_POST{'prenom'})&&
        isset($_POST{'date_day'})&&
        isset($_POST{'date_analyse'})&&
        isset($_POST{'analyse_prescrite'})&&
        $_POST('id') !="" &&
        $_POST('nom') !=="" &&
        $_POST('prenom') !=="" &&
        $_POST('date_day') !="" &&
        $_POST('date_analyse') !="" &&
        $_POST('analyse_prescrite') !=""){
            include_once"affichage_analyses.php";
            extract($_POST);
            $sql = "UPDATE rendez_vous SET nom= '$nom', prenom = '$prenom',date_day = '$date_day',date_analyse = '$date_analyse',analyse_prescrite = '$analyse_prescrite' WHERE id = $id";
            if(mysqli_query($connexion, $sql)){
                header("location: affichage_analyses.php");
                } else {
                header("location:affichage_analyses.php?message=Modification echoués");
            }
        }
                else{
                header("location:affichage_analyses.php?message=champs vides");
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
    include_once 'affichage_analyses.php';
    $sql = "SELECT * FROM analyse_medicale WHERE id = $id";
    $resultat = mysqli_query($connexion, $sql);
    while($row = mysqli_fetch_assoc($resultat))
    {
        ?>
        <form class="formajoutpatient" action="" method="post">
            <h1>Modifier le rendez_vous d'un patient</h1>
            Nom : <input type="text" name="nom" value="<?php echo $row['nom']; ?>"><br><br>
            Prénom : <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>"><br><br>
            date_day : <input type="date" name="date_day" value="<?php echo $row['date_day']; ?>"><br><br>
            date_analyse : <input type="date" name="date_analyse" value="<?php echo $row['date_analyse']; ?>"><br><br>
            analyse_prescrite : <input type="text" name="analyse_prescrite" value="<?php echo $row['analyse_prescrite']; ?>"><br><br>
            <input type="submit" value="modifier" name="modifier">
            <a href="affichage_analyses.php">Annuler</a>
        </form>
<?php
    }

?>
</body>
</html>