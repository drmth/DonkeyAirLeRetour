<?php
    include dirname(__DIR__) . '/view/Header.php';
?>
    <img class="booking" src="/public/assets/images/imagebooking.png"></img>
    <div class="container-md center">
        <script src="/public/assets/js/animation.js"> </script>
        <h1> Réserver un&nbsp;
            <span class="txt-rotate" data-period="2000" data-rotate='[ "billet", " voyage de rêve"]'></span>
        </h1>
    </div>
    <div class="search-form">
        <div class="container">
            <form action="index" method="post">
                <div class="form-group">
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
                    <name="passenger" id="passenger" required><br> <br>
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
                        </select>
                        <div class="button-submit">
                            <input type="submit" value="Lancer la recherche" name="recherche" id="recherche">
                        </div>
                </div>
            </form>
        </div> <br>  <br>
        <table class="table">
        <thead>
        <tr>
                <th scope="col"><img class="vol" src="public/assets/images/decollage.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/destination.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/schedule.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/number.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/duration.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/euro.png"></th>
        </tr>
        </thead>
<tbody>
<tr>
<form action="update" method="post">
<?php
foreach ($flights as $flight) {
    $flight_id = $flight->id;?>
    <tr>
        <div>
            <td><?php echo $flight->departure_airport; ?></td>
            <td><?php echo $flight->destination_airport; ?></td>
            <td><?php echo $flight->date . '<br>' . $flight->schedule; ?></td>
            <td><?php echo $flight->flight_number; ?></td>
            <td><?php echo $flight->flight_duration; ?></td>
            <td><?php echo $flight->price; ?></td>
            <td><button type="button" class="btn btn-info"><a style="text-decoration: none; color:white" href="add/<?php echo $flight_id  . '-' . $_POST['nbr_luggage'] . '-' . $_POST['meal']; ?>">Réserver</a></button></td>
        </div>
    </tr>
<?php
} ?>
</form>
</table>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
include dirname(__DIR__) . '/view/Footer.php';
?>