<?php
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");

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
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                             <tr> 
                                 <td align="center" class="txt4">CONDITIONS D'&Eacute;LIGIBILIT&Eacute;</td>
                             </tr>
                        </table>
<br/>
<br/>
                        <div class="txt7">
                            <p>L'<a href="NewClient.php">ouverture en ligne</a> d'un compte est sous r&eacute;serve d'acceptation par notre banque.</p>
                            <p>Vous devez &eacute;galement remplir les conditions d'&eacute;ligibilit&eacute; minimum suivantes :</p>
                            <ul>
                                <li>&ecirc;tre une personne physique et majeur capable, ou un entrepreneur individuel.</li>
                                <li>&ecirc;tre r&eacute;sidant fiscal fran&ccedil;ais, ou de nationalit&eacute; fran&ccedil;aise.</li>
                                <li>ouvrir un compte, individuel ou joint (maximum 2 personnes), en tant que particulier. </li>
                            </ul>
                            <p>Nous n'imposons aucune condition de revenu pour l'ouverture d'un compte particulier en ligne. <br>Seul un versement initial, d'un montant de 20 Euros minimum vous sera demand&eacute;.</p>
                        </div>
<br/> 
<br/> 
                        <!-- Bouton pour retourner à la page précédente-->
                        <form>
                            <table width="700" align="center">
                            <tr>
                                <td align="center">
                                <input class="boutonbleu" type="button" value="Retour" onClick="history.back()">                    
                                </td>
                            </tr>    
                            </table>
                        </form> 
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
