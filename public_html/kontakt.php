<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
//		//Sprawdź poprawność nickname'a
//		$login = $_POST['login'];
//		
//		//Sprawdzenie długości nicka
//		if ((strlen($login)<3) || (strlen($login)>20))
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_login']='<span style="color:red; font-size:xx-small">Nick musi posiadać od 3 do 20 znaków!</span>';
//		}
//		
//		if (ctype_alnum($login)==false)
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_login']='<span style="color:red; font-size:xx-small">Nick może składać się tylko z liter i cyfr</span>';
//		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']='<span style="color:red; font-size:xx-small">Podaj poprawny adres e-mail</span>';
		}
//		
//		//Sprawdź poprawność hasła
//		$haslo1 = $_POST['haslo1'];
//		$haslo2 = $_POST['haslo2'];
//		
//		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_haslo1']='<span style="color:red; font-size:xx-small">Hasło musi posiadać od 8 do 20 znaków!</span>';
//		}
//		
//		if ($haslo1!=$haslo2)
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_haslo2']='<span style="color:red; font-size:xx-small">Podane hasła nie są identyczne!</span>';
//		}	
//    
//    //Sprawdzenie poprawnosci imienia 1
//    $imie1 = $_POST['imie'];
//		if (!isset($imie1))
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_imie']='<span style="color:red; font-size:xx-small">wprowadz imie</span>';
//    }
//    if (ctype_alnum($imie1)==false)
//		{
//			$wszystko_OK=false;
//			$_SESSION['e_imie']='<span style="color:red; font-size:xx-small">imie może składać się tylko z liter</span>';
//    }
//
//    //Sprawdzenie poprawnosci imienia 2, brak testu pobranie wartosci z formularza
//    $imie2 = $_POST['imie2'];
//    
//    
//    //Sprawdzenie poprawnosci nazwiska
//    $nazwisko = $_POST['nazwisko'];
//    if (!isset($nazwisko))
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_nazwisko']='<span style="color:red; font-size:xx-small">wprowadz nazwisko</span>';
//    }
//    if (ctype_alnum($nazwisko)==false)
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_nawisko']='<span style="color:red; font-size:xx-small">nazwisko może składać się tylko z liter</span>';
//    }
//
    //sprawdzenie nr telefonu  
    $telefon = $_POST['telefon'];
    if (!is_numeric($telefon))
    {
      $wszystko_OK=false;
      $_SESSION['e_telefon']='<span style="color:red; font-size:xx-small">wprowadz poprawny numer telefonu</span>';
    }
//    
//    //Sprawdzenie poprawnosci wojewodztwa
//    $wojewodztwo = $_POST['wojewodztwo'];
//    if (!isset($wojewodztwo))
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_wojewodztwo']='<span style="color:red; font-size:xx-small">wprowadz wojewodztwo</span>';
//    }
//    
//    //Sprawdzenie poprawnosci powiatu
//    $powiat = $_POST['powiat'];
//    if (!isset($powiat))
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_powiat']='<span style="color:red; font-size:xx-small">wprowadz powiat</span>';
//    }
//     //Sprawdzenie poprawnosci miasto
//     $miasto = $_POST['miasto'];
//     if (!isset($miasto))
//     {
//       $wszystko_OK=false;
//       $_SESSION['e_miasto']='<span style="color:red; font-size:xx-small">wprowadz miasto</span>';
//     }
//
//     //Sprawdzenie poprawnosci ulica
//     $ulica = $_POST['ulica'];
//     if (!isset($ulica))
//     {
//       $wszystko_OK=false;
//       $_SESSION['e_ulica']='<span style="color:red; font-size:xx-small">wprowadz ulice</span>';
//     }
//
//    
//     
//    //sprawdzenie nr domu  
//    $nrdom = $_POST['nrdom'];
//    if (!is_numeric($nrdom))
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_nrdom']='<span style="color:red; font-size:xx-small">wprowadz poprawny numer nrdom</span>';
//    }
//
//
//    //sprawdzenie nr kod pocztowy  
//    $kodpocztowy = $_POST['kodpocztowy'];
//    $reg = '/^([0-9.]{2})+\-([0-9.]{3})$/';
//    
//    if (!preg_match($reg, $kodpocztowy))
//    {
//      $wszystko_OK=false;
//      $_SESSION['e_kodpocztowy']='<span style="color:red; font-size:xx-small">wprowadz poprawny kod pocztowy</span>';
//    }
    

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
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id_uzytk FROM uzytkownik1 WHERE mail='$email'");
				
//				if (!$rezultat) throw new Exception($polaczenie->error);
				
//				$ile_takich_maili = $rezultat->num_rows;
//				if($ile_takich_maili>0)
//				{
//					$wszystko_OK=false;
//					$_SESSION['e_email']='<span style="color:red; font-size:xx-small">Istnieje już konto przypisane do tego adresu e-mail!</span>';
//				}		

