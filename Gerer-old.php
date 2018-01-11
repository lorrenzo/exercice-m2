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
                                                    <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">MES SERVICES</h1></td>
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
                                <td class="txt1" bgcolor="#c2c2c2"> 
                                    <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#c2c2c2">
                                        <tr>
                                            <td width="5%" bgcolor="#F5F5F5" class="txt3" align="middle" valign="middle"><img src="./images/Virement.png" width="40" height="40">
                                            </td>
                                            <td width="95%" bgcolor="#F5F5F5" class="txt3" align="left" valign="middle"><a href="VirementInitier.php" class="txt3"><h3>VIREMENTS</h3></a>
                                                Effectuer un virement, programmer mon &eacute;pargne
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="5%" bgcolor="#F5F5F5" width="100%" class="txt3" align="middle" valign="middle"><img src="./images/NewCompte.png" width="40" height="40">
                                            </td>
                                           <td width="95%" bgcolor="#F5F5F5" width="100%" class="txt3" align="left" valign="middle"><a href="NewCompteInitier.php" class="txt3"><h3>NOUVEAU COMPTE</h3></a>
                                               Ouvrir un nouveau compte
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="5%" bgcolor="#F5F5F5" width="100%" class="txt3" align="middle" valign="middle"><img src="./images/NewBeneficiaire.png" width="40" height="40">
                                            </td>
                                            <td width="95%" bgcolor="#F5F5F5" width="100%" class="txt3" align="left" valign="middle"><a href="Beneficiaires.php" class="txt3"><h3>B&Eacute;N&Eacute;FICIAIRES</h3></a>
                                               Consulter la liste de mes b&eacute;n&eacute;ficiaires, ajouter de nouveaux b&eacute;n&eacute;ficiaires
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
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
