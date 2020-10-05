<?php

//Er is op een of andere manier nog geen database connectie, maar ik probeerde de opdracht zo goed mogelijk te maken.
include_once 'database.php';
    
$fieldnames = array("name", "achternaam", "email", "gebruikersnaam", "pwd");
$error = false;

foreach ($fieldnames as $value) {
    if (!isset($POST[$value]) || empty($_POST[$value])) {
        $error = true;
    } else {
        echo $error;
    }
}

if (!$error) {
    $object = new database('localhost', 'root', '', 'project1', 'utf8');

    $voornaam = $_POST["name"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["pwd"];
    $herhaalpwd = $_POST["herhaalpwd"];

    $object->addAccount($voornaam, $tussenvoegsel, $achternaam, $email, $gebruikersnaam, $wachtwoord);
}

?>

<html>
    <body>

        <!-- Homepage.php bestaat niet -->
        <form action="database.php" method="post">
            Voornaam: <input type="text" name="name" required><br>
            Tussenvoegsel: <input type="text" name="tussenvoegsel"><br>
            Achternaam: <input type="text" name="achternaam" required><br>
            E-mail: <input type="text" name="email" required><br>
            Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
            Wachtwoord: <input type="password" name="pwd" required><br>
            Herhaal wachtwoord: <input type="password" name="herhaalpwd" required><br>
            <input type="submit" value="Registreer">
        </form>

    </body>
</html>