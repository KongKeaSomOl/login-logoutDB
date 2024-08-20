<?php
    session_start();
    if(isset($_SESSION["username"])) {
        $_SESSION = array ();
        session_destroy();
        // header("Location: signIn.php");
    }
    header("Location: login.php");
    exit();

    // else {
    //     header("Location: signIn.php");
    // }
?>