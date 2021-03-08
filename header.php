<?php 
 
  session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style/normalize.css">
    <link rel="stylesheet" type="text/css" href="style/grid.css">
    <link rel="stylesheet" href="style/main.css">

   
    
  <body>
  
 
  <header>
        <nav>
                <h3 class="logo">Gaming Survey</h3>
            <?php if(isset($_SESSION['user_id'])) { ?>
                <ul class="main-nav">
                    <li><a href="index.php">Pocetna</a></li>
                    <li><a href="anketa.php">Anketa</a></li>
                    <li><a href="grafikon.php">Grafikoni</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        <?php }  else if(isset($_SESSION['user_admin'])) { ?>
          <ul class="main-nav">
                    <li><a href="index.php">Pocetna</a></li>
                    <li><a href="anketa.php">Anketa</a></li>
                    <li><a href="grafikon.php">Grafikoni</a></li>
                    <li><a href="administrator.php">Rezultati</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    
                </ul>
        <?php }  else { ?>
              <ul class="main-nav">
                    <li><a href="index.php">Pocetna</a></li>
                    <li><a href="anketa.php">Anketa</a></li>
                    <li><a href="grafikon.php">Grafikoni</a></li>
                    <li><a href="prijava.php">Prijava</a></li>
                    <li><a href="registracija.php">Registracija</a></li>
                    
                </ul>
                <?php } ?>
        </nav>
    </header>
  
    
    
    
  </body>
</html>

