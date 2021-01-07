<?php

    session_start();

    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

	$imie = $_SESSION['imie'];


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
            <li class="active"><a href="http://localhost/sklep_narciarski/public_html/user.php">Strona Główna</a></li>

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
			
			
			   <li class="nav-item dropdown">
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
<?php


require_once "connect.php";

	$polaczenie = new mysqli($host, $user, $password, $dbname);
	
	if ($polaczenie->connect_errno!=0)
	{
        echo "Error: ".$polaczenie->connect_errno;
  }
	else
	{
				
		if ($ilosc_prod = $polaczenie->query(sprintf("SELECT * FROM produkt")))
		{
      $ile_produktów1= $ilosc_prod->num_rows;
      $rezultat1 = mysqli_query($polaczenie, "SELECT * FROM produkt");
      $rezultat2 = mysqli_query($polaczenie, "SELECT * FROM zdjecia");

			if($ile_produktów1>0)
			{
        $wiersz1 = $rezultat1->fetch_assoc();
        $wiersz2 = $rezultat2->fetch_assoc();

			#	$dane['id_produkt'] = $wiersz1['id_produkt'];
			#	$dane['nazwa'] = $wiersz1['nazwa'];
			#	$dane['cena'] = $wiersz1['cena'];
			#	$dane['rozmiar'] = $wiersz1['rozmiar'];
			#	$dane['opis'] = $wiersz1['opis'];
			#	$dane['ilosc'] = $wiersz1['ilosc'];
			#	$dane['osoba_id_kategoria'] = $wiersz1['osoba_id_kategoria'];
      # $dane['przeznacz_id_przeznacz'] = $wiersz1['przeznacz_id_przeznacz'];
      #	$dane['prod_rodz_id_prod_rodz'] = $wiersz1['prod_rodz_id_prod_rodz'];
			#	$dane['id_zdjecia'] = $wiersz2['id_zdjecia'];
      # $dane['nazwa_zdjecia'] = $wiersz2['nazwa_zdjecia'];
      # $dane['produkt_id_produkt'] = $wiersz2['produkt_id_produkt'];
        
echo<<<END

  <div class="container">
    <!-- Example row of columns -->
    <div class="row no-gutters">
		
      <div class="col-md-12 instruktor">		
		
        <div class="col-md-3">
       
          <form action="sklep.php" method="get">
            <button class="kategorie" style="background-color:white; border: solid grey 1px; width:100%;display: inline-block;padding: 10px 0px;"  name="Obuwie" type="submit" value="Obuwie">Obuwie</button>
            <button class="kategorie" style="background-color:white; border: solid grey 1px;border-top: solid grey 0px; width:100%;display: inline-block;padding: 10px 0px" name="Narty" type="submit" value="Narty">Narty</button>
            <button class="kategorie" style="background-color:white; border: solid grey 1px;border-top: solid grey 0px; width:100%;display: inline-block;padding: 10px 0px" name="Czapki" type="submit" value="Czapki">Czapki</button>
            <button class="kategorie" style="background-color:white; border: solid grey 1px;border-top: solid grey 0px; width:100%;display: inline-block;padding: 10px 0px" name="Spodnie" type="submit" value="Spodnie">Spodnie</button>
            <button class="kategorie" style="background-color:white; border: solid grey 1px;border-top: solid grey 0px; width:100%;display: inline-block;padding: 10px 0px" name="Kurtki" type="submit" value="Kurtki">Kurtki</button>
            <button class="kategorie" style="background-color:white; border: solid grey 1px;border-top: solid grey 0px; width:100%;display: inline-block;padding: 10px 0px" name="Karnety" type="submit" value="Karnety">Karnety</button>
          </form>
            
        </div>

        <div class="col-md-9">
END;

          while(($dane = mysqli_fetch_array($rezultat1)) && ($dane1 = mysqli_fetch_array($rezultat2))) 
          { 
            $zdjecie = "img/zjecia/".$dane1['nazwa'];
  
echo<<<END

            <div class="col-md-12">
              <div class="row no-gutters">
                
                <div class="col-md-12">
      
                  <!--kolejny prod -->
                
                  <div class="col-md-4">
                    <div style="max-height:382px;">
                      <div style="margin-top:25%;">
                        <figure>
END;

                          echo"<img src=img/zdjecia/".$dane1['nazwa']." alt=".$dane1['nazwa'].">";			
echo<<<END

                        </figure>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="col-md-12">
END;

                      echo"<p><h3 class='nocleg'>".$dane['nazwa']."</h1></p>";
echo<<<END

                    </div>
                  <div class="col-md-12 instruktor-opis">
END;

                    echo "<p>".$dane['opis']."</p>";
echo<<<END

                  </div>
                </div>
                
              </div>
              <div class="col-md-9"></div>
              <div class="col-md-3">
                <button class="nocleg" onclick="">"Dodaj do koszyka"</button></p>
              </div>
            </div>
          </div>
END;

        }
echo<<<END

        </div>
        </div>

      </div>
    </div>
  </div>
END;
} else {
					
  $dane['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';					
}

}
    
$polaczenie->close();
}
?>
</body>

<footer>

    <div class="container-fluid">
      <!-- Example row of columns -->
     <div class="row no-gutters">
	    
		<div class="col-md-12 stopka">
		
		<div class="col-md-4">
		 <p>Dane Kontaktowe:</p>
		 <p>Sklep Narciarski Web-Ski</p>
         <p>43-233 Zakopane</p>
		 <p>ul.Strzegoma 32</p>
		 
		 </div>
		 
		 
	    <div class="col-md-4">
		<p>Partnerzy:</p>
		<p>Skok Narciarski Czarna Dolina</p>
	  
	    </div>
		
		
		
		<div class="col-md-4">

	  
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