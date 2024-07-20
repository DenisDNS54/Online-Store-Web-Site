<?php
    session_start();
    if(!isset($_SESSION['username'])){
      header('location:registrare.php');
    }
    $con = mysqli_connect("localhost", "root", "", "proiect");
    $q = "SELECT * FROM electronice ORDER BY ide";
    $r = mysqli_query($con, $q) or die(mysqli_error($con));

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
    <link rel="icon" href="images/icon.png"> 
    <title>Black&White</title>
</head>
<body>
<section>
    <div class="header">
      <div class="container">
        <div class="header-main">
          <div class="logo">
             <a href="index.php">Black&White</a>
          </div>
          <div class="open-nav-menu">
            <span></span>
          </div>
          <div class="menu-overlay">
          </div>
           <nav class="nav-menu">
              <div class="close-nav-menu">
                  <img src="images/close.svg" alt="close">
              </div>
              <ul class="menu">
               <li class="menu-item">
                 <a href="index.php">Acasa</a>
               </li>
               <li class="menu-item menu-item-has-children">
                 <a href="#" data-toggle="sub-menu">Electronice <i class="plus"></i></a>
                 <ul class="sub-menu">
                   <li class="menu-item"><a href="electronice.php">Toate produsele</a></li>
                   <li class="menu-item"><a href="electronice.php?laptopuri">Laptop</a></li>
                   <li class="menu-item"><a href="electronice.php?calculatoare">Calculator</a></li>
                   <li class="menu-item"><a href="electronice.php?procesoare">Procesoare</a></li>
                   <li class="menu-item"><a href="electronice.php?surse">Surse</a></li>
                   <li class="menu-item"><a href="electronice.php?periferice">Periferice</a></li>
                   <li class="menu-item"><a href="electronice.php?">Accesori</a></li>
                 </ul>
               </li>
               <li class="menu-item menu-item-has-children">
                 <a href="#" data-toggle="sub-menu">Haine <i class="plus"></i></a>
                 <ul class="sub-menu">
                 <li class="menu-item"><a href="haine.php">Toate produsele</a></li>
                   <li class="menu-item"><a href="haine.php?tricouri">Tricou</a></li>
                   <li class="menu-item"><a href="haine.php?hanorace">Hanorac</a></li>
                   <li class="menu-item"><a href="haine.php?camasi">Camasa</a></li>
                   <li class="menu-item"><a href="haine.php?incaltaminte">Pantofi</a></li>
                   <li class="menu-item"><a href="haine.php?pantaloni">Pantaloni</a></li>
                   <li class="menu-item"><a href="haine.php?accesorii">Accesorii</a></li>
                 </ul>
               </li>
               <li class="menu-item menu-item-has-children">
                 <a href="#" data-toggle="sub-menu">Gym <i class="plus"></i></a>
                 <ul class="sub-menu">
                 <li class="menu-item"><a href="gym.php?">Toate produsele</a></li>
                   <li class="menu-item"><a href="gym.php?gantere">Gantere</a></li>
                   <li class="menu-item"><a href="gym.php?manusi">Manusi</a></li>
                   <li class="menu-item"><a href="gym.php?haltere">Haltere</a></li>
                   <li class="menu-item"><a href="gym.php?accesorii">Accesori</a></li>
                 </ul>
                </li>
               <li class="menu-item">
                  <a href="cos.php">Cos</a>
                </li>
               <li class="menu-item">
                <a href="delogare.php">Delogare</a>
                </li>

              </ul>
          </nav>
      </div>
    </div>
    </div>
      
</section>
    <br>
    <section class="home-section">
        <div class="lista_articole">
<?php
            $link = $_SERVER['REQUEST_URI'];
            $query = parse_url($link, PHP_URL_QUERY);
            switch($query){
                case "laptopuri":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Laptop' ORDER BY ide";
                    break;
                case "calculatoare":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Calculator' ORDER BY ide";
                    break;
                case "periferice":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Periferice' ORDER BY ide";
                    break;
                case "procesoare":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Procesor' OR denumire = 'Palton' ORDER BY ide";
                    break;
                case "surse":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Surse' ORDER BY ide";
                    break;
                /*case "sosete":
                    $res = "SELECT * FROM produse WHERE denumire = 'Sosete' ORDER BY id";
                    break;
                case "incaltaminte":
                    $res = "SELECT * FROM produse WHERE denumire = 'Pantofi' ORDER BY id";
                    break;*/
                case "accesorii":
                    $res = "SELECT * FROM electronice WHERE denumire = 'Pad' OR denumire = 'Casti' OR denumire = 'Ventilator' ORDER BY ide";
                    break;
                default:
                    $res = "SELECT * FROM electronice ORDER BY ide";
                    break;
                }
                $rez = mysqli_query($con, $res);
                while($ser = mysqli_fetch_array($rez)){
                   /* if($ser['denumire'] == "Parfum"){
                        echo '<div class="articol"><p><h2>'.$ser['denumire'].'</h2><img src="'.$ser['imagine'].'
                        "<br><b>Arome: </b>'.$ser['material'].'<br><b>Firma: </b>'.$ser['firma'].'<br><b>Model: </b>'.$ser['detalii'].'<br><b>Pret: </b>'.$ser['pret'].'</p>
                        <br><form action="" method="post">Alegeti cantitatea: <select name="qty" id="qty">';
                        for($i=0; $i<=$ser['stoc']; $i++){echo '<option>'.$i.'</option>';}
                        echo '</select><input type="hidden" name="id" id="id" value='.$res['id'].'><br><input type="submit" class="adauga" name="adauga" id="adauga" value="Adauga in cos!"></form></div>';
                    }*/
                    //else{
                        echo '<div class="articol"><p><h2>'.$ser['denumire'].'</h2><img src="'.$ser['imagine'].'
                        "<br><br><b>Descriere: </b>'.$ser['descriere'].'<br><b>Firma: </b>'.$ser['firma'].'
                        <br><b>Pret: </b>'.$ser['pret'].'</p><br><a href="add-to-cart.php?ide='.$ser['ide'].'">Adauga in cos!</a></div>';
                   // }
                }
            ?>
        </div>
    </section>
    <script src="javascript/script.js"></script>

</body>
</html>