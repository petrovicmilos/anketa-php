<script type="text/javascript" src="js/jquery-1.6.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkBoxAll').click(function() {
			if ($(this).is(":checked"))
				$('.chkCheckBoxId').prop('checked', true);
			else
				$('.chkCheckBoxId').prop('checked', false);
		});
	});
</script>


<?php 
    include_once 'header.php'; 
    include 'db.php';
    
    if(!isset($_SESSION['user_admin'])){
        header("Location: index.php");
        exit();
    }
  
    if(isset($_POST['buttonDelete'])) {
      
      $sql = "DELETE FROM odgovori WHERE email = '".$_POST['email']."'"; 
      $sql_run = $pdo->query($sql);
      
    }

    $sql = 'select * from odgovori';
    $sql_run = $pdo->query($sql);

    

    
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

    
      <div class="row">
      <form class="tabela" method="post" action="administrator.php">
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			<!--<th><input type="checkbox" id="checkBoxAll" /></th>-->
            <th> Obrisi odgovore na anketu datog korisnika:</th>
            <th><center>Učesnik:</center></th>
            <th><center> Pol.. </center></th>
            <th><center>Koliko imate godina?</center></th>
            <th><center>Na kojoj platformi najvise igrate?</center></th>
            <th><center>Koliko sati nedeljno provodite igrajuci video igre...</center></th>
            <th><center>Da li mislite da igranje video igara negativno utice na ponasanje?</center></th>
            <th><center>Objasnite nam zasto mislite da utice ili ne utice na ponasanje..</center></th>
            <th><center>Da li je igranje video igara uticalo na vase performanse na fakultetu/poslu?</center></th>
            <th><center>Objasnite nam kako mislite da je to uticalo na Vas..</center></th>
            <th><center>Da li je igranje video igara uticalo na Vase zdravlje?</center></th>
            <th><center>Otkako igram video igre ja sam..</center></th>
		</tr>
		<tr>
    <?php while($row = $sql_run->fetch()){  ?>
			<td><center><input type="checkbox" class="chkCheckBoxId"
				value="<?php echo $row['email']; ?>" name="email" /></center></td>
			<td><center><?php echo $row['email']; ?></center></td>
			<td><center><?php echo $row['pitanje1']; ?></center></td>
			<td><center><?php echo $row['pitanje2']; ?></center></td>
			<td><center><?php echo $row['pitanje3']; ?></center></td>
			<td><center><?php echo $row['pitanje4']; ?></center></td>
			<td><center><?php echo $row['pitanje5']; ?></center></td>
			<td><center><?php echo $row['pitanje6']; ?></center></td>
			<td><center><?php echo $row['pitanje7']; ?></center></td>
			<td><center><?php echo $row['pitanje8']; ?></center></td>
			<td><center><?php echo $row['pitanje9']; ?></center></td>
			<td><center><?php echo $row['pitanje10']; ?></center></td>
		</tr>
    <?php } ?>
	</table>
	<br>
		<center><input type="submit" class="buttonDelete" name="buttonDelete" value="Izbriši" onclick="return confirm('Da li ste sigurni?')" /></center>

</form>
      </div> 


    <?php include 'footer.php'; ?>
  </body>
</html>
