<?php include_once 'header.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registracija</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/registration.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="login-box">
    
        <form class="login-form" action="login.php" method="POST">
        <?php if(isset($_SESSION['error_message'])){ ?>
          <p><?php echo $_SESSION['error_message']; unset($_SESSION['success_message']);?></p>
       <?php }  ?>
       <?php if(isset($_SESSION['success_message'])){ ?>
          <p><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']);?></p>
       <?php }  ?>
                <h3>Prijava</h3>
               
                <input name="email" type="email" placeholder="E-mail" required> <br><br>
                <input name="password" type="password" placeholder="Lozinka" required> <br><br>
                <input type="submit" class="signup-btn" name="form-submit" value="Prijavi se"> <br> <br>
                <p>Nemate nalog? <a href="registracija.php">Registrujte se.</a></p>
        </form>
    </div>
   
 
    <footer class="footer">
            
              <p>Copyright &copy; Milos Petrovic. All rights reserved.</p>
              
          </footer>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>