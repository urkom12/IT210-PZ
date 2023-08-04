<!DOCTYPE html>
<html>

<head>
    <title>Proizvodi</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../css/js.js"></script>
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
            }
                ?>
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
							echo "<li><a href='logout.php' style='color:white; margin-left:440px'>Odjavi se - " . $USER['ime'] . "</a></li>";
						}
						else{
							echo "<li><a href='loginstrana.php'>Login</a></li>";
						}
                    }
			?>
            </ul>
        </nav>
    </header>
    <style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
    </style>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="listajAuto.php">Automobili</a>
        <a href="listajMotor.php">Motori</a>
        <a href="listajTvozilo.php">Transportna vozila</a>
    </div>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Lista</span>

    <div class="telo">
        <h1 class="naslov">//Proizvodi</h1>
        <hr />
        <div class="div_kontejner">
            <div class="blok_lista1">
                <p class="paragraf">
                </p>
            </div>
        </div>
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