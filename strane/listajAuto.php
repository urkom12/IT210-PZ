<html>

<head>
    <title>Početna stranica</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8" />
    <link rel="icon" href="../ico/logo.ico">
    <script src="../js.js"></script>
</head>

<body>

    <header>
        <?php
            session_start();
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
            povezi();

            $is_mod = false;
            $con = povezi();
            $stmt = $con->prepare('SELECT * FROM users WHERE username=:username');
            $stmt->bindParam(":username", $_SESSION['username']);

            $stmt->execute();
            $USER = $stmt->fetch();



            if($USER){

            if($USER['admin']){
                $is_mod = true;
            }else{
                $is_mod = false;
            }

            }?>
        <nav>
            <div id="header_str">
                <a href="index.php"><img src="../slike/logo.png" id="glavni_logo" alt="logo sajta" /></a>
            </div>
            <ul>
                <li>
                    <a href="index.php">
                        <div>
                            <p>Početna strana</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="proizvodi.php">
                        <div>
                            <p class="selected_text">Proizvodi</p>
                        </div>
                    </a>
                </li>
                <li>
                    <div><a href="kontakt.php">
                            <p>Kontakt</p>
                    </div></a>
                </li>
                <li>
                    <div><a href="o_kompaniji.php">
                            <p>O kompaniji</p>
                    </div></a>
                </li>
                <li>
                    <div><a href="loginstrana.php">
                            <p>Login</p>
                    </div></a>
                </li>
                <li>
                    <div><a id="novo" href="dodaj.php">
                            <p>Dodaj</p>
                    </div></a>
                </li>
                <li>
                    <div><a id="novo" href="izmeni.php">
                            <p>Izmeni</p>
                    </div></a>
                </li>
                <?php 
                    if($USER){
                        if($USER['ime'] != ''){
                            echo "<li><a href='logout.php' style='color:white; margin-left:440px;'>Odjavi se - " . $USER['ime'] . "</a></li>";
                        }
                        else{
                            echo "<li><a href='loginstrana.php'>Login</a></li>";
                        }
                    }
            ?>
            </ul>
        </nav>
    </header>
    <?php
    if (!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    $con = povezi();

    $sql = "SELECT * FROM automobili";
    $result = $con->query($sql);
    echo "<center><h2 style='margin: 30px 0px 30px 0px'>Trenutne ponude automobila</h2></center><br> <p style='font-size:20px; color:white; display:block; text-align:center; margin-bottom:50px;'>Klikom na sliku automobila radite rezervaciju vozila.</p>";
    while ($row = $result->fetch()) {
        echo "<div style='margin-left:50px; display:inline-block;'>
                <ul style='list-style:none;'>
                    <li>
                        <div>
                            <img src='" . $row["slika"] . "' alt='" . $row["marka"] ."' style='width:250px; height:200px;' />
                        </div>
                        <div>
                            <h3>" . $row["marka"] ."</h3>
                            <p class='tekstauta'>" . $row["model"] ." </p>
                            <p class='tekstauta'>" . $row["godiste"] .". godiste</p>
                            <p class='tekstauta'>" . $row["snaga"] ." ks</p>
                            <p class='tekstauta'>" . $row["kilometri"] ." km</p>
                            <p class='tekstauta'>" . $row["pogon"] ." </p>
                            <p class='tekstauta'>" . $row["zapremina"] ." cc</p>
                            <p class='tekstauta'>" . $row["cena"] ." €</p>
                        </div>
                    </li>
                </ul>
            </div>";
    }
?>
</body>

</html>