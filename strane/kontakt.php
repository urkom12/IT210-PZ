<!DOCTYPE html>
<html>

<head>
    <title>Kontakt</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../js.js"></script>
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
                            <p class="selected_text">Kontakt</p>
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
    <div class="telo" id="kontakt_stranica">
        <h1 class="naslov">//KONTAKT</h1>
        <hr />
        <div class="div_kontejner centriranje">
            <div id="form_kontejner">
                <form id="forma_1" action="poruka.php" method="post">
                    <span id="forma_naslov">Kontaktirajte nas!</span>
                    <div>
                        <input type="text" name="Ime" id="ime_i_prezime" placeholder="Ime" autofocus />
                    </div>
                    <div>
                        <input type="text" name="Naslov" id="naslov_poruke" placeholder="Naslov" />
                    </div>
                    <div>
                        <input type="text" name="Broj_Telefona" id="broj_telefona" placeholder="Broj Telefona" />
                    </div>
                    <div>
                        <select name="Opcija" id="opcija">
                            <option value="Pitanje">Pitanje</option>
                            <option value="Sugestija">Sugestija</option>
                            <option value="Prodaja">Prodaja</option>
                        </select>
                    </div>
                    <div>
                        <textarea id="textarea" placeholder="Vaša poruka" name="Poruka"></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="userid" value="<?php
                        echo $_SESSION["userid"];?>">
                    </div>
                    <div>
                        <input value="Posalji Poruku" type="submit" id="dugme_posalji">
                        <button id="dugme_resetuj" onclick="obrisi()">Obriši podatke</button>
                    </div>
                </form>
            </div>
        </div>
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