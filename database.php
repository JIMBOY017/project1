<?php

class database {
    
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    function __construct($servername, $username, $password, $dbname, $charset) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->charset = $charset;

        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
        
    }

public function addAccount($voornaam, $tussenvoegsel, $achternaam, $email, $gebruikersnaam, $wachtwoord) {

            $voornaam = $_POST['name'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $email = $_POST['email'];
            $gebruikersnaam = $_POST['gebruikersnaam'];
            $wachtwoord = $_POST['pwd'];
            $herhaalpwd = $_POST['herhaalpwd'];
        
            $sql = "INSERT INTO persoon (voornaam, tussenvoegsel, achternaam, gebruikersnaam, pwd, herhaalpwd) 
            VALUES (:voornaam, :tussenvoegsel, :achternaam, :gebruikersnaam, :pwd, :herhaalpwd)";
        
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['voornaam' => $voornaam, 
            'tussenvoegsel' => $tussenvoegsel, 
            'achternaam' => $achternaam, 
            'email' => $email, 
            'gebruikersnaam' => $gebruikersnaam, 
            'pwd' => $wachtwoord,
            'herhaalpwd' => $herhaalpwd]);

}

function insertAccount($email, $password) {
    $sql = "INSERT INTO account ('email', 'password') VALUES (?, ?, ?)";

    $stmt = $this->db->$pdo->prepare($sql);
    $stmt->execute([null, $email, $password]);
}

}

?>