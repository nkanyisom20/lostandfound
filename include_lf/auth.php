<?php
    session_start();


    $timeout = 300; // 5 Minutes

    if (isset($_SESSION['LAST_ACTIVITY'])) {
        $inactiveTime = time() - $_SESSION['LAST_ACTIVITY'];

        if ($inactiveTime > $timeout) {
            session_unset();
            session_destroy();

            header("Location: index.php");
            exit();
        }
    }

    $_SESSION['LAST_ACTIVITY'] = time();

    if(!isset($_SESSION["student_no"])){
        header("Location: index.php");
        exit();
    }
?>

