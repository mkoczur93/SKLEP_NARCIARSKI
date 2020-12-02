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
        <link rel="stylesheet" href="css/main.css">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">


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

      <li><a href="http://localhost/sklep_narciarski/public_html/kontakt.php">Kontakt</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/sklep.php">Sklep</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/trasy.php">Trasy</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/instruktorzy.php">Instruktorzy</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/noclegi.php">Noclegi</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/restauracje.php">Restauracje</a></li>
      <li><a href="http://localhost/sklep_narciarski/public_html/kameraonline.php">Kamera Online</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="http://localhost/sklep_narciarski/public_html/rejestracja.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
    <!-- Example row of columns -->
        <div class="row no-gutters">
		
            <div class="col-md-12 ">
                <div class="col-md-4"></div>
                <div class="col-md-4 instruktor">	

                    <p><h1 class="nocleg">Rejestracja</h1></p>
                    
                    <div class="wstaw">
                    
                        <label> Imię <input type="text" name="imie" required></label>
                        <div></div>
                        <label> Drugie imie <input type="text" name="drugieimie"></label>
                        <div></div>
                        <label> Nazwisko <input type="text" name="nazwisko"required></label>
                    
                    </div>

                    <div class="wstaw">
                    
                        <label> Województwo <input type="text" name="wojewodztwo" required></label>
                        <div></div>
                        <label> Powiat <input type="text" name="powiat" required></label>
                        <div></div>
                        <label> Miasto <input type="text" name="miasto" required></label>
                        <div></div>
                        <label> Ulica <input type="text" name="Ulica" required></label>
                        <div></div>
                        <label> Numer domu <input type="text" name="nrdomu" required></label>
                        <div></div>
                        <label> Numer mieszkania <input type="text" name="nrmieszkania" ></label>
                        <div></div>
                        <label> Kod pocztowy <input type="text" name="kodpocztowy" required></label>

                    
                    </div>

                    <div class="wstaw">
                        <label> Data urodzenia <input type="date" name="data urodzenia" required></label>
                    </div>

                    <div class="wstaw">
                        <label> Adres e-mail <input type="email" name="adres" required></label>
                        <div></div>
                        <label> Numer telefonu <input type="tel" name="telefon" required></label>
                    </div>

                    <div class="col-md-4">
						</div>
						    <div class="col-md-8">
							    <button class="nocleg" onclick="">Zarejestruj</button></p>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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