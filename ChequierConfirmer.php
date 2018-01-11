<?php
        require("fonction.php");
        include('session.php');
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
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
<br/>
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
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">CH&Eacute;QUIER CONFIRMER</h1></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
                        <!-- Bloc de confirmation //-->
                        <div class="bloc Tmargin">
                                <h2 class="txt1">Votre demande a bien &eacute;t&eacute; prise en compte</h2>
                        </div>
                        <!-- Boutons d'actions-->
                        <div> 
                            <form action="ConsulterComptes.php">
                                <table width="700" align="center">
                                <tr>
                                    <td align="center">
                                        <input class="boutonbleu" type="button" value="OK" onclick="Javascript:window.document.location.href='ConsulterComptes.php';">                  
                                    </td>
                                </tr>    
                                </table>
                            </form> 
                        </div>    
                    </td>
                </tr>
            </table>
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
