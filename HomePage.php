<?php
	require('fonction.php');
	session_start();

?>        
<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Olfati Bank</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./style/style.css" type="text/css" title="CSS perso">
    </head>
    <?php include("header.php"); ?>
    <body>
        <?php include("navbar.php");
         ?>
    <body class="body">

            <!--Center pour que le tableau soit centré-->
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
                        <div class="container">
                          <h2 class="txt31">Bienvenue sur Olfati Bank!</h2>  
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                              <div class="item active">
                                <img src="./images/1-850_400_carte-visa-debit.jpg" alt="Carte-visa" style="width:100%;">
                                <!--insertion de texte sur l'image-->
                                    <div class="carousel-caption">
                                        <h1 class="txt11"><b>Olfati Bank vous pr&eacute;sente ses meilleurs voeux pour 2018</b></h1>
                                        <br/><br/><br/><br/><br/><br/><br/>
                                    <p></p>
                                  </div>

                              </div>

                              <div class="item">
                                <img src="./images/ebanking.jpg" alt="Laptop" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h1 class="txt11" align="left" valign="top"><b>Bienvenue sur notre nouveau site internet</b></h1>
                                        <h1 class="txt11" align="left" valign="top"><b>Vous pouvez maintenant devenir client en quelques clics</b></h1>
                                            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                                    <p></p>
                                  </div>
                              </div>

                              <div class="item">
                                <img src="./images/projets.jpg" alt="Visa" style="width:100%;">
                                    <div class="carousel-caption">
                                        <h1 class="txt11" align="left" valign="top"><b>Olfati Bank vous aide &agrave; r&eacute;aliser tous vos projets</b></h1>
										<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                                    <p></p>
                                  </div>
                              </div>

                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                    </td>
                </tr>
            </table>
<br/>
<br/>
<br/>	        
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
</html>
