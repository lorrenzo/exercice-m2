<?php
	include('session.php');
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
                        <!--Creation du menu-->
                        <?php barre_menu (); ?>
<br/>
                        <!--Creation du sous-menu et du titre--> 
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt1" bgcolor="#c2c2c2"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#c2c2c2">
                                        <tr> 
                                            <td> 
                                                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                                    <tr>
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">MES DOCUMENTS</h1></td>
                                                    </tr>
                                                </table>
                                            </td>
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
<br/>            
                        <!--Creation du menu de gestion (virement, commande chequier et ouvrir un nouveau compte)--> 
                        <table width="1000" align="center" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="5%" bgcolor="#F5F5F5" width="100%" class="txt3" align="middle" valign="middle">&nbsp;<img src="./images/Commande.png" width="42" height="40">
                                    </td>
                                    <td width="95%" bgcolor="#F5F5F5" width="100%" class="txt3" align="left" valign="middle"><a href="ChequierCommande.php" class="txt3"><h3>COMMANDES</h3></a>
                                        Obtenir des ch&eacute;quiers
                                    </td>
                                </tr>
                                <tr>
                                   <td width="5%" bgcolor="#F5F5F5" width="100%" class="txt3" align="middle" valign="middle"><img src="./images/Rib.png" width="45" height="40">
                                    </td>
                                   <td width="95%" bgcolor="#F5F5F5" width="100%" class="txt3" align="left" valign="middle"><a href="Rib.php" class="txt3"><h3>RIB</h3></a>
                                       &Eacute;diter un RIB
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
