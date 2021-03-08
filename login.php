<?php 


if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Validacija - Sva polja su obavezna
foreach ($_POST as $key => $value) {
    if (empty($_POST[$key])) {
        //die(var_dump($_POST[$key], $key));
        $error_message = 'Greška! Sva polja su obavezna.';
        break;
    }
}

if (!isset($error_message)) {
    // Validacija - E-mail nije validan.
    if (
        isset($_POST['email'])
        && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        $error_message = 'Greška! E-mail nije validan.';
    }
}

if (!isset($error_message)) {
    // Autentifikacija korisnika.
    if (
        isset($_POST['form-submit']) && !isset($error_message)) {
        require_once('db.php');

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');

        $stmt->execute([ $_POST['email']]);

        $user = $stmt->fetch();
       $passCheck = password_verify($_POST['password'], $user['password']);
       if($passCheck == false){
           session_start();
        $error_message = 'Pogresna lozinka!';
        $_SESSION['error_message'] = $error_message;
        header("Location: prijava.php?error=wrongPassword");
        exit();
        session_unset();

       }
        if ($user && password_verify($_POST['password'], $user['password']))
        {
            $success_message = 'Uspešno ste se prijavili!';
            unset($_POST);
            session_start();
            if($user['admin'] == 1){
                $_SESSION['user_admin'] = $user['admin'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: index.php?success=logged');
                exit();
            } else {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['success_message'] = $success_message;
            header('Location: index.php?success=logged');
            exit();
            }
            
        }
        else {
            if ($stmt->errorCode() == 23000) {
                $error_message = 'Greška! Korisnik sa ovom e-mail adresom već postoji.';
            } else {
                $error_message = 'Greška! Pokušajte ponovo.';
            }
        }
    }
}


 


