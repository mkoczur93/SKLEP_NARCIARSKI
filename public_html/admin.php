<?php

    session_start();

    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }


    echo "widaj";

    echo '<a href="wyloguj.php">Wyloguj się!</a>';

?>