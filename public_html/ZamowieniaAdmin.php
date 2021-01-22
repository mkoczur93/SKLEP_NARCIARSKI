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
            <li><a href="http://localhost/sklep_narciarski/public_html/admin.php">Strona Główna</a></li>

      <!--Dropp menu-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Cennik
              </a>
              <div class="dropdown-menu dropstyle">
                <a class="dropdown-item dropstyle"  href="http://localhost/sklep_narciarski/public_html/cennikWypozyczenAdmin.php">Cennik wypożyczeń</a>
                <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikSprzetuAdmin.php">Cennik serwisu sprzętu</a>
                <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/cennikLekcjiAdmin.php">Cennik lekcji z instruktorem</a>
              </div>
            </li>
      <!--Dropp end-->

            <li><a href="http://localhost/sklep_narciarski/public_html/kontaktAdmin.php">Kontakt</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/sklepAdmin.php">Sklep</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/trasyAdmin.php">Trasy</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/instruktorzyAdmin.php">Instruktorzy</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/noclegiAdmin.php">Noclegi</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/restauracjeAdmin.php">Restauracje</a></li>
            <li><a href="http://localhost/sklep_narciarski/public_html/kameraonlineAdmin.php">Kamera Online</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			
			<!--Drop menu -->
			
			
			   <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Profil
              </a>
              <div class="dropdown-menu dropstyle">
			    <a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/Nprodukt.php">Dodaj Produkt</br></a>
				<a class="dropdown-item dropstyle" href="http://localhost/sklep_narciarski/public_html/ZamowieniaAdmin.php">Historia Zamowien</a>
                <a class="dropdown-item dropstyle"  href="http://localhost/sklep_narciarski/public_html/EdytujProfilAdmin.php">Edycja Profilu</a>

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

<!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
<style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 2px;
  border-color: #050505;
  border-style: solid;
  color: #121212;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 2px;
  border-color: #050505;
  border-style: solid;
  padding: 3px;
}

table.GeneratedTable thead {
  background-color: #b0b0b0;
}
</style>


<div>
      <!-- Example row of columns -->
      <div class="row no-gutters">
      <div class="col-md-12" style="margin-top:40px;margin-bottom:40px">
      <h1 style="text-align:center">spis zamówień</h1>
<!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
<table class="GeneratedTable" style="text-align:center">
  <thead>
    <tr>
      <th>numer zamówienia</th>
      <th>imie </th>
      <th>nazwisko</th>
      <th>numer telefonu</th>
      <th>adres e-mail</th>
      <th>miasto</th>
      <th>kod pocztowy</th>
      <th>ulica</th>
      <th>numer domu</th>
      <th>numer lokalu</th>
      <th>data złozenia zamowienia</th>
      <th>data realizacji zamowienia</th>
      <th>nazwa produktu</th>
      <th>cena pruduktu</th>
      <th>ilosc zamowiona</th>
      <th>metoda płatności</th>
    </tr>
  </thead>
  <tbody>
<?php
require_once "connect.php";

$polaczenie = new mysqli($host, $user, $password, $dbname);

if ($polaczenie->connect_errno!=0)
{
      echo "Error: ".$polaczenie->connect_errno;
}
else
{
      
  if ($ilosc_prod = $polaczenie->query(sprintf("SELECT zamowienie.id_zamowienia, uzytkownik1.imie, uzytkownik1.nazwisko, uzytkownik1.telefon, 
                                                uzytkownik1.mail, adres.miasto, adres.kod_pocztowy, adres.ulica, adres.nr_domu, 
                                                adres.nr_lokalu, zamowienie.data_zlozenia, zamowienie.data_realizacji, produkt.nazwa, 
                                                produkt.cena, produkt.ilosc, platnosc.rodzaj
                                                FROM zamowienie 
                                                JOIN uzytkownik1 ON zamowienie.uzytkownik1_id_uzytk = uzytkownik1.id_uzytk 
                                                JOIN produkt ON zamowienie.produkt_id_produkt = produkt.id_produkt 
                                                JOIN adres ON zamowienie.uzytkownik1_id_uzytk = uzytkownik1.id_uzytk 
                                                    AND uzytkownik1.adres_id_adres = adres.id_adres
                                                JOIN platnosc ON zamowienie.platnosc_id_platnosc = platnosc.id_platnosc")))
  {
    $ile_produktów1= $ilosc_prod->num_rows;
    $rezultat1 = mysqli_query($polaczenie, "SELECT zamowienie.id_zamowienia, uzytkownik1.imie, uzytkownik1.nazwisko, uzytkownik1.telefon, 
                                            uzytkownik1.mail, adres.miasto, adres.kod_pocztowy, adres.ulica, adres.nr_domu, 
                                            adres.nr_lokalu, zamowienie.data_zlozenia, zamowienie.data_realizacji, produkt.nazwa, 
                                            produkt.cena, produkt.ilosc, platnosc.rodzaj
                                            FROM zamowienie 
                                            JOIN uzytkownik1 ON zamowienie.uzytkownik1_id_uzytk = uzytkownik1.id_uzytk 
                                            JOIN produkt ON zamowienie.produkt_id_produkt = produkt.id_produkt 
                                            JOIN adres ON zamowienie.uzytkownik1_id_uzytk = uzytkownik1.id_uzytk 
                                                AND uzytkownik1.adres_id_adres = adres.id_adres
                                            JOIN platnosc ON zamowienie.platnosc_id_platnosc = platnosc.id_platnosc");

    if($ile_produktów1>0)
    {
      #$wiersz1 = $rezultat1->fetch_assoc();      

      while($dane = mysqli_fetch_array($rezultat1)) 
      { 
          echo"<tr>";
            echo"<td>".$dane['id_zamowienia']."</td>";
            echo"<td>".$dane['imie']."</td>";
            echo"<td>".$dane['nazwisko']."</td>";
            echo"<td>".$dane['telefon']."</td>";
            echo"<td>".$dane['mail']."</td>";
            echo"<td>".$dane['miasto']."</td>";
            echo"<td>".$dane['kod_pocztowy']."</td>";
            echo"<td>".$dane['ulica']."</td>";
            echo"<td>".$dane['nr_domu']."</td>";
            echo"<td>".$dane['nr_lokalu']."</td>";
            echo"<td>".$dane['data_zlozenia']."</td>";
            echo"<td>".$dane['data_realizacji']."</td>";
            echo"<td>".$dane['nazwa']."</td>";
            echo"<td>".$dane['cena']." zł </td>";
            echo"<td>".$dane['ilosc']."</td>";
            echo"<td>".$dane['rodzaj']."</td>";
          echo"</tr>";
      }
    }
  }
}
$polaczenie->close();

?>
  </tbody>
</table>
<!-- Codes by Quackit.com -->

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
       <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</html>
