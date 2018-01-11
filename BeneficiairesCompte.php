<?php
	include('session.php');
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");
	$error = "";
        
        //affichage de l'information passee dans le POST
                $id_client_2=$_GET['id_client'];

                $id_client = $_SESSION['user_id'];
		//$id_client_benef = $id_client_2; 
        
        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
 
            if(isset($_POST['CptBeneficiaire'])? $_POST['CptBeneficiaire']:false){

                
                    // V�rifier que le beneficiaire n'existe pas deja

                    $sql= "SELECT
                                beneficiaires.id_client,
                                beneficiaires.id_client_benef,
                                beneficiaires.id_compte
                            
                            FROM 
                                beneficiaires
                            
                            WHERE 
                                beneficiaires.id_client_benef = '" .$id_client_2. "' and beneficiaires.id_compte = '".$_POST['CptBeneficiaire']."'";

                    //		
                    $result = executeQuery($sql);

                    //	
                    $count = $result->num_rows;
                    echo "$count";
                    //
                    if ($count > 0)
                    {
                            $error = "Ce b&eacute;n&eacute;ficiaire existe d&eacute;j&agrave;.";
                    }
                    else
                    {
                
                    //Creer le beneficiaire
                    $sql = "INSERT INTO 
                                beneficiaires 
                                (id_client,id_client_benef,id_compte)

                            VALUES 
                                ('". $_SESSION['user_id'] ."','".$id_client_2."','".$_POST['CptBeneficiaire']."')";

                    executeQuery($sql);
                    header('Location: BeneficiaireConfirmer.php');
                    }

            }
            else
            {
                    $error = "Vous n'avez pas s&eacute;lectionn&eacute; de compte";			
            }
        }

?>



<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="./style/style.css" type="text/css">
    </head>
    <body class="body">
        <!--Center pour que le tableau soit centr�-->
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
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
                        <!--Creation du chemin d'avancement-->
                        <table width="600" border="0" cellspacing="0" cellpadding="0">
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
                                                        <td width="20%" class="txt6" align="left" valign="middle"><b>S&Eacute;LECTIONNER UN COMPTE</b></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond3.png" width="40" height="40"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
<br/><br/>

                        <!--Creation de la zone de selection des comptes et du bouton etape suivante-->
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                                            <?php
                                                             //selection des comptes du beneficiaire
                                                            $sql= "
                                                                    SELECT 
                                                                            clients.civilite as civilite2,
                                                                            clients.nom as nom2,
                                                                            clients.prenom as prenom2,
                                                                            comptes.id_compte,
                                                                            comptes.type_compte
                                                                    FROM 
                                                                            clients,comptes 
                                                                    WHERE
                                                                            comptes.id_client = " .$id_client_2. " and clients.id_client = " .$id_client_2. "
                                                                    ";

                                                            // echo $sql;


                                                            $result = mysqli_query($db,$sql);

                                                            $count = mysqli_num_rows($result);

                                                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                            
                                                            $civilite2=$row['civilite2'];
                                                            $nom2=$row['nom2'];
                                                            $prenom2=$row['prenom2'];

                                                            echo "Veuillez s&eacute;lectionner le compte&nbsp;de " . $civilite2 . " " . $prenom2 . " " . $nom2 . "" ;
                                                            ?>
<br/><br/>
                                <div class="form-group">
                                    <label class="control-label col-sm-6" for="beneficiaire">Compte du b&eacute;n&eacute;ficiaire
                                    </label> 
                                    <div class="col-sm-4">
                                            <?php

                                                    // echo $sql;

                                                    $result = mysqli_query($db,$sql);

                                                    $count = mysqli_num_rows($result);

                                                    //Affichage de la liste des comptes
                                                    if($count >= 1) 
                                                    {					
                                                            for ( $i = 1; $i <= $count; $i++ ) 
                                                            {
                                                                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                                    $id_compte=$row['id_compte'];
                                                                    $type_compte=$row['type_compte'];


                                                                    if ($i == 1)
                                                                    {						
                                                                        echo ("<select name='CptBeneficiaire'>");						
                                                                        echo ("<option value='' ></option>");
                                                                    }
                                                                        //mettre une option value
                                                                            echo "<option value='$id_compte'>".$type_compte."&nbsp;-&nbsp;N&deg;&nbsp;".$id_compte ."</option>";

                                                                    if ($i == $count)
                                                                    {
                                                                            echo("</select>");
                                                                    }

                                                            }				
                                                    }
                                                    else
                                                    {

                                                    }

                                            ?>						
                                    </div>
                                </div>
<br/>
                            <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                                <br/><br/>
                            <table width="700" align="center">
                                <tr>
                                    <td align="center">
                                    <input class="boutonbleu" align="center" type="submit" name="action" value="Etape suivante">                    
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
<br/>
<br/>
<br/>	        
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
