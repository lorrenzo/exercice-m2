<?php
        session_start();
        require("fonction.php");
        include("header.php");
        include("navbar.php");
        require "config.php";
        $error="";


        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
                //V�rifier que l'adresse email utilisee en identifiant n'est pas deja utilisee
            
		$sql= " SELECT 
                            clients.email
                        FROM
                            clients
                        WHERE clients.email = '" . $_POST['email'] . "'";

		//		
		$result = executeQuery($sql);

		//		
		$count = $result->num_rows;
                
		//
		if ($count > 0)
		{
                      $error = "L'email (" . $_POST['email'] . ") est d&eacute;ja utilis&eacute;. Veuillez en utiliser un autre.";
                }
                
                else {
     
 		
		// Cr�er le client

		$sql= 	" INSERT INTO clients 	(	
							civilite,
							nom,
							prenom,
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

		//	
		$result = executeQuery($sql);
		
			
		// ----------------------------------------------------------
		// R�cup�rer le id_client du client cr�� (AUTO_INCREMENT)

		//
		$sql= " SELECT 
                            clients.id_client 
                            
                        FROM 
                            clients 
                        
                        WHERE 
                            clients.email = '" . $_POST['email'] . "'";

		
                //Execution de la requete		
		$result = executeQuery($sql);
		
		//		
		$count = $result->num_rows;

		//
		if ($count == 0)
		{
			die("Erreur recuperation de l'id client");
		}
		else
		{
			//		
			$row = $result->fetch_assoc();
			
			//
			$id_client = $row['id_client'];
		}
                
                	// ----------------------------------------------------------
                        // Cr�er les comptes selectionn�s

                        foreach($_POST['compte'] as $compte)
                        {

                                $sql=	"
                                        INSERT INTO comptes 	(
                                                    id_agence,
                                                    id_client,
                                                    type_compte,
                                                    autorisation_decouvert
                                            ) 
                                            VALUES 
                                            ("
                                                    . $_POST['agence'] 	. ","
                                                    . $id_client 		. ","
                                                    . "'" .	$compte 	. "',
                                                     (SELECT autorisation_decouvert FROM type_compte WHERE type_compte = '" . $compte  ."')
                                            )
                                        ";


                                //Execution de la requete		
                                $result = executeQuery($sql);

                                // Redirection vers la page de confirmation
                                header("location:NewClientConfirmer.php");

                        }
                }
	}
	else
	{
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
                                                        <td width="15%" class="txt6" align="left" valign="middle"><b>VOS INFORMATIONS</b></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
                                                        <td width="70%" class="txt5" align="left" valign="middle"></td>
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
                                <td class="txt7">Pour favoriser votre exp&eacute;rience, nous vous invitons &agrave; compl&eacute;ter vos coordonn&eacute;es dans le formulaire ci-dessous.</td>              
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="txt3" align="left" >Les champs suivis d'un <b class="texteenrouge">*</b> sont obligatoires.</td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
<br/> 
<br/>
                       <table width="1200" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td width="440" align="center" class="txt4" >Vos informations personnelles</td>
                            </tr>
                        </table>
<br/> 
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                            <div class="form-group">
                                <!-- Saisie des informations personnelles-->
                                <label class="control-label col-sm-4" for="civilite">Civilit&eacute;&nbsp;<b class="texteenrouge">*</b>
                                </label>
                                <div class="col-sm-2">
                                    <!-- Tester les radio button et les repositionner!-->
                                    <div class="radio"><label class="txt5"><input type="radio" name="civilite" value="MR" required="required"> Mr</label>	</div>
                                    <div class="radio"><label class="txt5"><input type="radio" name="civilite" value="MME" required="required"> Mme</label>	</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="nom">Nom&nbsp;<b class="texteenrouge">*</b>
                                </label> 
                                <div class=" col-sm-4">
                                    <input type="text" pattern="[a-zA-Z&amp;#39;&auml;&agrave;&acirc;&aelig;&ccedil;&egrave;&eacute;&ecirc;&euml;&icirc;&iuml;&ocirc;&ugrave;&ucirc;&uuml;&oelig;-]{1,50}" size="50" class="form-control"  placeholder="Nom" name="nom" required="required" >  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="prenom">Pr&eacute;nom<b class="texteenrouge">*</b>
                                </label> 
                                <div class="col-sm-4">
                                    <input type="text" pattern="[a-zA-Z&amp;#39;&auml;&agrave;&acirc;&aelig;&ccedil;&egrave;&eacute;&ecirc;&euml;&icirc;&iuml;&ocirc;&ugrave;&ucirc;&uuml;&oelig;-]{1,50}" size="50" class="form-control"  placeholder="Pr&eacute;nom" name="prenom" required="required" >  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="nationalite">Nationalit&eacute;&nbsp;
                                </label> 
                                <div class="col-sm-3">
                                    <select id="Nationalite" name="nationalite" class="form-control"> 
                                            <option value="FR" >Fran&#231;aise</option> 
                                            <option value="UE" >Union Europ&#233;enne (hors France)</option> 
                                            <option value="HUE" >Hors Union Europ&#233;enne</option> 
                                    </select> 		
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="adresse">Adresse&nbsp;
                                </label> 
                                <div class="col-sm-4">
                                    <label for="lAdresseNum" class="txt5">Num&eacute;ro<b class="texteenrouge">*</b></label>                        
                                    <input type="text" pattern="[0-9]{1,5}" class="form-control"  size="5" placeholder="Num&eacute;ro voie" name="numero_voie" required="required">  
                                    <label for="lAdresseRue" class="txt5">Voie</label>                        
                                    <input type="text" class="form-control"  size="30" placeholder="Nom voie - Rue, avenue, ..." name="Nom_voie" required="required">  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="complement">Compl&eacute;ment d'adresse
                                </label> 
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Compl&eacute;ment d'adresse" size="50" name="Nom_voie_2">  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                </label> 
                                <div class="col-sm-4">
                                    <label for="lAdresseCP" class="txt5">Code Postal<b class="texteenrouge">*</b></label>                        
                                    <input type="text" pattern="[0-9]{5,5}" class="form-control"  size="5" placeholder="Code Postal" name="code_postal" required="required">  
                                    <label for="lAdresseVille" class="txt5">Ville<b class="texteenrouge">*</b></label>                        
                                    <input type="text" class="form-control"  size="40" placeholder="Ville" name="ville">  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="telephone">Num&eacute;ro de t&eacute;l&eacute;phone<b class="texteenrouge">*</b>
                                </label> 
                                <div class="col-sm-4">
                                    <!--tester le champ-->
                                    <input type="text" pattern="[0-9]{10,10}" size="10" class="form-control" title="0999999999" placeholder="Num&eacute;ro de t&eacute;l&eacute;phone" name="telephone" required="required">  
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Adresse mail<b class="texteenrouge">*</b>
                                </label> 
                                <div class="col-sm-4">
                                    <!--tester le champ notamment avec l'@ + mettre le champ en required-->
                                    <input type="email" pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" size="30" class="form-control" placeholder="Adresse mail" name="email" required="required">  
                                </div>
                            </div>
                            <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="password">Mot de passe<b class="texteenrouge">*</b></label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" required>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="password" class="control-label col-sm-4">Confirmation</label>
                                <div class="col-sm-4">
                                  <input type="password" name="password" class="form-control" id="confirm_password" data-match="password" data-match-error="Whoops, these don't match" required>
                                </div>
                            </div>
                           <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                           <script type="text/javascript" src="//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js">
                             var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
                             function validatePassword()
                             {
                               if(password.value != confirm_password.value) 
                               {
                                 confirm_password.setCustomValidity("Veuillez saisir des mots de passe identiques");
                               } 
                               else {confirm_password.setCustomValidity('');}
                             }
                             password.onchange = validatePassword;
                             confirm_password.onkeyup = validatePassword;
                            </script>-->
                            <!-- Selection des informations bancaires-->
                            <table width="1200" border="0" cellspacing="0" cellpadding="0">
                                 <tr> 
                                     <td width="440" align="center" class="txt4" >Ouverture de Compte</td>
                                 </tr>
                             </table>
<br/> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="agence">Choix de l'agence<b class="texteenrouge">*</b></label>
                                <div class="col-sm-4">
                                     <?php
                                        	//Requ�te et affichage de la liste des agences					//
						$sql= " SELECT
                                                            agences.id_agence,
                                                            agences.libelle 
                                                        FROM 
                                                            agences 
                                                        ORDER BY agences.id_agence";

						//		
                                                $result = mysqli_query($db,$sql);

                                                $count = mysqli_num_rows($result);
						
                                                
                                                            //Affichage de la liste des agences
                                                            if($count >= 1) 
                                                            {					
                                                                    for ( $i = 1; $i <= $count; $i++ ) 
                                                                    {
                                                                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                                            $id_agence = $row['id_agence'];
                                                                            $libelle=$row['libelle'];

                                                                            if ($i == 1)
                                                                            {						
                                                                                echo ("<select id='agence' name='agence'>");						
                                                                                echo ("<option value='' ></option>");
                                                                            }
                                                                                //mettre une option value
                                                                                    echo "<option value='$id_agence'>".$libelle."</option>";

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
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="compte">Choix du type de compte</label>
                                <div class="col-sm-4">
                                     <?php
                                        	//Requ�te et affichage de la liste des comptes - CHQ est coche par defaut		
						$sql= " SELECT
                                                            type_compte,
                                                            libelle,
                                                            autorisation_decouvert
                                                        FROM 
                                                            type_compte 
                                                        ORDER BY type_compte";
                                                
						//		
        					$result = executeQuery($sql);

                                                if ($result->num_rows > 0) 
                                                {
                                                        //
                                                        while($row = $result->fetch_assoc()) 
                                                        {
                                                                //
                                                                if ( $row['type_compte'] == "CHQ")
                                                                {
                                                                        echo ("<div class=\"checkbox\">	<label><input 	type=\"checkbox\" name=\"compte[]\" value=\"". $row['type_compte'] ."\" checked disabled > " . $row['libelle'] . " (" . $row['type_compte']  . ") </label>	</div>");

                                                                        echo ("<input type=\"hidden\" name=\"compte[]\" value=\"". $row['type_compte'] ."\" >");
                                                                }
                                                                else
                                                                {
                                                                        echo ("<div class=\"checkbox\">	<label><input 	type=\"checkbox\" name=\"compte[]\" value=\"". $row['type_compte'] ."\" > " . $row['libelle'] . " (" . $row['type_compte']  . ") </label>	</div>");
                                                                }

                                                        } 
                                                }
                                                            else
                                                            {
                                                                
                                                            }
                                    ?>
                                </div>
                            </div>
<br/><br/>
                            <table width="700" align="center">
                                <tr>
                                    <td align="center">
                                    <input class="boutonbleu" align="right" type="button" value="Annuler" onclick="Javascript:window.document.location.href='HomePage.php';">                    
                                    </td>
                                    <td align="center">
                                    <input class="boutonbleu" align="left" type="submit" name="action" value="Etape suivante">                    
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
