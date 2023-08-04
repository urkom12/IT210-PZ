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
	$con = povezi();

	if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['username']) && isset($_POST['password'])){
		if(($_POST['ime'] != "") && ($_POST['prezime'] != "") && ($_POST['username'] != "") && ($_POST['password'] != "")){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);
			$ime = $_POST['ime'];
			$prezime = $_POST['prezime'];
	
			$stmt = $con->prepare("INSERT INTO users (username, password, ime, prezime, admin) VALUES (:username, :password, :ime, :prezime, 0)");
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":password", $password);
			$stmt->bindParam(":ime", $ime);
			$stmt->bindParam(":prezime", $prezime);
	
			$stmt->execute();
			header('Location: loginstrana.php');
		}
		else{
			header('Location: loginstrana.php');
		}
	}
?>