<?php
	include('session.php');
        $error1 = "";
        $error2 = "";
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");

        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
                // Créer les nouveaux comptes selectionnés

            if(isset($_POST['typecompte'])? $_POST['typecompte']:false){
                                
                                // récuperer l'agence du client

                                $sql=	"
                                SELECT DISTINCT
                                        agences.id_agence,
                                        agences.libelle
                                FROM 
                                        clients
                                        join comptes on comptes.id_client=clients.id_client
                                        join agences on agences.id_agence = comptes.id_agence
                                WHERE
                                        clients.id_client=" . $_SESSION['user_id'] . "				
                                ";


                                            echo $sql;

                                            //		
                                            $result = executeQuery($sql);

                                            //		
                                            $count = $result->num_rows;

                                            //
                                            if ($count == 0)
                                            {
                                                    die("Erreur recuperation agence");
                                            }
                                            else
                                            {
                                                    //		
                                                    $row = $result->fetch_assoc();

                                                    //					
                                                    $id_agence = $row['id_agence'];

                                                    echo "$id_agence";

                
				$sql=	"
					INSERT INTO comptes 	(
									id_agence,
									id_client,
									type_compte,
									autorisation_decouvert
								) 
								VALUES 
								("
									. $id_agence 	. ","
									. $_SESSION['user_id']	. ","
									. "'" .$_POST['typecompte']. "',
									 (SELECT autorisation_decouvert FROM type_compte WHERE type_compte = '" .$_POST['typecompte']."')
								)
					";

				echo "$sql <br>";
	
				//		
				$result = executeQuery($sql);
                                
                                //redirection vers la page de confirmation
                                header("location:NewCompteConfirmer.php");
                                            }

                }
                else 
                {
                        $error1 = "Vous devez s&eacute;lectionner un type de compte";
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
<br/>
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                                <table width="1200" border="0" cellspacing="0" cellpadding="0">
                                     <tr> 
                                         <td width="440" align="center" class="txt4">Choix du type de compte</td>
                                     </tr>
                                </table>
                                <br/>
                               <div class="form-group">
                                    <label class="control-label col-sm-4" for="beneficiaire">
                                    </label> 
                                    <div class="col-sm-6">
                                               <?php
                                                    //
                                                    $sql=	"
                                                            SELECT 
                                                                    type_compte, 
                                                                    libelle, 
                                                                    autorisation_decouvert 
                                                            FROM 
                                                                    type_compte 
                                                            WHERE 
                                                                    type_compte NOT IN 	(
                                                                                                    SELECT 
                                                                                                            comptes.type_compte 
                                                                                                    FROM
                                                                                                            clients
                                                                                                            join comptes on comptes.id_client = clients.id_client
                                                                                                    WHERE
                                                                                                            clients.id_client = " . $_SESSION['user_id'] . "
                                                                                            )
                                                            ORDER BY 	

                                                                    type_compte";
                                                    //
                                                    

                                                    //		
                                             $result = executeQuery($sql);


                                             $result = mysqli_query($db,$sql);

                                             $count = mysqli_num_rows($result);

                                             //Affichage de la liste des comptes
                                             if($count >= 1) 
                                             {					
                                                     for ( $i = 1; $i <= $count; $i++ ) 
                                                     {
                                                             $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                             $type_compte=$row['type_compte'];
                                                             $libelle=$row['libelle'];

                                                             if ($i == 1)
                                                             {						
                                                                 echo ("<select name='typecompte'>");						
                                                                 echo ("<option value='' ></option>");
                                                             }
                                                                 //mettre une option value
                                                                     echo "<option value='$type_compte'>".$type_compte."&nbsp;-&nbsp;".$libelle."</option>";

                                                             if ($i == $count)
                                                             {
                                                                     echo("</select>");
                                                             }
                                                     }				
                                                    }
                                                                    ?>						
                                                   </div>
                                               </div>
                                           </div>                                
                                    </div>     
                                 <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error1; ?></div>
<br/><br/>
                                <table width="700" align="center">
                                    <tr>
                                        <td align="center">
                                        <input class="boutonbleu" align="center" type="submit" name="action" value="Valider">                    
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
