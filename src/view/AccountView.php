<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="Images/icons8-student-64.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <?php
    include dirname(__DIR__) . '/view/Header.php';
    ?>
</head>
<body>
    <h2>Mon compte</h2> <br> 
    <table class="table">
        <thead>
        <tr>
                <th scope="col"><img class="vol" src="public/assets/images/date.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/person.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/flight.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/schedule.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/baggage.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/couvert.png"></th>
                <th scope="col"><img class="vol" src="public/assets/images/euro.png"></th>
        </tr>
        </thead>
<tbody>

<tr>
<?php
foreach ($bookingList as $booking) {
    $bookingId = $booking->booking_id;?>
        <tr>
            <div>
                    <td><?php echo $booking->reservation_date; ?></td>
                    <td><?php echo $booking->firstname . '<br>' . $booking->lastname; ?></td>
                    <td><?php echo $booking->departure_airport .'<br>'. $booking->destination_airport; ?></td>
                    <td><?php echo $booking->date . '<br>' . $booking->schedule; ?></td>
                    <td><?php echo $booking->luggage; ?></td>
                    <td><?php echo $booking->meal; ?></td>
                    <td><?php echo $booking->price; ?></td>
                    <td><button type="button" class="btn btn-info"><a style="text-decoration: none; color:white" href="account/update/<?php echo $bookingId; ?>">MODIFIER</a></button></td>
                    <td><button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="account/delete/<?php echo $bookingId; ?>">SUPPRIMER</a></button></td>
            </div>
        </tr>
<?php
} ?>
</table>


 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


<?php
include dirname(__DIR__) . '/view/Footer.php';
?>
</tbody>
</body>
</html>