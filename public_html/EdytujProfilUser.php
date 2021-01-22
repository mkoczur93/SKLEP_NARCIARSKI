<?php

	session_start();
	

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
				$adres_id_adres = $_SESSION['adres_id_adres'];
				$rezultatadres = $polaczenie->query("SELECT * FROM adres where id_adres='$adres_id_adres'");
				
				if (!$rezultatadres)
					throw new Exception($polaczenie->error);
				else
				{
					$rezultatadres = mysqli_fetch_assoc($rezultatadres);
					$_SESSION['miasto'] = $rezultatadres['miasto'];
					$_SESSION['powiat'] = $rezultatadres['powiat'];
					$_SESSION['ulica'] = $rezultatadres['ulica'];
					$_SESSION['nr_domu'] = $rezultatadres['nr_domu'];
					$_SESSION['kod_pocztowy'] = $rezultatadres['kod_pocztowy'];
					$_SESSION['wojewodztwo'] = $rezultatadres['województwo'];
					$_SESSION['id_adres'] = $rezultatadres['id_adres'];
				
				}
			
			}
		}
			catch(Exception $e)
			{
				echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
				echo '<br />Informacja developerska: '.$e;
			}
		
		
	
	
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<?php
	
	
	if(isset($_SESSION['udanarejestracja']) && $_SESSION['udanarejestracja']==true )
	{
		$_SESSION['udana'] = '<span style="color:green; font-size:20px">Zmieniono Dane !</span>';
		unset($_SESSION['udanarejestracja']);
	}

	
	if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

	$imie = $_SESSION['imie'];


	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$login = $_POST['login'];
		
		
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']='<span style="color:red; font-size:xx-small">Podaj poprawny adres e-mail</span>';
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		

    
    //Sprawdzenie poprawnosci imienia 1
    $imie1 = $_POST['imie'];
		if (!isset($imie1))
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']='<span style="color:red; font-size:xx-small">wprowadz imie</span>';
    }
    if (ctype_alnum($imie1)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_imie']='<span style="color:red; font-size:xx-small">imie może składać się tylko z liter</span>';
    }

    //Sprawdzenie poprawnosci imienia 2, brak testu pobranie wartosci z formularza
    $imie2 = $_POST['imie2'];
    
    
    //Sprawdzenie poprawnosci nazwiska
    $nazwisko = $_POST['nazwisko'];
    if (!isset($nazwisko))
    {
      $wszystko_OK=false;
      $_SESSION['e_nazwisko']='<span style="color:red; font-size:xx-small">wprowadz nazwisko</span>';
    }
    if (ctype_alnum($nazwisko)==false)
    {
      $wszystko_OK=false;
      $_SESSION['e_nawisko']='<span style="color:red; font-size:xx-small">nazwisko może składać się tylko z liter</span>';
    }

    //sprawdzenie nr telefonu  
    $telefon = $_POST['telefon'];
    if (!is_numeric($telefon))
    {
      $wszystko_OK=false;
      $_SESSION['e_telefon']='<span style="color:red; font-size:xx-small">wprowadz poprawny numer telefonu</span>';
    }
    
    //Sprawdzenie poprawnosci wojewodztwa
    $wojewodztwo = $_POST['wojewodztwo'];
    if (!isset($wojewodztwo))
    {
      $wszystko_OK=false;
      $_SESSION['e_wojewodztwo']='<span style="color:red; font-size:xx-small">wprowadz wojewodztwo</span>';
    }
    
    //Sprawdzenie poprawnosci powiatu
    $powiat = $_POST['powiat'];
    if (!isset($powiat))
    {
      $wszystko_OK=false;
      $_SESSION['e_powiat']='<span style="color:red; font-size:xx-small">wprowadz powiat</span>';
    }
     //Sprawdzenie poprawnosci miasto
     $miasto = $_POST['miasto'];
     if (!isset($miasto))
     {
       $wszystko_OK=false;
       $_SESSION['e_miasto']='<span style="color:red; font-size:xx-small">wprowadz miasto</span>';
     }

     //Sprawdzenie poprawnosci ulica
     $ulica = $_POST['ulica'];
     if (!isset($ulica))
     {
       $wszystko_OK=false;
       $_SESSION['e_ulica']='<span style="color:red; font-size:xx-small">wprowadz ulice</span>';
     }

    
     
    //sprawdzenie nr domu  
    $nrdom = $_POST['nrdom'];
    if (!is_numeric($nrdom))
    {
      $wszystko_OK=false;
      $_SESSION['e_nrdom']='<span style="color:red; font-size:xx-small">wprowadz poprawny numer nrdom</span>';
    }


    //sprawdzenie nr kod pocztowy  
    $kodpocztowy = $_POST['kodpocztowy'];
    $reg = '/^([0-9.]{2})+\-([0-9.]{3})$/';
    
    if (!preg_match($reg, $kodpocztowy))
    {
      $wszystko_OK=false;
      $_SESSION['e_kodpocztowy']='<span style="color:red; font-size:xx-small">wprowadz poprawny kod pocztowy</span>';
    }
    

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
				
				
				if ($wszystko_OK==true)
				{
					
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
          $idadres = mysqli_query($polaczenie, "SELECT id_adres FROM adres order by id_adres DESC limit 1");
          $iduzytkownik = mysqli_query($polaczenie, "SELECT id_uzytk FROM uzytkownik1 order by id_uzytk DESC limit 1");

          $idadres = mysqli_fetch_assoc($idadres);
          $iduzytkownik = mysqli_fetch_assoc($iduzytkownik);
          
          $dodaj1 = $idadres['id_adres'];
          $dodaj2= $iduzytkownik['id_uzytk'];
          
          $dodaj1 = $_SESSION['id_uzytk'];
          $dodaj2 = $_SESSION['id_adres'];
          $user = "admin";
          $aktywny = "aktywny";
          $nrlokalu = "";
          $dodawaniedanych1 = "UPDATE adres SET miasto='$miasto', ulica='$ulica', nr_domu='$nrdom', województwo='$wojewodztwo', powiat='$powiat', kod_pocztowy='$kodpocztowy' where id_adres='$dodaj1'" ;
                                  
          $dodawaniedanych2 = "UPDATE uzytkownik1 SET nazwa='$login', nazwisko='$nazwisko', imie='$imie1', imie_1='$imie2', telefon ='$telefon', mail='$email' where id_uzytk='$dodaj2'";
		  
				
				
				$_SESSION['nazwisko'] = $nazwisko;
				$_SESSION['imie'] = $imie1;
				$_SESSION['imie_1'] = $imie2;				
			#	$_SESSION['status'] = $wiersz['status'];                
    			$_SESSION['telefon'] = $telefon;
				$_SESSION['mail'] = $email;
		  


					if ($polaczenie->query($dodawaniedanych1) && $polaczenie->query($dodawaniedanych2) )
					{
            
            mysqli_query($polaczenie, $dodawaniedanych1);
            mysqli_query($polaczenie, $dodawaniedanych2);

						$_SESSION['udanarejestracja']=true;
						header('Location: EdytujProfilAdmin.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
	
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Serwis narciaski WEB-SKI</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://kit.fontawesome.com/30b0a9457c.js" crossorigin="anonymous"></script>
    </head>

   
    <header>

          <!--komentarz>
              <!--[if lt IE 8]>
                  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
              <![endif]-->
              <div class="container no-gutters">
            <!-- Example row of columns -->
            <div class="row no-gutters">
            <div class="col-md-12 logo">
              <img src="img/logo.png" alt="Obrazek_noclegi">	
              
            </div>
        </div>
        </div>
        
              <!--menu glowne-->
              <div id="navbar">
      <div class="bg-dark container-fluid menu "> 
          <div class="container" style="padding-left: 0px;padding-right: 0px;font-size: 12px;">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        
          <ul class="nav navbar-nav" >
            <li><a href="http://localhost/sklep_narciarski/public_html/user.php">Strona Główna</a></li>

      <!--Dropp menu-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Cennik
              </a>
              <div class="dropdown-menu dropstyle">
                <a class="dropdown-item dropstyle"  href="http://localhost/sklep_narciarski/public_html/cennikWypozyczenUser.php">Cennik wypożyczeń</a>
                <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikSprzetuUser.php">Cennik serwisu sprzętu</a>
                <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikLekcjiUser.php">Cennik lekcji z instruktorem</a>
              </div>
            </li>
      <!--Dropp end-->

            <li><a href="http://localhost/sklep_narciarski/public_html/kontaktUser.php">Kontakt</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/sklepUser.php">Sklep</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/trasyUser.php">Trasy</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/instruktorzyUser.php">Instruktorzy</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/noclegiUser.php">Noclegi</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/restauracjeUser.php">Restauracje</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/kameraonlineUser.php">Kamera Online</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li><a href="http://localhost/sklep_narciarski/public_html/KoszykUser.php">Koszyk</a></li>
			<!--Drop menu -->
			
			
			   <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Profil
              </a>
              <div class="dropdown-menu dropstyle">
				<a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/ZamowieniaUser.php">Historia Zamowien</a>
                <a class="dropdown-item dropstyle"  href="http://localhost/sklep_narciarski/public_html/EdytujProfilUser.php">Edycja Profilu</a>

              </div>
            </li>
			
			
			<!--Drop menu end -->
			
			
				
			
			
		    <li><a>Witaj <?php echo $imie ?></a></li>
            <li><?php echo '<a href="wyloguj.php">Wyloguj się!</a>' ?></li>

          </ul>
        </div>
      </nav>
      </div>
      </div>
      </div>
         <!--koniec menu glownego -->
    </header>
	
<body>

<div class="container">
<div class="col-sm-12"  style="background-color: white; padding-bottom:70px; margin-top:0px;">

<div class="login" style="background-color: white; max-width:500px !important;min-height:700px !important;">
	<?php if(isset($_SESSION['udana']))
	
		echo '<div style="text-align: center" >'.$_SESSION['udana'].'</div>';
		unset($_SESSION['udana']);
	?>
		<?php if(isset($_SESSION['zmienhaslo']))
	
		echo '<div style="text-align: center;color:green;font-size:20px" >'.$_SESSION['zmienhaslo'].'</div>';
		
	?>

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 style="text-align: center;padding-bottom:20px;">Edytuj swój profil</h3>
			</div>
			<div class="card-body">
 <div class="col-md-6">
				<form method="post" action="EdytujProfilAdmin.php">
					<div class="input-group form-group" >
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="login">Login:</label>
						<input type="text" name="login" class="form-control" placeholder="Nazwa użytkownika" value="<?php echo $_SESSION['nazwa'] ?>" readonly>
						<?php
              if (isset($_SESSION['e_login']))
              {
                echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                unset($_SESSION['e_login']);
              }
            ?>
						
					</div>

          <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="email">Email:</label>
						<input type="text" name="email" class="form-control" id="email" placeholder="e-mail" value="<?php echo $_SESSION['mail'] ?>">
              <?php
              if (isset($_SESSION['e_email']))
                {
                  echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                  unset($_SESSION['e_email']);
                }
            ?>		
					</div>	

					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="imie">Pierwsze Imie:</label>
						<input type="text" name="imie" class="form-control" id="imie" placeholder="Imię" value="<?php echo $_SESSION['imie'] ?>">
            <?php
              if (isset($_SESSION['e_imie']))
              {
                echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
                unset($_SESSION['e_imie']);
              }
            ?>			
					</div>	
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="imie2">Drugie Imie:</label>
						<input type="text" name="imie2" class="form-control" id="imie2" placeholder="Drugie Imie" value="<?php echo $_SESSION['imie_1'] ?>" >
            <?php
              if (isset($_SESSION['e_imie2']))
              {
                echo '<div class="error">'.$_SESSION['e_imie2'].'</div>';
                unset($_SESSION['e_imie2']);
              }
            ?>				
					</div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="nazwisko">Nazwisko:</label>
						<input type="text" name="nazwisko" class="form-control" id="nazwisko"  placeholder="Nazwisko" value="<?php echo $_SESSION['nazwisko'] ?>">
            <?php
              if (isset($_SESSION['e_nazwisko']))
              {
                echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                unset($_SESSION['e_nazwisko']);
              }
            ?>	
					</div>	
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="telefon">Telefon:</label>
						<input type="tel" name="telefon" class="form-control" id="telefon" placeholder="Telefon" value="<?php echo $_SESSION['telefon'] ?>">
            <?php
              if (isset($_SESSION['e_telefon']))
              {
                echo '<div class="error">'.$_SESSION['e_telefon'].'</div>';
                unset($_SESSION['e_telefon']);
              }
            ?>
					</div>	


          
</div>

<div class="col-md-6">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="woj">Wojewodztwo:</label>
						<input type="text" name="wojewodztwo" class="form-control" id="woj" placeholder="Województwo" value="<?php echo $_SESSION['wojewodztwo'] ?>">
            <?php
              if (isset($_SESSION['e_wojewodztwo']))
              {
                echo '<div class="error">'.$_SESSION['e_wojewodztwo'].'</div>';
                unset($_SESSION['e_wojewodztwo']);
              }
            ?>  
					</div>	        
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="powiat">Powiat:</label>
						<input type="text" name="powiat" class="form-control" id="powiat" placeholder="Powiat" value="<?php echo $_SESSION['powiat'] ?>">
            <?php
              if (isset($_SESSION['e_powiat']))
              {
                echo '<div class="error">'.$_SESSION['e_powiat'].'</div>';
                unset($_SESSION['e_powiat']);
              }
            ?>  
					</div>				

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="miasto">Miasto:</label>
						<input type="text" name="miasto" class="form-control" id="miasto" placeholder="Miasto" value="<?php echo $_SESSION['miasto'] ?>">
            <?php
              if (isset($_SESSION['e_miasto']))
              {
                echo '<div class="error">'.$_SESSION['e_miasto'].'</div>';
                unset($_SESSION['e_miasto']);
              }
            ?> 
					</div>	 						
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="ulica">Ulica:</label>
						<input type="text" name="ulica" class="form-control" id="ulica" placeholder="Ulica" value="<?php echo $_SESSION['ulica'] ?>" >
            <?php
              if (isset($_SESSION['e_ulica']))
              {
                echo '<div class="error">'.$_SESSION['e_ulica'].'</div>';
                unset($_SESSION['e_ulica']);
              }
            ?> 
					</div>							 

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="nrdom">Nr Domu:</label>
						<input type="text" name="nrdom" class="form-control" id="nrdom" placeholder="Nr_domu" value="<?php echo $_SESSION['nr_domu'] ?>">
            <?php
              if (isset($_SESSION['e_nrdom']))
              {
                echo '<div class="error">'.$_SESSION['e_nrdom'].'</div>';
                unset($_SESSION['e_nrdom']);
              }
            ?>  
					</div>						


					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<label for="kod">Kod pocztowy:</label>
						<input type="text" name="kodpocztowy" class="form-control" id="kod" placeholder="Kod Pocztowy" value="<?php echo $_SESSION['kod_pocztowy'] ?>">
            <?php
              if (isset($_SESSION['e_kodpocztowy']))
              {
                echo '<div class="error">'.$_SESSION['e_kodpocztowy'].'</div>';
                unset($_SESSION['e_kodpocztowy']);
              }
            ?>  
					</div>





</div>
<div class="col-md-12" style="text-align: center">
					<div class="form-group">
						<input type="submit" value="Zmien Dane" class="btn float-right login_btn" >
          </div>
</div>
				</form>
			</div>

		</div>
	</div>
</div>




































<div class="login" style="background-color: white; max-width:500px !important;min-height:350px !important;">
	<?php if(isset($_SESSION['zmienhaslo']))
	
		echo '<div style="text-align: center;color:green;font-size:20px" >'.$_SESSION['zmienhaslo'].'</div>';
		unset($_SESSION['zmienhaslo']);
	?>

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 style="text-align: center;padding-bottom:20px;">Zmien haslo</h3>
			</div>
			<div class="card-body">
 <div class="col-md-12">
				<form method="post" action="zmienhasloAdmin.php">


									<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i></i></span>
						</div>
						<input type="password" name="haslo1" class="form-control"  placeholder="Hasło" >
            <?php
              if (isset($_SESSION['e_haslo1']))
              {
                echo '<div class="error">'.$_SESSION['e_haslo1'].'</div>';
                unset($_SESSION['e_haslo1']);
              }
            ?>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i></i></span>
						</div>
						<input type="password" name="haslo2" class="form-control"  placeholder="Powtórz Hasło" >
            <?php
              if (isset($_SESSION['e_haslo2']))
              {
                echo '<div class="error">'.$_SESSION['e_haslo2'].'</div>';
                unset($_SESSION['e_haslo2']);
              }
            ?>
					</div>
					



<div class="col-md-12" style="text-align: center">
					<div class="form-group">
						<input type="submit" value="Zmien Haslo" class="btn float-right login_btn" >
          </div>
</div>
				</form>
			</div>

		</div>
	</div>
</div>
</div>
</div>


<footer>

        <div class="container-fluid" style="background-color: #38465e; margin-top:20px;">
        <div class="container" >
            <!-- Example row of columns -->
              <div class="row no-gutters">
                
                  <div class="col-md-12 stopka">
              
                        <div class="col-md-3">
                           <h4>ZAPISZ SIĘ DO NEWSLETTERA</h4>
                            <p>Możesz zrezygnować w każdej chwili. W tym celu należy odnaleźć szczegóły w naszej informacji prawnej.</p>
                            <div >
                              <input id="#" type="email" name="email" placeholder="Twój adres e-mail *" value="" required="">
                              <svg class="#"><use xlink:href="#si-right-arrow-thin"></use></svg>
                            </div>
                  </div>
                  <div class="col-md-3">
                  <h4>O NAS</h4>
                    <ul>
                        <li><a href="#" title="">Nasza Firma</a></li>
                        <li>praca</li>
                        <li>serwis i wypożyczalnia</li>
                        <li>sklep</li>
                        <li>regulamin sklepu</li>
                    </ul>
                  </div>
                
                  <div class="col-md-3">
                    <h4>STREFA KLIENTA</h4>
                    <ul>
                        <li>dane kontaktowe</li>
                        <li>polityka prywatności</li>
                        <li>dostawa i płatności</li>
                        <li>reklamacje/zwroty/wymiany</li>
                        <li>FAQ</li>
                    </ul>
                  </div>
                    
                  <div class="col-md-3">
                      <h4>DANE KONTAKTOWE</h4>
                      <p>Sklep Narciarski Web-Ski</p>
                      <p>43-233 Zakopane</p>
                      <p>ul.Strzegoma 32</p> 
                
                  </div>
          
                <div class="col-md-12 text-right">
                  <p>Copyright © 2020 Web-Ski</p>
                </div>
          </div>
          </div>
          
      </div> 

        
</footer>
</body>


     <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
   
        <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
        </script>
</html>