<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}

require_once "connect.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$polaczenie = new mysqli($host, $user, $password, $dbname);
	
	if ($polaczenie->connect_errno!=0)
	{
        echo "Error: ".$polaczenie->connect_errno;
    }
	else
	{
		$login = trim($_POST['login']);
		$haslo = trim($_POST['haslo']);
		
        $login = htmlentities($login, ENT_QUOTES);
        $haslo = htmlentities($haslo, ENT_QUOTES);
		
		if ($rezultat = $polaczenie->query(
		sprintf("SELECT * FROM uzytkownik1 WHERE nazwa='%s' AND haslo1='%s'",
        mysqli_real_escape_string($polaczenie, $login),
        mysqli_real_escape_string($polaczenie, $haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
                $_SESSION['zalogowany'] = true;
				$wiersz = $rezultat->fetch_assoc();
			#	$_SESSION['id_uzytk'] = $wiersz['id_uzytk'];
			#	$_SESSION['nazwa'] = $wiersz['nazwa'];
			#	$_SESSION['nazwisko'] = $wiersz['nazwisko'];
			#	$_SESSION['imie'] = $wiersz['imie'];
			#	$_SESSION['imie_1'] = $wiersz['imie_1'];
				$_SESSION['rodzaj_u'] = $wiersz['rodzaj_u'];
			#	$_SESSION['status'] = $wiersz['status'];
            #   $_SESSION['adres_id_adres'] = $wiersz['adres_id_adres'];
    		#	$_SESSION['telefon'] = $wiersz['telefon'];
			#	$_SESSION['mail'] = $wiersz['mail'];
			#   $_SESSION['haslo1'] = $wiersz['haslo1'];
				if($_SESSION['rodzaj_u'] == "admin")
				{
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: admin.php');
				}
				else
				{
					unset($_SESSION['blad']);
					$rezultat->free_result();
					header('Location: user.php');
				}
					
			} else {
					
                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: login.php');
					
			}
				
        }
            			
		$polaczenie->close();
	}
}
?>