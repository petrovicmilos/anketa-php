<?php 
ob_start();
    include 'header.php';
    include 'db.php';
    
      
    if(isset($_SESSION['user_id']) || isset($_SESSION['user_admin']) || isset($_SESSION['user_email'])){
      
      $stmt = $pdo->prepare('SELECT * FROM odgovori WHERE email = ?');
      
      $stmt->execute([ $_SESSION['user_email']]);
        
        $user = $stmt->fetch();
        $resultCheck = $stmt->rowCount();
        if($resultCheck > 0){
          $error_message = 'Vec ste popunili anketu.';
    
          $_SESSION['error_message'] = $error_message;
          header("Location: index.php?error=anketaPopunjena");
          exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/anketa.css">
    <title>Anketa</title>
</head>
<body>

    <section>
      <div class="row">
      <h2>Anketa</h2>
        <div class="anketa-box">
          
          <?php 
                $sql = 'SELECT * FROM anketa';
                $sql_run = $pdo->query($sql);
                $p = array();
                $i = 1;
                while($row = $sql_run->fetch(PDO::FETCH_OBJ)){
                    $p[$i]=$row;
                    $i++;
                }
                

          echo ' 
                <form method="POST">
          <div class="row">
              <h4>1. '.$p[1]->pitanje.'</h4>
              <input type="radio" name="o1" value="'.$p[1]->odgovor1.'"> <span>'.$p[1]->odgovor1.'</span> <br>
              <input type="radio" name="o1" value="'.$p[1]->odgovor2.'"> <span>'.$p[1]->odgovor2.'</span> <br>
        </div>
        <div class="row">
              <h4>2. '.$p[2]->pitanje.'</h4>
              <input type="radio" name="o2" value="'.$p[2]->odgovor1.'"> <span>'.$p[2]->odgovor1.'</span> <br>
              <input type="radio" name="o2" value="'.$p[2]->odgovor2.'"> <span>'.$p[2]->odgovor2.'</span> <br>
              <input type="radio" name="o2" value="'.$p[2]->odgovor3.'"> <span>'.$p[2]->odgovor3.'</span> <br>
              <input type="radio" name="o2" value="'.$p[2]->odgovor4.'"> <span>'.$p[2]->odgovor4.'</span> <br>
              <input type="radio" name="o2" value="'.$p[2]->odgovor5.'"> <span>'.$p[2]->odgovor5.'</span> <br>
        </div>
        <div class="row">
          <h4>3. '.$p[3]->pitanje.'</h4>
          <input type="checkbox" name="o3[]" value="'.$p[3]->odgovor1.'"> <span>'.$p[3]->odgovor1.'</span> <br>
          <input type="checkbox" name="o3[]" value="'.$p[3]->odgovor2.'"> <span>'.$p[3]->odgovor2.'</span> <br>
          <input type="checkbox" name="o3[]" value="'.$p[3]->odgovor3.'"> <span>'.$p[3]->odgovor3.'</span> <br>
          <input type="checkbox" name="o3[]" value="'.$p[3]->odgovor4.'"> <span>'.$p[3]->odgovor4.'</span> <br>
          <input type="checkbox" name="o3[]" value="'.$p[3]->odgovor5.'"> <span>'.$p[3]->odgovor5.'</span> <br>
        </div>
        <div class="row">
          <h4>4. '.$p[4]->pitanje.'</h4>
          <input type="radio" name="o4" value="'.$p[4]->odgovor1.'"> <span>'.$p[4]->odgovor1.'</span> <br>
          <input type="radio" name="o4" value="'.$p[4]->odgovor2.'"> <span>'.$p[4]->odgovor2.'</span> <br>
          <input type="radio" name="o4" value="'.$p[4]->odgovor3.'"> <span>'.$p[4]->odgovor3.'</span> <br>
          <input type="radio" name="o4" value="'.$p[4]->odgovor4.'"> <span>'.$p[4]->odgovor4.'</span> <br>
        </div>
        <div class="row">
          <h4>5. '.$p[5]->pitanje.'</h4>
          <input type="radio" name="o5" value="'.$p[5]->odgovor1.'"> <span>'.$p[5]->odgovor1.'</span> <br>
          <input type="radio" name="o5" value="'.$p[5]->odgovor2.'"> <span>'.$p[5]->odgovor2.'</span> <br>
          <input type="radio" name="o5" value="'.$p[5]->odgovor3.'"> <span>'.$p[5]->odgovor3.'</span> <br>
        </div>
        <div class="row">
          <h4>6. '.$p[6]->pitanje.'</h4>
          <input type="text" name="o6"><br>
        </div>
        <div class="row">
          <h4>7. '.$p[7]->pitanje.'</h4>
          <input type="radio" name="o7" value="'.$p[7]->odgovor1.'"> <span>'.$p[7]->odgovor1.'</span> <br>
          <input type="radio" name="o7" value="'.$p[7]->odgovor2.'"> <span>'.$p[7]->odgovor2.'</span> <br>
          <input type="radio" name="o7" value="'.$p[7]->odgovor3.'"> <span>'.$p[7]->odgovor3.'</span> <br>
        </div>
        <div class="row">
          <h4>8. '.$p[8]->pitanje.'</h4>
          <input type="text" name="o8"><br>
        </div>
        <div class="row">
          <h4>9. '.$p[9]->pitanje.'</h4>
          <input type="radio" name="o9" value="'.$p[9]->odgovor1.'"> <span>'.$p[9]->odgovor1.'</span> <br>
          <input type="radio" name="o9" value="'.$p[9]->odgovor2.'"> <span>'.$p[9]->odgovor2.'</span> <br>
          <input type="radio" name="o9" value="'.$p[9]->odgovor3.'"> <span>'.$p[9]->odgovor3.'</span> <br>
        </div>
        <div class="row">
          <h4>10. '.$p[10]->pitanje.'</h4>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor1.'"> <span>'.$p[10]->odgovor1.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor2.'"> <span>'.$p[10]->odgovor2.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor3.'"> <span>'.$p[10]->odgovor3.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor4.'"> <span>'.$p[10]->odgovor4.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor5.'"> <span>'.$p[10]->odgovor5.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor6.'"> <span>'.$p[10]->odgovor6.'</span> <br>
          <input type="checkbox" name="od10[]" value="'.$p[10]->odgovor7.'"> <span>'.$p[10]->odgovor7.'</span> <br>
        </div>
        <div class="row">
          <input type="submit" value="Zavrsi" name="zavrsi" id="anketabtn"> 
        </div>
        </form> '; 
       
        

        if (isset($_POST['zavrsi'])){
          $odgovor3 = $_POST['o3'];
          $o3 = implode(",", $odgovor3);
          $odg10 = implode(",",$_POST['od10']);
          if(!empty($_POST['o1']) && !empty($_POST['o2']) && !empty($o3) && !empty($_POST['o4']) && !empty($_POST['o5']) && !empty($_POST['o6']) && !empty($_POST['o7']) && !empty($_POST['o8']) && !empty($_POST['o9']) && !empty($odg10)){
        
          $in = "INSERT INTO odgovori (email, pitanje1, pitanje2, pitanje3, pitanje4, pitanje5, pitanje6, pitanje7, pitanje8, pitanje9, pitanje10) 
                  VALUES ('{$_SESSION['user_email']}','{$_POST['o1']}','{$_POST['o2']}','{$o3}','{$_POST['o4']}','{$_POST['o5']}','{$_POST['o6']}','{$_POST['o7']}','{$_POST['o8']}','{$_POST['o9']}','{$odg10}')";

          $pdo->query($in);
          $success_message = "Uspesno ste popunili anketu";
          $_SESSION['success_message'] = $success_message;
          header("Location: index.php?success=AnketaPopunjena");
          exit();
          } else {
            echo 'Molimo Vas popunite sva polja!';
          }
        }
        ?>
      </div>
  </div>
  </section>


<?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php } else {
    header("Location: index.php?error=notLoggedIn");
    exit();
}