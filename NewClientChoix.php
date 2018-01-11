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
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td> 
                                    <table width="100%" border="0" cellspacing="1" cellpadding="5">
                                        <tr>
                                            <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">Ouvrir un compte bancaire en ligne</h1></td>
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
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>CHOIX DES COMPTES</b></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond3.png" width="40" height="40"></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond4.png" width="40" height="40"></td>
                                                        <td width="50%" class="txt5" align="left" valign="middle"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/> 
<br/>
                        <table width="800" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt7">Bonjour, devenez client en quatre &eacute;tapes seulement!<a href="NewClientConditions.php" class="txt3">&nbsp;&nbsp;>>> Voir les conditions d'&eacute;ligibilit&eacute;</a></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="txt7">Vous &ecirc;tes sur le point de faire une demande d'ouverture de compte en ligne. Cette demande est gratuite.</td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
<br/> 
<br/>
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                             <tr> 
                                 <td width="440" align="center" class="txt4" >Votre choix de type de compte</td>
                             </tr>
                         </table>
<br/> 
                        <table align="center">
                            <tr>
                                <td> 
                                    <form method="post" action="NewClientInfo.php" class="form-horizontal">                   
                                        <table width="200" align="center" >
                                            <tr>
                                                <td align="center">
                                                <input class="boutonbleulong" align="center" type="submit" name="action" value="Compte Individuel">                    
                                                </td>
                                            </tr>    
                                        </table>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="NewClientInfo2.php" class="form-horizontal">                   
                                        <table width="200" align="center">
                                            <tr>
                                                <td align="center">
                                                <input class="boutonbleulong" align="center" type="submit" name="action" value="Compte Joint">                    
                                                </td>
                                            </tr>    
                                        </table>
                                    </form> 
                                </td>
                            </tr>
                        </table>
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
