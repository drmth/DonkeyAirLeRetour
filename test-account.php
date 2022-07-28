<?php
include 'src/view/Header.php';
require_once 'DBHandler.php';

session_start();

$sql = 'SELECT bookings.*, flight.*, user.lastname, user.firstname, options.* 
        FROM bookings 
        INNER JOIN flight ON flight.id = bookings.flight_id 
        INNER JOIN users ON user.id = bookings.user_id 
        INNER JOIN options ON options.id = bookings.option_id 
        WHERE user.id = ' . $_COOKIE["donkey_air_user_id"];

$db->getInstance;
$stmt = $db->query($sql);
$bookings = $stmt->fetchAll();

for ($i = 0; $i < count($bookings); $i++) {
    $booking_id = $bookings[$i][0];
    $reservation_date = $bookings[$i]['reservation_date'];
    $flight_id = $bookings[$i]['vol_number'];
    $user_id = $bookings[$i]['id'];
    $lastname = $bookings[$i]['lastname'];
    $firstname = $bookings[$i]['firstname'];
    $option_luggage = $bookings[$i]['luggage'];
    $option_meal = $bookings[$i]['meal'];
}
foreach ($bookingList as $booking) {
    $booking_id = $booking->id;
    $reservation_date = $booking->reservation_date;
    $departure_date = $booking->date;
    $departure_city = $booking->from;
    $arrival_city = $booking->to;
    $schedule = $booking->schedule;
    $flight_id = $booking->flight_id;
    $user_id = $booking->user_id;
    $lastname = $booking->lastname;
    $firstname = $booking->firstname;
    $price = $booking->price;
    $option_luggage = $booking->luggage;
    $option_meal = $booking->meal; ?>
    
    <div>
        <?php echo $reservation_date; ?>
        <?php echo $firstname . '<br>' . $lastname; ?>
        <?php echo $departure_city .'<br>'. $arrival_city; ?>
        <?php echo $departure_date . '<br>' . $schedule; ?>
        <?php echo $option_luggage; ?>
        <?php echo $option_meal; ?>
        <?php echo $price; ?>
        <button type="button" class="btn btn-info"><a style="text-decoration: none; color:white" href="copyupdate.php?updateid=<?php echo $booking_id; ?>">MODIFIER</a></button>
        <button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="delete.php?deleteid=<?php echo $booking_id; ?>">SUPPRIMER</a></button>
    </div>
    
<?php
} ?>

?>