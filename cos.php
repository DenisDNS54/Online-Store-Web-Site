<?php
    session_start();
    if(!isset($_SESSION['username'])){
      header('location:registrare.php');
    }
   
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['type'] = array();
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
                   <li class="menu-item"><a href="?tricou">Tricou</a></li>
                   <li class="menu-item"><a href="?hanorac">Hanorac</a></li>
                   <li class="menu-item"><a href="?camasa">Camasa</a></li>
                   <li class="menu-item"><a href="?pantofi">Pantofi</a></li>
                   <li class="menu-item"><a href="?pantaloni">Pantaloni</a></li>
                   <li class="menu-item"><a href="?accesori">Accesorii</a></li>
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
    <section class="home-section2">
    <div class="lista_articole">
    <?php 
        $totalcos = 0;
        if($_SESSION['cart']){
            $whereIn = implode(',', $_SESSION['cart']);
            $sql = "SELECT * FROM produse WHERE id IN ($whereIn)";
            $res = mysqli_query($con, $sql);
            while($ser = mysqli_fetch_array($res)){
              echo '<div class="articol"><p><h2>'.$ser['denumire'].'</h2><img src="'.$ser['imagine'].'
              "<br><br><b>Culoare: </b>'.$ser['culoare'].'<br><b>Firma: </b>'.$ser['firma'].'
              <br><b>Pret: </b>'.$ser['pret'].'</p><br>'; 
              if($ser['stoc'] == 0){echo '<b>Stoc epuizat!</b>';} else{echo '<b>In stoc</b>';};
              echo'<br><a href="remove-from-cart.php?id='.$ser['id'].'">Sterge din cos!</a></div>';
            
              echo "<script>const element = document.getElementById('adauga')
                element.addEventListener('click', () => {
                    alert('Produsul a fost sters din cos!');
                });</script>";
                
                $totalcos += $ser['pret'];
              }
        }
        else echo "<h2 class='cos-gol'>Cosul este gol!</h2>";
    ?>
    </div>
    <div class='total_cos'>
      <div class='container'>
        <?php 
        if($totalcos != 0){
            echo "<h3 style='color: white'>Total: $totalcos lei </h3><br>"; 
            echo '<form action="confirmare.php" method="post">
            <br><a href="confirmare.php?id='.$ser['id'].'">Plaseaza comanda!</a>
            </form>';
          }
          ?>
      </div>
    </div>
    </section>
    <script src="javascript/script.js"></script>

</body>
</html>