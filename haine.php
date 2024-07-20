<?php
    session_start();
    if(!isset($_SESSION['username'])){
      header('location:registrare.php');
    }
    $con = mysqli_connect("localhost", "root", "", "proiect");
    $q = "SELECT * FROM produse ORDER BY id";
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
                case "tricouri":
                    $res = "SELECT * FROM produse WHERE denumire = 'Tricou' ORDER BY id";
                    break;
                case "hanorace":
                    $res = "SELECT * FROM produse WHERE denumire = 'Hanorac' ORDER BY id";
                    break;
                case "camasi":
                    $res = "SELECT * FROM produse WHERE denumire = 'Camasa' ORDER BY id";
                    break;
                case "jachete":
                    $res = "SELECT * FROM produse WHERE denumire = 'Jacheta' OR denumire = 'Palton' ORDER BY id";
                    break;
                case "pantaloni":
                    $res = "SELECT * FROM produse WHERE denumire = 'Pantaloni' ORDER BY id";
                    break;
                case "sosete":
                    $res = "SELECT * FROM produse WHERE denumire = 'Sosete' ORDER BY id";
                    break;
                case "incaltaminte":
                    $res = "SELECT * FROM produse WHERE denumire = 'Pantofi' ORDER BY id";
                    break;
                case "accesorii":
                    $res = "SELECT * FROM produse WHERE denumire = 'Parfum' OR denumire = 'Bratara' OR denumire = 'Inel' ORDER BY id";
                    break;
                default:
                    $res = "SELECT * FROM produse ORDER BY id";
                    break;
                }
                $rez = mysqli_query($con, $res);
                while($ser = mysqli_fetch_array($rez)){
                   
                    echo '<div class="articol"><p><h2>'.$ser['denumire'].'</h2><img src="'.$ser['imagine'].'
                      "<br><br><b>Culoare: </b>'.$ser['culoare'].'<br><b>Firma: </b>'.$ser['firma'].'
                      <br><b>Pret: </b>'.$ser['pret'].'</p><br>'; 
                      if($ser['stoc'] == 0){echo '<b>Stoc epuizat!</b>';} else{echo '<b>In stoc</b>';};
                      echo'<br><a href="add-to-cart.php?id='.$ser['id'].'">Adauga in cos!</a></div>';
                    
                    echo "<script>const element = document.getElementById('adauga')
                        element.addEventListener('click', () => {
                            alert('Produsul a fost adaugat in cos!');
                        });</script>";
                }
                
            ?>
        </div>
    </section>
    <script src="javascript/script.js"></script>

</body>
</html>