<html>

<head>
    <title>Početna stranica</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8" />
    <link rel="icon" href="../ico/logo.ico">
    <script src="../css/js.js"></script>
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
				if($USER['admin']==1){
					$is_mod = true;
				}
				}
            if(!$_SESSION['username']){
                header('Location: index.php');
                exit(0);
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
                            <p class="selected_text">Izmeni</p>
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
        <div class="div_kontejner centriranje">
            <div id="form_kontejner">
                <form id="forma_1" action="zamenaAuto.php" method="post">
                    <span id="forma_naslov">Dodajte novi automobil!</span>
                    <select name="auto_id" id="opcija">
                        <?php
                            $con = povezi();
                            $stmt = $con->prepare("SELECT * FROM automobili");
                            $stmt->execute();
                            if($is_mod=false){
                                while($row = $stmt->fetch()){
                                    if($_SESSION['userid']==$row['userid']){
                                        echo "<option value=" . $row["auto_id"] .">" . $row["marka"] . " " . $row["model"] . " " .  $row["godiste"] ."</option>";
                                    }
                                }
                            }
                            else{
                                while($row = $stmt->fetch()){
                                    echo "<option value=" . $row["auto_id"] .">" . $row["marka"] . " " . $row["model"] . " " .  $row["godiste"] ."</option>";
                                }
                            }
                            ?>
                    </select>
                    <div>
                        <input type="text" name="marka" id="marka" placeholder="Marka" autofocus />
                    </div>
                    <div>
                        <input type="text" name="model" id="model" placeholder="Model" />
                    </div>
                    <div>
                        <input type="number" name="godiste" id="godiste" placeholder="Godiste" />
                    </div>
                    <div>
                        <input type="number" name="snaga" id="snaga" placeholder="Snaga" />
                    </div>
                    <div>
                        <input type="number" name="kilometri" id="kilometri" placeholder="Predjeni kilometri" />
                    </div>
                    <div>
                        <input type="number" name="zapremina" id="zapremina" placeholder="Zapremina" />
                    </div>
                    <div>
                        <input type="number" name="cena" id="cena" placeholder="Cena" />
                    </div>
                    <div>
                        <select name="pogon" id="opcija">
                            <option value="Dizel">Dizel</option>
                            <option value="Benzin">Benzin</option>
                            <option value="BenzinGas">Benzin + Gas</option>
                        </select>
                    </div>
                    <div>
                        <textarea type="text" name="slika" id="slikacar" placeholder="Link Slike"></textarea>
                    </div>
                    <div>
                        <input value="Izmeni Auto" type="submit" id="dugme_posalji">
                        <button id="dugme_resetuj" type="reset" onclick="obrisi()">Obriši podatke</button>
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