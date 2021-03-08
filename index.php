<?php

include 'header.php'; 

 if(isset($_GET['error'])){
   if($_GET['error'] == "notLoggedIn"){ 
  echo '<script> alert("Morate biti ulogovani da bi videli anketu!"); </script>';
   } 
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Gaming Survey</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,700i&display=swap" rel="stylesheet">
 </head>
  <body>

  <?php  if(isset($_SESSION['error_message'])){ ?>

    <section class="sadrzaj"> 
          
          <p>
          <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']);?><br><br>

          </p>
    
      </section>

  <?php  } ?>

  <?php  if(isset($_SESSION['success_message'])){ ?>

<section class="sadrzaj"> 
      
      <p>
      <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']);?><br><br>

      </p>

  </section>

<?php  } ?>
 
  <?php  if(isset($_SESSION['user_admin'])){ ?>

    <section class="sadrzaj"> 
        <h2>Dobrodošli na Gaming anketu</h2>
          
          <p>
          Dobrodošli admin. <br><br>

          </p>
    
      </section>

  <?php  } else if(isset($_SESSION['user_id'])){  ?>  

    <section class="sadrzaj"> 
        <h2>Dobrodošli na Gaming anketu</h2>
          <p>
          Dobrodošli <?php echo $_SESSION['user_name'] . "."; ?> <br><br>

      Idite na Anketa kako bi popunili anketu, ili na grafikone kako bi ste videli rezultate ankete.
          </p>
    
      </section>

  <?php } else {  ?>
      <section class="sadrzaj"> 
        <h2>Dobrodošli na Gaming anketu</h2>
          <p>
          Sajt je napravljen kao projekat za predmet "Veb Programiranje" i namenjen je pregledu ankete i popunjavanju iste nakon registracije / prijave. <br><br>

<a class="indexLink" href="prijava.php">Prijavite se</a> kako bi ste popunili anketu. <br><br> Ukoliko niste prijavljeni, <a class="indexLink" href="registracija.php">registrujte se</a>.
          </p>
    
      </section>
  <?php } ?>
      <?php  include 'footer.php'; ?>
      
  </body>

     
  
</html>