//				//Czy nick jest już zarezerwowany?
//				$rezultat = $polaczenie->query("SELECT id_uzytk FROM uzytkownik1 WHERE nazwa='$login'");
//				
//				if (!$rezultat) throw new Exception($polaczenie->error);
//				
//				$ile_takich_nickow = $rezultat->num_rows;
//				if($ile_takich_nickow>0)
//				{
//					$wszystko_OK=false;
//					$_SESSION['e_login']='<span style="color:red; font-size:xx-small">Istnieje już gracz o takim nicku!</span>';
//				}
				
                                
                                
                                
                                
                                
                                
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
          $idadres = mysqli_query($polaczenie, "SELECT id_kontakt FROM kontakt order by id_kontakt DESC limit 1");
          //$iduzytkownik = mysqli_query($polaczenie, "SELECT id_uzytk FROM uzytkownik1 order by id_uzytk DESC limit 1");

          $idadres = mysqli_fetch_assoc($idadres);
          //$iduzytkownik = mysqli_fetch_assoc($iduzytkownik);
          
          $dodaj1 = $idadres['id_kontakt'];
          //$dodaj2= $iduzytkownik['id_uzytk'];
          
          $dodaj1 = $dodaj1 + 1;
          //$dodaj2 = $dodaj2 + 1;
          $user = "user";
          $aktywny = "aktywny";
          $nrlokalu = "";
          $dodawaniedanych1 = "INSERT INTO adres (id_adres, miasto, ulica, nr_domu, nr_lokalu, wojewodztwo, powiat, kod_pocztowy) 
                                  VALUES ('$dodaj1', '$miasto', '$ulica', '$nrdom', '$nrlokalu', '$wojewodztwo', '$powiat', '$kodpocztowy')";
          //$dodawaniedanych2 = "INSERT INTO uzytkownik1 (id_uzytk, nazwa, nazwisko, imie, imie_1, rodzaj_u, status_uzytkownika, adres_id_adres, telefon, mail, haslo1, haslo2) 
                                  //VALUES ('$dodaj2', '$login', '$nazwisko', '$imie1', '$imie2', '$user', '$aktywny', '$dodaj1', '$telefon', '$email', '$haslo1', '$haslo2')";


					if ($polaczenie->query($dodawaniedanych1) && $polaczenie->query($dodawaniedanych2) )
					{
            
            mysqli_query($polaczenie, $dodawaniedanych1);
            //mysqli_query($polaczenie, $dodawaniedanych2);

						$_SESSION['udanarejestracja']=true;
						header('Location: witamy.php');
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
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


        

    </head>
	
	
	
<header>
<div class="container no-gutters">
      <!-- Example row of columns -->
      <div class="row no-gutters">
	 <div class="col-md-12 logo">
		<img src="img/logo.png" alt="Obrazek_noclegi">	
		
	 </div>
	 </div>
  </div>
	
	 <!--komentarz>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


         <!--menu glowne-->
         <div id="navbar">
<div class="bg-dark container-fluid menu"> 
    <div class="container" style="padding-left: 0px;padding-right: 0px;font-size: 12px;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
    <ul class="nav navbar-nav" >
      <li><a href="http://localhost/sklep_narciarski/public_html/index.php">Strona Główna</a></li>

<!--Dropp menu-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Cennik
        </a>
        <div class="dropdown-menu dropstyle">
          <a class="dropdown-item dropstyle"  href="http://localhost/sklep_narciarski/public_html/cennikWypozyczen.php">Cennik wypożyczeń</a>
          <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikSprzetu.php">Cennik serwisu sprzętu</a>
          <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikLekcji.php">Cennik lekcji z instruktorem</a>
        </div>
      </li>
<!--Dropp end-->

      <li class="active"><a href="http://localhost/sklep_narciarski/public_html/kontakt.php">Kontakt</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/sklep.php">Sklep</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/trasy.php">Trasy</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/instruktorzy.php">Instruktorzy</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/noclegi.php">Noclegi</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/restauracje.php">Restauracje</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/kameraonline.php">Kamera Online</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="http://localhost/sklep_narciarski/public_html/rejestracja.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
</div>
</div>
</div>

         <!--koniec menu glownego-->
</header>
	
	  
	

	
    <body>
	 
    			
		<div class="container">
		<div class="row">
		<div class="col-sm-12 kontakt">
	
		<header>		
	<h1 class="textjakdojechac">Jak do nas dojechac ?</h1>	
	</header>

	
	<div class="col-sm-12 kontakt">	
	
		<p class="textjakdojechac">
		-----------------------------------------------<br>
		Adres:<br>
		Web-Ski Narciarstwo<br>		
		Polska Dawid Kowalski<br>
		40-533 Zakopane<br>
		ul. Ozimska 5 <br>
		----------------------------------------------
		<p>
    
    </div>
	
	<div class="col-sm-12 kontakt">
	<div class="wysrodkuj">	
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10114.694297344446!2d17.92631!3d50.670321!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf604e2541d5e6fb7!2s%F0%9F%93%BA%20Salon%20Canal%2B%20Opole%20-%20Solaris%20Center!5e0!3m2!1spl!2sus!4v1606329226129!5m2!1spl!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	</div>
	</div>
	
	
		
		<div class="container">		
        <div class="row">
            <div class="col-sm-12 formularzNaglowek"> 

		<header>
		<h1>Formularz</h1>
		</header>
            </div>
		<div class="col-sm-12 formularz">      
            
        <div class="col-sm-3"></div>
            <form action="mail.php" method="post" enctype="multipart/form-data" class="col-sm-6">
                 <label class="bialyNapis">Imie:</label></br>
                <input type="text" name="imie" placeholder="Imie"><p></p>
                <label class="bialyNapis">Email:</label></br>
				<input type="email" name="email" placeholder="E-mail"><p></p>
				<label class="bialyNapis">Telefon Kontaktowy:</label>
				<p></p>
				<div class="dolewej">
			    <input type="tel" size="9" maxlength="9" name="telefon" pattern="[0-9]{9}" value="" onkeyup="FormUtil.tabForward(this)" />				
		
				</div>
				<p></p>

			
				<textarea name="wiadomosc" placeholder="Wiadomosc" style="width: 100%; height: 300px"></textarea><br>
				<input type="submit" name="submit" value="Wyslij" style="text-align: center;">
			</form>
				
            <div class="col-sm-3"></div>
	
        </div>
        </div>
        </div>
        </div>
        </div>
        
		
		
  </body>


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