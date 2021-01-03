<?php

	session_start();
	
	if (isset($_POST['nazwa']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		
		//Sprawdzenie długości nazwy
		$nazwa = $_POST['nazwa'];
		if ((strlen($nazwa)<3))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwa']='<span style="color:red; font-size:xx-small">pole wymagane!</span>';
		}
		
		// Sprawdź poprawność adresu ceny
        
        $cena = $_POST['cena'];
        

        if (!empty($cena)) {
 
            if ($cena<'0') {echo "Wartość nie może być ujemna.";}
             
            if (!preg_match('/^[0-9]+$/ ', $_POST['cena'])) {
             
                if (!preg_match('/^[0-9]+\.[0-9]{1}+$/ ', $_POST['cena'])) {
             
                    if (!preg_match('/^[0-9]+\.[0-9]{2}+$/ ', $_POST['cena'])) 
                    {
                        $wszystko_OK=false;
                        $_SESSION['e_cena']='<span style="color:red; font-size:xx-small">cena wymagana!</span>';   
                    }
                }
            }     
        }


        //Sprawdź poprawność rozmiaru
        $rozmiar = $_POST['rozmiar'];

		if ((strlen($rozmiar)<2))
		{
			$wszystko_OK=false;
			$_SESSION['e_rozmiar']='<span style="color:red; font-size:xx-small">pole wymagane!</span>';
        }
        
        //Sprawdź poprawność opisu
        $opis = $_POST['opis'];

		if ((strlen($opis)<200))
		{
			$wszystko_OK=false;
			$_SESSION['e_opis']='<span style="color:red; font-size:xx-small">pole wymagane!</span>';
		}
    
    //Sprawdzenie poprawnosci ilosc
    $ilosc = $_POST['ilosc'];
    $reg1 = '/^[0-9]+$/ ';
    
    if (!preg_match($reg1, $ilosc))
    {
        $wszystko_OK=false;
        $_SESSION['e_ilosc']='<span style="color:red; font-size:xx-small">ilosc wymagana!</span>';
    }

    //Sprawdzenie poprawnosci nazwaZdjecia
    $nazwaZdjecia = $_POST['nazwaZdjecia'];

	if ((strlen($nazwaZdjecia)<10))
	{
		$wszystko_OK=false;
		$_SESSION['e_nazwaZdjecia']='<span style="color:red; font-size:xx-small">pole wymagane!</span>';
	}
    
    $osoba = $_POST['osoba'];
    $prod_rodz = $_POST['prod_rodz'];
    $przeznaczenie = $_POST['przeznaczenie'];

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
                    $idprodukt = mysqli_query($polaczenie, "SELECT id_produkt FROM produkt order by id_produkt DESC limit 1");
                    $idzdjecie = mysqli_query($polaczenie, "SELECT id_zdjecia FROM zdjecia order by id_zdjecia DESC limit 1");

                    $idprodukt = mysqli_fetch_assoc($idprodukt);
                    $idzdjecie = mysqli_fetch_assoc($idzdjecie);
                    
                    $dodaj1 = $idprodukt['id_produkt'];
                    $dodaj2= $idzdjecie['id_zdjecia'];
                    
                    $dodaj1 = $dodaj1 + 1;
                    $dodaj2 = $dodaj2 + 1;

                    $dodawaniedanych1 = "INSERT INTO produkt (id_produkt, nazwa, cena, rozmiar, opis, ilosc, osoba_id_kategoria, przeznacz_id_przeznacz, prod_rodz_id_prod_rodz) 
                                            VALUES ('$dodaj1', '$nazwa', '$cena', '$rozmiar', '$opis', '$ilosc', '$osoba', '$przeznaczenie', '$prod_rodz')";
                    $dodawaniedanych2 = "INSERT INTO zdjecia (id_zdjecia, nazwa, produkt_id_produkt) 
                                            VALUES ('$dodaj2', '$nazwaZdjecia', '$dodaj1')";


					if ($polaczenie->query($dodawaniedanych1) && $polaczenie->query($dodawaniedanych2) )
					{
            
                        mysqli_query($polaczenie, $dodawaniedanych1);
                        mysqli_query($polaczenie, $dodawaniedanych2);

                        //Usuwanie błędów rejestracji
                        if (isset($_SESSION['e_nazwa'])) unset($_SESSION['e_nazwa']);
                        if (isset($_SESSION['e_cena'])) unset($_SESSION['e_cena']);
                        if (isset($_SESSION['e_opis'])) unset($_SESSION['e_opis']);
                        if (isset($_SESSION['e_rozmiar'])) unset($_SESSION['e_rozmiar']);
                        if (isset($_SESSION['e_ilosc'])) unset($_SESSION['e_ilosc']);
                        if (isset($_SESSION['e_nazwaZdjecia'])) unset($_SESSION['e_nazwaZdjecia']);

                        $_SESSION['udanedodanie']=true;
						$_SESSION['S_dodania']='<span style="color:green; font-size: small">sprzet dodano!</span>';
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
            <li><a href="http://localhost/sklep_narciarski/public_html/admin.php">Strona Główna</a></li>

            <li class="active"><a href="http://localhost/sklep_narciarski/public_html/Nprodukt.php">Dodaj produkt</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://localhost/sklep_narciarski/public_html/wyloguj.php"><span class="glyphicon glyphicon-user"></span>wyloguj się</a></li>
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

<div class="login" style="background-color: white; max-width:700px !important;min-height:900px !important;">


	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 style="text-align: center;padding-bottom:20px;">nowy produkt</h3>
			</div>
			<div class="card-body">
 <div class="col-md-12">
				<form method="post">
					<div class="input-group form-group" >
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<input type="text" name="nazwa" class="form-control" placeholder="Nazwa produktu">
						<?php
              if (isset($_SESSION['e_nazwa']))
              {
                echo '<div class="error">'.$_SESSION['e_nazwa'].'</div>';
                unset($_SESSION['e_nazwa']);
              }
            ?>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i></i></span>
						</div>
						<input type="text" name="cena" class="form-control"  placeholder="Cena" >
            <?php
              if (isset($_SESSION['e_cena']))
              {
                echo '<div class="error">'.$_SESSION['e_cena'].'</div>';
                unset($_SESSION['e_cena']);
              }
            ?>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i></i></span>
						</div>
						<input type="text" name="rozmiar" class="form-control"  placeholder="Rozmiar" >
            <?php
              if (isset($_SESSION['e_rozmiar']))
              {
                echo '<div class="error">'.$_SESSION['e_rozmiar'].'</div>';
                unset($_SESSION['e_rozmiar']);
              }
            ?>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<textarea name="opis" placeholder="opis przedmiotu" style="width: 420px; height: 200px"></textarea>
            <?php
              if (isset($_SESSION['e_opis']))
              {
                echo '<div class="error">'.$_SESSION['e_opis'].'</div>';
                unset($_SESSION['e_opis']);
              }
            ?>			
					</div>	
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<input type="text" name="ilosc" class="form-control"  placeholder="ilosc sztuk na stanie" >
            <?php
              if (isset($_SESSION['e_ilosc']))
              {
                echo '<div class="error">'.$_SESSION['e_ilosc'].'</div>';
                unset($_SESSION['e_ilosc']);
              }
            ?>				
					</div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
						<input type="text" name="nazwaZdjecia" class="form-control"  placeholder="nazwa zdjecia" >
            <?php
              if (isset($_SESSION['e_nazwaZdjecia']))
              {
                echo '<div class="error">'.$_SESSION['e_nazwaZdjecia'].'</div>';
                unset($_SESSION['e_nazwaZdjecia']);
              }
            ?>	

                </div>

                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
                        <label for="osoba" > dla jakiej osoby </label>
                        <select id="osoba"  name="osoba">
                            <option value="0"> NULL </option>
                            <option value="1"> men </option>
                            <option value="2"> women </option>
                            <option value="3"> lunior </option>
                        </select>	

                </div>

                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
                        <label for="przeznaczenie" > przeznaczenie </label>
                        <select id="przeznaczenie"  name="przeznaczenie">
                            <option value="0"> NULL </option>
                            <option value="1"> All-round </option>
                            <option value="2"> All Mountain </option>
                            <option value="3"> High Performance </option>
                            <option value="4"> Race GS </option>
                        </select>	

                </div>

                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class=""></i></span>
						</div>
                        <label for="prod_rodz" >  producenci i rodzaj wiazania </label>
                        <select id="prod_rodz"  name="prod_rodz">
                            <option value="0"> NULL </option>
                            <option value="1"> ATOMIC - narty </option>
                            <option value="2"> ATOMIC - wiazania </option>
                            <option value="3"> ATOMIC - buty narciarskie </option>
                            <option value="4"> ATOMIC - kije narciarskie </option>
                            <option value="5"> Burton - wiązania </option>
                            <option value="6"> Fischer - narty </option>
                            <option value="7"> ROSSIGNOl - narty </option>
                            <option value="8"> SALOMON - narty </option>
                            <option value="9"> SALOMON - wiązania </option>
                            <option value="10"> SALOMON - buty narciarskie </option>
                            <option value="11"> UVEX - akcesoria </option>
                        </select>	

                </div>

                <div class="col-md-8" style="text-align: center">
					<div class="form-group">
						<input type="submit" value="DODAJ" class="btn float-right login_btn" >
                    </div>
                    <?php
                        if (isset($_SESSION['S_dodania']))
                        {
                            echo '<div class="error">'.$_SESSION['S_dodania'].'</div>';
                            unset($_SESSION['S_dodania']);
                        }
                    ?>
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