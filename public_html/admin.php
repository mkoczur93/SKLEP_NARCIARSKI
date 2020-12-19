<?php

    session_start();

    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }


    echo "witaj admin ";
    echo "<br></br>";
    echo '<a href="wyloguj.php">Wyloguj się!</a>';

?>