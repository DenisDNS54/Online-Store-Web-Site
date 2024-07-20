<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'proiect');
    error_reporting(0);
    if(isset($_SESSION['username'])){
        header('location:index.php');
    }
    if(isset($_POST['sign-up'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $parola = md5($_POST['parola']);
        $cparola = md5($_POST['cparola']);
        if($parola == $cparola){
            $s = "SELECT * FROM utilizator WHERE username = '$username'";
            $res = mysqli_query($con, $s);
            $num = mysqli_num_rows($res);
            if($num == 1){
                echo "<script>alert('Username-ul folosit!')</script>";
            }
            else{
                $q = "INSERT INTO utilizator(username, email, parola) VALUES ('$username', '$email', '$parola')";
                $result = mysqli_query($con, $q);
                if($result)
                    echo "<script>alert('V-ati inregistrat cu succes!')</script>";
                else
                    echo "<script>alert('Ne pare rau, a intervenit o problema!')</script>";
            }
        }
        else{
            echo "<script>alert('Parolele nu sunt identice!')</script>";
        }
    }
    if(isset($_POST['log-in'])){
        $username = $_POST['username'];
        $parola = md5($_POST['parola']);
        $s = "SELECT * FROM utilizator WHERE username = '$username' AND parola = '$parola'";
        $res = mysqli_query($con, $s);
        $num = mysqli_num_rows($res);
        if($num > 0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("location:index.php");
        }
        else{
            echo "<script>alert('Username-ul sau parola sunt incorecte!')</script>";
        }
    }
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/icon.png">
    <title>Black&White-Registration</title>
</head>
<body>
<header class="header">
    <div class="account-container">
        <div class="login-signup">
            <h2 class="title">Log In</h2>
            <table>
                <form action="" method="POST">
                <tr><td>Username: </td><td><input type="text" name="username" required></td></tr>
                <tr><td>Parola: </td><td><input type="password" name="parola" required></td></tr>
                <tr><td><input type="submit" name="log-in" value="Log In"></td></tr>
                </form>
            </table>
        </div>
        <div class="login-signup">
            <h2>Sign Up</h2>
            <table>
                <form action="" method="POST">
                    <tr><td>Username: </td><td><input type="text" name="username" required></td></tr>
                    <tr><td>Email: </td><td><input type="email" name="email" required></td></tr>
                    <tr><td>Parola: </td><td><input type="password" name="parola" required></td></tr>
                    <tr><td>Confirma parola: </td><td><input type="password" name="cparola" required></td></tr>
                    <tr><td><input type="submit" name="sign-up" value="Sign Up"></td></tr>
                </form>
            </table>
        </div>
    </div>
</header>
    <section class="home-section">

    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
