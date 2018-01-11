<?php
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");
        require "config.php";

?>

<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./style/style.css" type="text/css">
    </head>
    <body class="body">
        <!--Center pour que le tableau soit centré-->
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td> 
                                    <table width="100%" border="0" cellspacing="1" cellpadding="5">
                                        <tr>
                                            <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">Ouvrir un compte bancaire en ligne</h1><br></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--Creation du chemin d'avancement-->
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt1" bgcolor="#FFFFFF"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
                                        <tr> 
                                            <td> 
                                                <table width="100%" border="0" cellspacing="1" cellpadding="5">
                                                    <tr>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><img src="./images/Rond1.png" width="40" height="40"></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>CONFIRMATION</b></td>
                                                        <td width="70%" class="txt5" align="left" valign="middle"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    <!-- Bloc de confirmation-->
                        <div>
                            <h2 class="txt1">Votre demande a bien &eacute;t&eacute; prise en compte.</h2>
                            <h2 class="txt7">Vous pouvez maintenant vous connecter &agrave; notre banque en ligne.</h2>
                            <br/><br/>
                            <h2 class="txt4"><b>Rappel des conditions d'utilisation de votre compte ch&egraveque.</b></h2>
                            <h2 class="txt7">D&eacute;couvert autoris&eacute; sur Compte Ch&egraveque (CHQ) : 500 &euro;.</h2>
                            <h2 class="txt7">Plafond de virements quotidiens : 1000 &euro;.</h2>
                            <h2 class="txt7">Deux ch&eacute;quiers par mois civil.</h2>
                        </div>
<br/>                    
<br/>                    
                        <!-- Bouton de retour à la page d'accueil-->
                        <div> 
                            <form action="HomePage.php">
                                <table width="700" align="center">
                                <tr>
                                    <td align="center">
                                        <input class="boutonbleulongplus" type="button" value="Retour &agrave; la page d'accueil" onclick="Javascript:window.document.location.href='HomePage.php';">                  
                                    </td>
                                </tr>    
                                </table>
                            </form> 
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
    </body>
</html>
