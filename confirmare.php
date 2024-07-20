<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "proiect");
    $q = "SELECT * FROM produse ORDER BY id";
    $r = mysqli_query($con, $q) or die(mysqli_error($con));
    $whereIn = implode(',', $_SESSION['cart']);
    $sql = "SELECT * FROM produse WHERE id IN ($whereIn)";
    $res = mysqli_query($con, $sql)  or die(mysqli_error($res));
    while($ser = mysqli_fetch_array($res)){
        $id = $ser['id'];
        $query = "UPDATE produse SET stoc = stoc - 1 WHERE produse.id = '$id'";
        $c = mysqli_query($con, $query);
    }
    $to = "popovicidenis54@yahoo.com";
    $Subject="Comanda Black&White";
    $q3 = "SELECT denumire from produse WHERE id IN ($whereIn)";
    $ser2= mysqli_query($con, $q3) or die(mysqli_error($con));
    $Message="Multumim ca ati Comandat va vom contacta telefonic pentru a confirma comanda";
    $Headers="From: The Sender name <popovicidenis54321@gmail.com>\r\n";
    $Headers.= "Content-type: text/html\r\n";

    mail($to,$Subject,$Message,$Headers);
    
    $_SESSION['cart'] = array();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles2.css">
    <link rel="icon" href="images/icon.png"> 
    <title>Black&White</title>
  </head>
  <body>
    <header class="header">
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
  
      
    </header>
    <section class="home-section">

    </section>
    <script src="javascript/script.js"></script>
  </body>
</html>
