<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../js.js"></script>
    <meta charset="utf-8" />
    <link rel="icon" href="../ico/logo.ico">
</head>

<body>
    <header>
        <div id="header_str">
            <a href="index.php"><img src="../slike/logo.png" id="glavni_logo" alt="logo sajta" /></a>
        </div>
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

				if($USER['admin']=1){
					$is_mod = true;
				}else{
					$is_mod = false;
				}

				}?>
        <nav>
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
                            <p>Proizvodi</p>
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
                            <p class="selected_text">Login</p>
                    </div></a>
                </li>
                <li>
                    <div><a id="novo" href="izmeni.php">
                            <p>Izmeni</p>
                    </div></a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="telo">
        <form action="reg.php" onsubmit="return registerValidacija()" method="post">
            <h1 style="color:white; text-align: center; margin-top:5px;">Forma za Registraciju</h1>
            <div class="container">
                <label style="color:white;"><b>Ime</b></label>
                <input type="text" placeholder="Ime" name="ime">

                <label style="color:white;"><b>Prezime</b></label>
                <input type="text" placeholder="Prezime" name="prezime">

                <label style="color:white;"><b>Username</b></label>
                <input type="text" placeholder="Username" name="username">

                <label style="color:white;"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password">

                <button type="submit">Register</button>
                <br>
                <a href="loginstrana.php" style="color:white;">Vec imate nalog? Kliknite ovde!</a>
            </div>
        </form>
    </div>
    <footer>
        <div id="footerBlock">
            <div id="footerSection">
                <div class="footerDivide">
                    <p id="footerText">
                        Auto-Plac 013 je firma koja se bavi prodajom<br />
                        polovnih automobila. Ukoliko zelite da prodate<br />
                        neki od vasih automobila, kontaktirajte nas na<br />
                        neku od drustvenih mreza.
                    </p>
                </div>
                <div class="footerDivide">
                    <p id="footerTextIco">
                        <a href="https://www.instagram.com/aleksa_urkom/" target="_blank"><img src="../ico/ig.png"
                                class="ikonice" alt="IG logo" /></a> Instagram<br /><br />
                        <a href="https://www.facebook.com" target="_blank"><img src="../ico/fb.png" class="ikonice"
                                alt="FB logo" /></a> Facebook<br /><br />
                        <a href="https://www.youtube.com" target="_blank"><img src="../ico/yt.png" class="ikonice"
                                alt="YT logo" /></a> YouTube<br /><br />
                    </p>
                </div>
                <div class="cleaner"></div>
            </div>
        </div>
        <p id="footerEndText">Sva prava zadržana &copy; Aleksa Urkom 5029.</p>
    </footer>
</body>

</html>