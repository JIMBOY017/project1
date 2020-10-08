<?php
//De database connectie werkt alleen als ik alles uit de class haal. Nu staat alles in de class en is opeens de verbinding weg.
class database {

private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "project1";

public $voornaam = $_POST['name'];

function __construct($servername, $username, $password, $dbname, $charset) {
  $this->servername = $servername;
  $this->username = $username;
  $this->password = $password;
  $this->dbname = $dbname;
  $this->charset = $charset;  

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO account(gebruikersnaam, email, password) 
    VALUES ('$gebruikersnaam', '$email', '$wachtwoord');

    INSERT INTO persoon(voornaam, tussenvoegsel, achternaam) 
    VALUES ('$voornaam', '$tussenvoegsel', '$achternaam');
    ";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
    echo /*$sql .*/ "<br>" . $e->getMessage();
    }
    //
    $conn = null;
    }
    
}

/*class database {
    
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

        $voornaam = $_POST['name'];
    }

}*/

?>