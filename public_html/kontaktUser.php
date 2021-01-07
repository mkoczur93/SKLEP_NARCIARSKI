<!doctype html>

<?php

    session_start();

    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

	$imie = $_SESSION['imie'];


?>
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