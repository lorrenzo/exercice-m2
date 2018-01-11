<?php
	include('session.php');
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");
	$error = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
      
		// nom et prenom envoyes a partir de la form 

		$nom_2 = $_POST['nom'];
		$prenom_2 = $_POST['prenom']; 

		$sql = "SELECT
                            id_client,
                            nom,
                            prenom 
                            
                        FROM 
                            clients 
                            
                        WHERE 
                            nom = '$nom_2' and prenom = '$prenom_2'";

		//echo $sql;

		$result = mysqli_query($db,$sql);
		 		
		$count = mysqli_num_rows($result);

                // If result matched $nom and $prenom, table row must be 1 row
		
		if($count == 1) 
		{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
                        $id_client_2=$row['id_client'];
                        $nom_2=$row['nom'];
                        $prenom_2=$row['prenom'];
 			header("location:BeneficiairesCompte.php?id_client=".$id_client_2."");
		}
		else
		{
			$error = "Le b&eacute;n&eacute;ficiaire n'est pas client de notre banque";			
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
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>SAISIR UN B&Eacute;N&Eacute;FICIAIRE</b></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
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
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="nom">Nom&nbsp;
                                </label> 
                                <div class=" col-sm-4">
                                    <input type="text" size="50" class="form-control"  name="nom" required="required" >  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="prenom">Pr&eacute;nom&nbsp;
                                </label> 
                                <div class=" col-sm-4">
                                    <input type="text" size="50" class="form-control"  name="prenom" required="required" >  
                                </div>
                            </div>
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

<br/>
<br/>
<br/>	        
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
