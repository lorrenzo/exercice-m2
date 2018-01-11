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
                                                    <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">MES B&Eacute;N&Eacute;FICIAIRES</h1></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
<br/>
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
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond3.png" width="40" height="40"></td>
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>VALIDATION</b></td>
                                                        <td width="60%" class="txt5" align="left" valign="middle"></td>
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

                        <!-- Bloc de confirmation //-->
                        <div>
                            <span>Le b&eacute;n&eacute;ficiaire a bien &eacute;t&eacute; ajout&eacute;. 
                            </span>
                        </div>
    <br/>
    <br/>
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
                    </td>
                </tr>
            </table>
<br/><br/>
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
