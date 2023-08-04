<!DOCTYPE html>
<html>

<head>
    <title>Početna stranica</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8" />
    <link rel="icon" href="../ico/logo.ico">
    <script src="../css/js.js"></script>
    <link rel="icon" href="../ico/logo.ico">
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

				if($USER['admin']=1){
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
                            <p class="selected_text">Početna strana</p>
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
    <div class="telo">
            <h2 style="color:white">Lorem ipsum dolor sit amet</h2>
            <p style="color:white">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, 
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="prostor"></div>
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