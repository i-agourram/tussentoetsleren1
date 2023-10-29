<?php
session_start();

$alert = "";

if (isset($_POST['submit'])) {

    if (!empty($_POST['naam']) && !empty($_POST['achternaam']) && !empty($_POST['email']) && !empty($_POST['iphone']) && !empty($_POST['versie']) && !empty($_POST['kleur'])) {
     $naam = $_POST['naam'];
     $achternaam = $_POST['achternaam'];
     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
     $iphone = $_POST['iphone'];
     $versie = $_POST['versie'];
     $kleur = $_POST['kleur'];

     if (!$email) {
         $alert = "Vul een geldige email in.";
     } else {
         $_SESSION['naam'] = $naam;
         $_SESSION['achternaam'] = $achternaam;
         $_SESSION['email'] = $email;
         $_SESSION['iphone'] = $iphone;
         $_SESSION['versie'] = $versie;
         $_SESSION['kleur'] = $kleur;
     }

    } else {
        $alert = "Vul alles in!";
    }
} else {
    $alert = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestel jouw iPhone</title>
</head>
<body>

<?php

if (isset($_SESSION['naam'])) {
    echo "<h1> Uw gegevens </h1>";
    echo "Voornaam: ". $_SESSION['naam'] . "<br>";
    echo "Achternaam: ". $_SESSION['achternaam'] . "<br>";
    echo "email: ". $_SESSION['email'] . "<br>";
    echo "iphone: ". $_SESSION['iphone'] . "<br>";
    echo "versie: ". $_SESSION['versie'] . "<br>";
    echo "kleur: ". $_SESSION['kleur'] . "<br>";
}


?>

<h1>Bestel jouw iPhone</h1>



<form method="POST">
    <label for="naam">Voornaam:</label>
    <input type="naam" name="naam"><br>

    <label for="achternaam">Achternaam:</label>
    <input type="achternaam" name="achternaam"><br>

    <label for="email">E-mailadres:</label>
    <input type="email" name="email"><br>

    <p>Welke iPhone wil je kopen?</p>
    <input type="radio" name="iphone" value="iPhone 11"> iPhone 11<br>
    <input type="radio" name="iphone" value="iPhone 12"> iPhone 12<br>
    <input type="radio" name="iphone" value="iPhone 13"> iPhone 13<br>

    <p>Welke versie wil je kopen?</p>
    <input type="radio" name="versie" value="32GB"> 32GB<br>
    <input type="radio" name="versie" value="64GB"> 64GB<br>
    <input type="radio" name="versie" value="128GB"> 128GB<br>

    <p>Welke kleur wil je?</p>
    <input type="radio" name="kleur" value="Zwart"> Zwart<br>
    <input type="radio" name="kleur" value="Wit"> Wit<br>
    <input type="radio" name="kleur" value="Goud"> Goud<br>

    <input type="submit" name="submit" value="Bestel">


    <?php
    echo "$alert";
    ?>



</form>
</body>
</html>


