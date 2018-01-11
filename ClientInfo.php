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
                    </td>
                </tr>
            </table>
<br/> 
<br/> 
                       <table width="1200" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td width="440" align="left" class="txt4" >Vos informations personnelles</td>
                            </tr>
                        </table>
<br/> 
                        <div class="container">                   
                            <form method="post" action="ClientInfoModif.php" class="form-horizontal">                   
                                        <?php        			
                                        //selection des champs civilite, nom et prenom afin d'afficher en haut de la page le nom de la personne connectée
                                        $sql= 	"SELECT
                                                        civilite,
                                                        nom,
                                                        prenom,
                                                        numero_voie,
                                                        nom_voie,
                                                        nom_voie_2,
                                                        code_postal,
                                                        ville,
                                                        telephone,
                                                        email 
                                                FROM 
                                                        clients 
                                                WHERE 
                                                        id_client=" . $_SESSION['user_id'] . ";";
                                        
                                        // echo $sql pour afficher le nom de l'utilisateur;

                                        $result = mysqli_query($db,$sql);

                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                        $civilite = $row['civilite'];
                                                        $nom=$row['nom'];
                                                        $prenom=$row['prenom'];
                                                        $numero_voie=$row['numero_voie'];
                                                        $nom_voie=$row['nom_voie'];
                                                        $nom_voie_2=$row['nom_voie_2'];
                                                        $code_postal=$row['code_postal'];
                                                        $ville=$row['ville'];
                                                        $telephone=$row['telephone'];
                                                        $email=$row['email'];

                                        ?>
                                         
                            
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <?php 
                                    echo "<div class='txt5'>";
                                    echo $row['civilite'];
                                    echo "</div>";
                                    ?>
                                    <input type="text" value="<?php echo $row['nom']; ?>" size="50" placeholder="Nom" name="prenom" READONLY >  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="text" value="<?php echo $row['prenom']; ?>" size="50" placeholder="Pr&eacute;nom" name="prenom" READONLY >  
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-sm-4">
                                    <input type="text" value="<?php echo $row['numero_voie']; ?>" size="5" class="form-control" placeholder="Num&eacute;ro voie" name="numero_voie" required="required">  
                                    <br/>
                                    <input type="text" value="<?php echo $row['nom_voie']; ?>"  size="30" class="form-control" placeholder="Nom voie - Rue, avenue, ..." name="Nom_voie" required="required">  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="text" value="<?php echo $row['nom_voie_2']; ?>"  size="50" class="form-control" placeholder="Compl&eacute;ment d'adresse" name="Nom_voie_2">  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="text" value="<?php echo $row['code_postal']; ?>"  size="5" class="form-control" placeholder="Code Postal" name="code_postal" required="required">  
                                    <br/>
                                    <input type="text" value="<?php echo $row['ville']; ?>"  size="40" class="form-control" placeholder="Ville" name="ville" required="required">  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-sm-4">
                                    <!--tester le champ-->
                                    <input type="text" value="<?php echo $row['telephone']; ?>" title="0999999999" size="10" class="form-control" placeholder="Num&eacute;ro de t&eacute;l&eacute;phone" name="telephone">  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-sm-4">
                                    <input type="email" value="<?php echo $row['email']; ?>" size="30" class="form-control" placeholder="Adresse mail" name="email" required="required">  
                                </div>
                            </div>
                            <table width="1200" border="0" cellspacing="0" cellpadding="0">
                                <tr> 
                                    <td width="440" align="left" class="txt4" >Votre agence</td>
                                </tr>
                            </table>
<br/> 
                            <div class="form-group">
                                <div class=" col-sm-4">
					<select class="form-control" id="agence" name="agence" >");

						<?php
						$sql=	"
							SELECT DISTINCT
								agences.id_agence,
								agences.libelle
							FROM 
								clients
								join comptes on comptes.id_client=clients.id_client
								join agences on agences.id_agence = comptes.id_agence
							WHERE
								clients.id_client = " . $_SESSION['user_id'] ."				
							";
					

						//		
						$result = executeQuery($sql);
						
						//
						if ($result->num_rows > 0) 
						{
 							//
							$row = $result->fetch_assoc();
						
							//
							echo ("<option value=\"" . $row['id_agence'] ."\" > " . $row['libelle'] ." </option>");							
						}
						else
						{
							echo ("<option value=\"\" > </option>");    							
						}
                                                ?>
					</select>
                                    </div>
                                </div>
<br/><br/>
                            <table width="700" align="center">
                                <tr>
                                    <td align="center">
                                    <input class="boutonbleu" align="center" type="submit" name="action" value="Modifier">                    
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
