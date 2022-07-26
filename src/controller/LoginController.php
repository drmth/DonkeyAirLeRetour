<?php

require_once 'login.html.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    //user_login();
} 

function index()
{
    try {
        global $pdo;
        $email = filter_var(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];

        $query = 'SELECT user_infos.*, user_passwords.mdp 
            FROM user_infos 
            INNER JOIN user_passwords ON user_infos.id = user_passwords.user_id 
            WHERE email = :email';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetchAll();

        if (count($user) == 0) {
            echo "<script>alert('Veuillez vous enregistrer.');</script>";
            return;
        }
        if (count($user) > 1) {
            echo "<script>alert('Veuillez contacter l'administrateur.');</script>";
            return;
        }
        if ($password == $user[0]['mdp']) {
            $_SESSION['userEmail'] = $user[0]["email"];
            $_SESSION['userId'] = $user[0]["id"];
            $cookie_name = "donkey_air_user_id";
            $cookie_value = $user[0]["id"];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header('Location:header.php');
        } else {
            echo "<script>alert('Mot de passe ou mail incorrect.');</script>";
            return;
        }
    } catch (PDOException $e) {
        echo "ERROR!!!: " . $e->getMessage();
    }
}
?>