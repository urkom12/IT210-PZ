<!DOCTYPE html>
<html>
 
<head>
    <title></title>
</head>
 
<body>
    <center>
        <?php
        function povezi2(){
            try {
                $con = new PDO("mysql:host=localhost;dbname=sajt", "root", "aleksaurkom123");
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $con;
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }
        $con = povezi2();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);

        if(isset($_POST['username']) && isset($_POST['password'])){
            $stmt = $con->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
                
            $row = $stmt->fetch();	
            if($row){
                session_start();
                $_SESSION["username"] = $row["username"];
                $_SESSION["ime"] = $row["ime"];
                $_SESSION["userid"] = $row["userid"];
                header('Location: index.php');
            }
            else {
                header('Location: loginstrana.php');
            }
        }
        ?>
    </center>
</body>
 
</html>