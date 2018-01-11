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
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">CR&Eacute;ER UN NOUVEAU COMPTE</h1></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
                        <!-- Bloc de confirmation-->
                        <div class="container">            
                            <?php
                            
                                // test si le post contient des valeurs
                                if (isset($_POST["action"])){

                                    // test si le nom et le prénom sont vides
                                    if(empty($_POST['montant']) && empty($_POST['id_compte'])){
                                        // pas d'execution de la requete
                                        echo "le type de compte et le montant sont vides <br/>";                        
                                    }
                                    else{
                                        // execution de la requete

                                        //echo $_POST['id_compte'];
                                        echo $_POST['montant'];

                                        
                                        //INSERT INTO comptes (id_client,type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,num_compte,cle_rib,autorisation_decouvert,limite_virement) VALUES (00000000004,'CHQ','FR7612002658960000000000176','FR','76','12002','65896','00000000007','76',1500,1000);

                                        //Insert dans la base de données les informations du client
                                        /*$sql = "INSERT into comptes (type_compte,iban,pays_banque,cle_controle,code_banque,code_guichet,num_compte,cle_rib,autorisation_decouvert,limite_virement)
                                                    
                                                    VALUES('".$_POST['id_compte']."','FR7612002658960000000000176','FR','76','12002','','00000000007','76',1500,1000)
                                                    
                                                    WHERE    
                                                        comptes.id_client = " . $_SESSION['user_id'] . "";
                                        executeQuery($sql);*/

                                        echo "Insert OK <br/>";                                               
                                        }                                                                              
                                }
                                else{
                                    echo "rien dans le POST";
                                }                   
                            ?>

                            <h2 class="txt1">Votre demande a bien &eacute;t&eacute; prise en compte.</h2>
                        </div>
                        <!-- Boutons d'actions-->
                        <div> 
                            <form action="HomePage.php">
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
