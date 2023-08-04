<!DOCTYPE html>
<html>

<head>
    <title>O kompaniji</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8" />
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
                            <p class="selected_text">O kompaniji</p>
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
        <h1 class="naslov">//O KOMPANIJI</h1></br>
        <p class="paragraf">
            Auto-Plac 013 je firma koja se bavi prodajom polovnih automobila.</br>
            Nas plac je lociran u Pancevu, na adresi: Bavaništanski put, Pančevo.</br>
            Nasa firma se bavi prodajom automobila uspesno vec 20 godina unazad.</br>

        </p>
        <div id="mapa"><iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.602900890643!2d20.700216251538617!3d44.870378278995766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7f7314bab7bb%3A0x1bece6c3790d1fbf!2sBavani%C5%A1tanski%20Put%2C%20Pan%C4%8Devo!5e0!3m2!1sen!2srs!4v1643634289197!5m2!1sen!2srs"
                width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
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