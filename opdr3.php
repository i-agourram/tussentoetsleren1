<?php
session_start();

include ("databaseconnectie.php");
global $db;
$query = $db ->prepare("SELECT * FROM merk");
$query -> execute();
$result = $query -> fetchAll(PDO:: FETCH_ASSOC);


if (isset($_POST['submit'])) {

    if (!empty($_POST['naam'])) {
        $naam = filter_input(INPUT_POST, "naam", FILTER_SANITIZE_STRING);

            $querySchoen = $db -> prepare("INSERT INTO merk(naam) VALUES (:naam)");
            $querySchoen -> bindParam("naam", $naam);

            if ($querySchoen -> execute()) {
                echo "Het is gelukt!";
            } else {
                echo "er is een fout";
            }



    } else {
        $alert = "Vul iets in!";
    }

} else {
    $alert = "";
}









?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="POST">

    <?php
    foreach ($result as $data){
        ?>
        <?php echo "<br>" . $data['naam'];  ?>

        <?php
    }
    ?>

    <br>
<br>
    Add your shoes
    <br>
    <input type="naam" name="naam">
    <input type="submit" name="submit" value="submit">

    <?php echo $alert ?>

</form>




</body>
</html>
