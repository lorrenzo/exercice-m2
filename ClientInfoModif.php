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
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">MES INFORMATIONS PERSONNELLES</h1></td>
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
                        <div class="container">            
                            <?php
                            
                                // test si le post contient des valeurs
                                if (isset($_POST["action"])){

                                    // test si le nom et le prénom sont vides
                                    if(empty($_POST['nom']) && empty($_POST['prenom'])){
                                        // pas d'execution de la requete
                                        echo "le nom et le prenom sont vides <br/>";                        
                                    }
                                    else{
                                        //Execution de la requete de mise à jour des informations du clients
                                        //Mise a jour dans la base de données des informations du client avec une commande UPDATE
                                        $sql = "UPDATE clients
                                                    SET 
                                                        clients.numero_voie ='".$_POST['numero_voie']."',
                                                        clients.nom_voie = '".$_POST['Nom_voie']."',
                                                        clients.nom_voie_2 = '".$_POST['Nom_voie_2']."',
                                                        clients.code_postal = '".$_POST['code_postal']."',
                                                        clients.ville = '".$_POST['ville']."',
                                                        clients.telephone = '".$_POST['telephone']."',
                                                        clients.email = '".$_POST['email']."'
                                                    WHERE    
                                                        clients.id_client = " . $_SESSION['user_id'] . "";
                                        executeQuery($sql);
                                        }                                                                              
                                }
                                else{
                                    echo "rien dans le POST";
                                }                   
                            ?>
                        </div>           
<br/>
                        <!-- Bloc de confirmation-->
                        <table width="800" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt1"><b>Vos informations personnelles ont bien &eacute;t&eacute; modifi&eacute;es.</b></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
<br/>            
<br/>            
            <!-- Bouton de retour à la page d'accueil-->
            <div> 
                <form action="">
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
<br/>
<br/>
<br/>	        
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
