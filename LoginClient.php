<?php

	session_start();
	include("config.php");
    require("fonction.php");

	$error = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
      
		// email and password envoyes a partir de la form 

		$myemail = $_POST['email'];
		$mypassword = $_POST['password']; 
                
		$sql = "SELECT id_client,nom,prenom FROM clients WHERE email = '$myemail' and password = '$mypassword'";
			
		//echo $sql;

		$result = mysqli_query($db,$sql);
		 		
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($result);


      		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count == 1)
		{
		    $_SESSION['login_user'] = $myemail;
            $_SESSION['user_id'] 	= $row['id_client'];

			header('Location: ClientInfo.php');
		}
		else
		{
			$error = "Votre identifiant ou votre mot de passe est invalide";
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
<?php 
    include("header.php"); 
    include("navbar.php");
?>
            <!--Center pour que le tableau soit centr�-->
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
                        <table width="500" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td width="440" align="left" class="txt1" >Connexion - Ma Banque en ligne</td>
                            </tr>
                            <tr> 
                                <td>&nbsp;<br></td>
                            </tr>
                            <tr> 
                                <td class="txt7" align="left" valign="middle">Bonjour, veuillez saisir votre identifiant et votre mot de passe.<br></td>
                            </tr>
                            <tr>
                                <td class="txt3" align="left" >Les champs suivis d'un <b class="texteenrouge">*</b> sont obligatoires.</td>
                            </tr>
                            <br/><br/>
                            <br/><br/>
                        </table>           
<br/>
<br/>
<br/>
            <!--Creation du titre du formulaire-->
            <table width="1200" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                    <td width="440" align="center" class="txt4" >Saisie de vos identifiants</td>
                </tr>
            </table>
<br/> 
            <!--Creation de la zone de saisie des identifiants et des boutons de validation-->
            <div class="container">                   
                <form method="post" action="" class="form-horizontal">                   
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Identifiant&nbsp;<b class="texteenrouge">*</b>
                                </label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" id="mail" name="email"  placeholder="Entrez votre adresse email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="inputPassword">Mot de passe<b class="texteenrouge">*</b>
                                </label> 
                                <div class=" col-sm-4">
                                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Entrez votre mot de passe" required>
                                </div>
                            </div>
                    <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                    <br/><br/>
                    <table width="700" align="center">
                        <tr>
                            <td align="center">
                            <input class="boutonbleu" align="center" type="submit" name="action" value="OK">                    
                            </td>
                        </tr>    
                    </table>
                </form> 
            </div>
                <br/><br/>
                <br/><br/>
                <br/><br/>
                <br/><br/>
                <br/><br/>
                </tr>
            </table>
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>