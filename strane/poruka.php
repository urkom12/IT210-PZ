<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
        function povezi(){
            try {
                $con = new PDO("mysql:host=localhost;dbname=sajt", "root", "aleksaurkom123");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $con;
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }
        session_start();
        $con = povezi();
        if(isset($_POST['Ime']) && isset($_POST['Naslov']) && isset($_POST['Broj_Telefona']) && isset($_POST['Opcija']) && isset($_POST['Poruka'])  && isset($_POST['userid'])){
            if(($_POST['Ime'] != "") && ($_POST['Naslov'] != "") && ($_POST['Broj_Telefona'] != "") && ($_POST['Opcija'] != "") && ($_POST['Poruka'] != "")){
                $Ime = $_POST['Ime'];
                $Naslov = $_POST['Naslov'];
                $Broj_Telefona = $_POST['Broj_Telefona'];
                $Opcija = $_POST['Opcija'];
                $Poruka = $_POST['Poruka'];
                $userid = $_SESSION['userid'];

                $stmt = $con->prepare("INSERT INTO forma (Ime, Naslov, Broj_Telefona, Opcija, Poruka, userid) VALUES (:Ime, :Naslov, :Broj_Telefona, :Opcija, :Poruka, :userid)");
                $stmt->bindParam(":Ime", $Ime);
                $stmt->bindParam(":Naslov", $Naslov);
                $stmt->bindParam(":Broj_Telefona", $Broj_Telefona);
                $stmt->bindParam(":Opcija", $Opcija);
                $stmt->bindParam(":Poruka", $Poruka);
                $stmt->bindParam(":userid", $userid);

                $stmt->execute();
            }
        }
        header('Location: kontakt.php')
        ?>
    </center>
</body>
 
</html>