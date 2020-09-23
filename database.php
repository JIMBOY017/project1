<?php

class database {
    //Mervrouw, ik deed mijn best maar ik kwam niet overal helemaal uit.
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "project1";
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $voornaam = $_POST['name'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $email = $_POST['email'];
            $gebruikersnaam = $_POST['gebruikersnaam'];
            $wachtwoord = $_POST['pwd'];
            $herhaalpwd = $_POST['herhaalpwd'];
        
            $sql = "INSERT INTO persoon (voornaam, tussenvoegsel, achternaam, gebruikersnaam, pwd, herhaalpwd) 
            VALUES (:voornaam, :tussenvoegsel, :achternaam, :gebruikersnaam, :pwd, :herhaalpwd";
        
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['voornaam' => $voornaam, 
            'tussenvoegsel' => $tussenvoegsel, 
            'achternaam' => $achternaam, 
            'email' => $email, 
            'gebruikersnaam' => $gebruikersnaam, 
            'pwd' => $wachtwoord,
            'herhaalpwd' => $herhaalpwd]);
        
        }

    }

}

?>