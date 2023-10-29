    <?php


    $resultaat = "";

    if (isset($_POST['submit'])) {

        if (!empty($_POST['product']) && !empty($_POST['aantal'])) {
            $product = $_POST['product'];
            $aantal = filter_input(INPUT_POST, 'aantal', FILTER_VALIDATE_INT);

            if (!$aantal) {
                $resultaat = "U heeft geen cijfer ingevuld";
            } else {

                $prijzen = [
                    'handdoek' => 22,
                    'broek' => 17,
                    'shirt' => 10
                ];

                $kortingen = [
                    'handdoek' => 0.20,
                    'broek' => 0.30,
                    'shirt' => 0.50
                ];


                $prijs_voor_korting = $prijzen[$product] * $aantal;
                $korting_bedrag = $prijs_voor_korting * $kortingen[$product];
                $prijs_na_korting = $prijs_voor_korting - $korting_bedrag;

                $resultaat = "Prijs voor korting: €" . number_format($prijs_voor_korting, 2) . "<br>";
                $resultaat .= "Totaal prijs voor ". "$aantal "  ."$product(en) is " . number_format($prijs_na_korting, 2) . " euro" . "<br>";

            }

        } else {
            $resultaat = "Vul alles in!";
        }

    } else {
        $resultaat = "";
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>HEMA Kortingscalculator</title>
    </head>
    <body>
    <h1>HEMA Kortingscalculator</h1>
    <form method="POST">
        <label for="product">Kies een product:</label><br>
        <input type="radio" name="product" value="handdoek"> Handdoek<br>
        <input type="radio" name="product" value="broek"> Broek<br>
        <input type="radio" name="product" value="shirt"> Shirt<br>

        <label for="aantal">Voer het aantal in:</label>
        <input type="aantal" name="aantal"><br>

        <input type="submit" value="Bereken korting" name="submit">
    </form>

    <?php echo $resultaat; ?>

    </body>
    </html>


