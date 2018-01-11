<?php
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");

        	//	
        if (isset($_POST["action"]))
	{
		//creer une fonction dans fonction.php creer_client($post)

                //Vérifier que l'adresse email utilisee en identifiant n'est pas deja utilisee
            
		$sql= " SELECT 
                            clients.email
                        FROM
                            clients
                        WHERE clients.email = '" . $_POST['email'] . "'";

		//		
		$result = executeQuery($sql);

		//		
		$count = $result->num_rows;
                
                //echo "$count";

		//
		if ($count > 0)
		{
			return 10001;			
		}
		
		// Créer le client

		$sql= 	" INSERT INTO clients 	(	
							civilite,
							nom,
							prenom,
                                                        datenaiss,
                                                        nationalite,
                                                        numero_voie,
                                                        Nom_voie,
                                                        Nom_voie_2,
                                                        code_postal,
                                                        ville,
                                                        telephone,
                                                        email,
							password
						) 
						VALUES 
						("
							. "'" . $_POST['civilite'] . "',"
							. "'" . $_POST['nom'] . "',"
							. "'" . $_POST['prenom'] . "',"
							. "'" . $_POST['datenaiss'] . "',"
							. "'" . $_POST['nationalite'] . "',"
							. "'" . $_POST['numero_voie'] . "',"
							. "'" . $_POST['Nom_voie'] . "',"
							. "'" . $_POST['Nom_voie_2'] . "',"
							. "'" . $_POST['code_postal'] . "',"
							. "'" . $_POST['ville'] . "',"
							. "'" . $_POST['telephone'] . "',"
							. "'" . $_POST['email'] . "',"
							. "'" . $_POST['password'] . "'						
						)
			";

		//echo "$sql <br>";

		//	
		$result = executeQuery($sql);
		
		//echo "$result";
			
		// ----------------------------------------------------------
		// Récupèrer le id_client du client créé (AUTO_INCREMENT)

		//
		$sql= " SELECT 
                            clients.id_client 
                            
                        FROM 
                            clients 
                        
                        WHERE 
                            clients.email = '" . $_POST['email'] . "'";

		echo "$sql <br>";
		
		//		
		$result = executeQuery($sql);
		
		//		
		$count = $result->num_rows;

		//
		if ($count == 0)
		{
			return 10003;
		}
		else
		{
			//		
			$row = $result->fetch_assoc();
			
			//
			$id_client = $row['id_client'];
			
			//echo $id_client;
		}

		
	}
	else
	{
                                                echo "rien dans le POST";

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
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond3.png" width="40" height="40"></td>
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>VOTRE COMPTE</b></td>
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
                        <!-- Bloc de confirmation-->
                       <table width="800" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt1"><b>Vos informations personnelles ont bien &eacute;t&eacute; prises en compte.</b></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="txt7">Vous allez maintenant choisir votre agence de rattachement.</td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
<br/> 
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                             <tr> 
                                 <td width="440" align="center" class="txt4" >Votre agence de rattachement</td>
                             </tr>
                        </table>
<br/> 
                        <div class="container">                   
                            <form method="post" action="NewClientConfirmer.php" class="form-horizontal">                   
                            <table width="700" align="center" border ="0" cellspacing="0" cellpadding="5">
                                <tr> 
                                    <td align="right">Agence de rattachement</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="txt5">
                                                    <?php
                                                        require "config.php";
                                                            //
                                                            $sql= 	"
                                                                    SELECT 
                                                                            code_guichet,
                                                                            libelle
                                                                    FROM 
                                                                            agences
                                                                    ";
                                                          // echo $sql;

                                                            $result = mysqli_query($db,$sql);

                                                            $count = mysqli_num_rows($result);

                                                            //Affichage de la liste des agences
                                                            if($count >= 1) 
                                                            {					
                                                                    for ( $i = 1; $i <= $count; $i++ ) 
                                                                    {
                                                                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                                            $code_guichet = $row['code_guichet'];
                                                                            $libelle=$row['libelle'];

                                                                            if ($i == 1)
                                                                            {						
                                                                                echo ("<select>");						
                                                                                echo ("<option value='' >S&eacute;lectionnez votre agence</option>");
                                                                            }
                                                                                //mettre une option value
                                                                                    echo "<option value='.$code_guichet.'>".$libelle."</option>";

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
                                    </td>
                                </tr>
                            </table>
                                <hr color="#c2c2c2" width="75%">
                                <br/>
                            <table width="1200" border="0" cellspacing="0" cellpadding="0">
                                 <tr> 
                                     <td width="440" align="center" class="txt4">Montant du virement initial</td>
                                 </tr>
                            </table>
<br/> 
                            <table width="700" align="center" border ="0" cellspacing="0" cellpadding="5">
                                <!--Saisie du montant initial lors de la creation-->
                                <tr>   
                                    <td width="45%" align="right">Montant de votre virement en Euros&nbsp;</td> 
                                    <td width="55%">
                                        <div class="form-group">
                                            <div class="col-xs-3">
                                                <input type="text" pattern="[0-9]{1,10}" size="10" class="form-control"  name="montant" required="required" >  
                                            </div>                                
                                        </div>     
                                    </td>
                                </tr>
                                <tr>   
                                    <td>
                                        <div class="form-group">
                                            <div class="col-xs-3">
                                                <!--a gérer - traiter avec un formulaire?-->
                                                <input type="hidden" id="id_client" value="id_client"> 
                                            </div>                                
                                        </div>     
                                    </td>
                                </tr>
                            </table>           
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
