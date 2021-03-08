<?php

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}

// Validacija - Sva polja su obavezna
foreach ($_POST as $key => $value) {
    if (empty($_POST[$key])) {
        //die(var_dump($_POST[$key], $key));
        
        $error_message = 'Greška! Sva polja su obavezna.';
        session_start();
        $_SESSION['error_message'] = $error_message;
        header("Location: registracija.php");
        exit();
    }
}

if (!isset($error_message)) {
    if (
        isset($_POST['name'])
        && !preg_match("/^[a-zA-Z0-9]*$/",$_POST['name'])
    ) {
        $error_message = 'Greška! Ime i prezime nisu validni!';
        session_start();
        $_SESSION['error_message'] = $error_message;
        header("Location: registracija.php?error=notvalid");
        exit();

        }
    }

if (!isset($error_message)) {
    // Validacija - Lozinke se ne poklapaju
    if (
        isset($_POST['password'])
        && $_POST['password'] != $_POST['passwordRepeat']
    ) {
        $error_message = 'Greška! Lozinke se ne poklapaju.';
        session_start();
        $_SESSION['error_message'] = $error_message;
        header("Location: registracija.php");
        exit();
    }
}

if (!isset($error_message)) {
    // Validacija - E-mail nije validan.
    if (
        isset($_POST['email'])
        && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
        $error_message = 'Greška! E-mail nije validan.';
        session_start();
        $_SESSION['error_message'] = $error_message;
        header("Location: registracija.php");
        exit();
    }
}
if (!isset($error_message)) {
    // Validacija - E-mail nije validan.
    if (
        isset($_POST['email'])) {
            require_once('db.php');
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
            
        $stmt->execute([ $_POST['email']]);

        $user = $stmt->fetch();
        $resultCheck = $stmt->rowCount();
        if($resultCheck > 0){

            $error_message = 'Greška! E-mail vec postoji.';
            session_start();
            $_SESSION['error_message'] = $error_message;
            header("Location: registracija.php");
            exit();
        }
    }
}

if (!isset($error_message)) {
    // Registracija korisnika.
    if (
        isset($_POST['submit'])
        && !isset($error_message)
    ) {
        require_once('db.php');

        $stmt = $pdo->prepare('
            INSERT INTO users (name, email, password) VALUES (?, ?, ?)
        ');

        $result = $stmt->execute([
            $_POST['name'], $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        if ($result) {
            $success_message = 'Uspešno ste se registrovali! Prijavite se.';
            unset($_POST);
            session_start();
            /* $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email']; */
            $_SESSION['success_message'] = $success_message;
            header('Location: prijava.php');
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

?>