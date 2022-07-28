<?php
    include 'src/view/Header.php';
?>
<img class="booking" src="/public/assets/images/imagebooking.png"></img>
<section>
<form action="" method="post" >
    <h1>Modifier les options : </h1> <br> <br>
    <div class="mb-3">
    <label for="nbr_luggage">Ajouter un baggage (optionnel)</label>
        <select name="nbr_luggage" id="nbr_luggage">
            <option selected="selected">0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>
    <div class="mb-3">
    <label for="meal">Ajouter un repas (optionnel)</label>
        <select name="meal" id="meal">
            <option selected="selected">0</option>
            <option>1</option>
    </div>
    <div class="button-submit">
        <input type="submit" value="Sauvegarder" name="recherche" id="recherche">
    </div>
</form>
<?php include 'src/view/Footer.php' ?>
</section>




 


