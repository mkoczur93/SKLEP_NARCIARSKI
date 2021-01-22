<?php

	session_start();
	
	if (isset($_POST['haslo1']))
	{
		$wszystko_OK=true;
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo1']='<span style="color:red; font-size:xx-small">Hasło musi posiadać od 8 do 20 znaków!</span>';
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo2']='<span style="color:red; font-size:xx-small">Podane hasła nie są identyczne!</span>';
		}	
    
    if($wszystko_OK==true)
	{

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
      $polaczenie = new mysqli($host, $user, $password, $dbname);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				
				
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
          $dodaj2= $_SESSION['id_uzytk'];
          $dodawaniedanych2 = "UPDATE uzytkownik1 SET haslo1='$haslo1',haslo2='$haslo2' where id_uzytk='$dodaj2'";
		  
				
				
					if ($polaczenie->query($dodawaniedanych2))
					{
            
            mysqli_query($polaczenie, $dodawaniedanych2);

						$_SESSION['zmienhaslo']='Zmieniono haslo';
						
						header('Location: EdytujProfilAdmin.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}	
			
	
			
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
		
	
	}
	
	else
		
		header('Location: EdytujProfilAdmin.php');
		
	}
	
