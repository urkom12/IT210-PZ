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
            $marka = $_POST['marka'];
            $model = $_POST['model'];
            $godiste = $_POST['godiste'];
            $snaga = $_POST['snaga'];
            $kilometri = $_POST['kilometri'];
            $pogon = $_POST['pogon'];
            $zapremina = $_POST['zapremina'];
            $slika = $_POST['slika'];
            $cena = $_POST['cena'];
            $auto_id = $_POST['tvid'];

            if(isset($_POST['marka']) && isset($_POST['model']) && isset($_POST['godiste']) && isset($_POST['snaga']) && isset($_POST['kilometri']) && isset($_POST['pogon']) && isset($_POST['zapremina']) && isset($_POST['slika']) && isset($_POST['cena']) && isset($_POST['tvid'])){
                if(($_POST['marka'] != "") && ($_POST['model'] != "") && ($_POST['godiste'] != "") && ($_POST['snaga'] != "") && ($_POST['kilometri'] != "") && ($_POST['pogon'] != "") && ($_POST['zapremina'] != "") && ($_POST['slika'] != "") && ($_POST['cena'] != "")){
                    $stmt = $con->prepare("UPDATE transportna_vozila SET marka=:marka, model=:model, godiste=:godiste, snaga=:snaga, kilometri=:kilometri, pogon=:pogon, zapremina=:zapremina, slika=:slika, cena=:cena WHERE tvid=:tvid");
                    $stmt->bindParam(":marka", $marka);
                    $stmt->bindParam(":model", $model);
                    $stmt->bindParam(":godiste", $godiste);
                    $stmt->bindParam(":snaga", $snaga);
                    $stmt->bindParam(":kilometri", $kilometri);
                    $stmt->bindParam(":pogon", $pogon);
                    $stmt->bindParam(":zapremina", $zapremina);
                    $stmt->bindParam(":slika", $slika);
                    $stmt->bindParam(":cena", $cena);
                    $stmt->bindParam(":tvid", $tvid);
            
                    $stmt->execute();
                }
            }
        ?>