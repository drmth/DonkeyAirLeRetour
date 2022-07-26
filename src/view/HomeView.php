<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <title>Réservations</title>
    <?php
    include dirname(__DIR__) . '/view/Header.php';
    ?>
</head>

<body>
    <img class="booking" src="public/assets/images/imagebooking.png"></img>
    <div class="container-md center">
        <script src="public/assets/js/animation.js"> </script>
        <h1> Réserver un&nbsp;
            <span class="txt-rotate" data-period="2000" data-rotate='[ "billet", " voyage de rêve"]'></span>
        </h1>
    </div>
    <div class="search-form">
        <div class="container">
            <form action="booking.php" method="post">
                <div class="form-group">
                    <label for="aller_retour">Voyage</label>
                    <select name="aller_retour" id="aller_retour">
                        <option selected="selected">Aller-Retour</option>
                        <option selected="selected">Aller simple</option>
                    </select>
                    <label for="nbr_passager">Nombre de passager(s)</label>
                    <select name="nbr_passager" id="nbr_passager">
                        <option selected="selected">1</option>
                        <option>2</option>
                        <option>3</option>
                    </select> <br> <br>
                    <label for="provenance">Ville de départ</label>
                    <select name="departure_airport" id="departure-select" required>
                        <?php foreach ($airports as $airport) { ?>
                            <option value="<?php echo $airport->id; ?>"><?php echo $airport->city . ", " . $airport->country . " " . $airport->IATA; ?></option>
                        <?php } ?>
                    </select>
                    <label for="arrivee">Ville d'arrivée</label>
                    <select name="destination_airport" id="destination-select" required>
                        <?php foreach ($airports as $airport) { ?>
                            <option value="<?php echo $airport->id; ?>"><?php echo $airport->city . ", " . $airport->country . " " . $airport->IATA; ?></option>
                        <?php } ?>
                    </select> <br> <br>
                    <label for="date"> Date de départ </label>
                    <input type="date" name="departure_date" id="date" required>
                    <name="passenger" id="passenger" required>
                        <label for="return_date"> Date de retour </label>
                        <input type="date" name="return_date" id="return_date" required>
                        <name="passenger" id="passenger" required> <br> <br>
                            <label for="nbr_luggage">Ajouter un baggage (optionnel)</label>
                            <select name="nbr_luggage" id="nbr_luggage">
                                <option selected="selected">0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <label for="meal">Ajouter un repas (optionnel)</label>
                            <select name="meal" id="meal">
                                <option selected="selected">0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div class="button-submit">
                                <input type="submit" value="Lancer la recherche" name="recherche" id="recherche">
                            </div>
                </div>
            </form>
        </div>
    </div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
include dirname(__DIR__) . '/view/Footer.php';
?>

</html>