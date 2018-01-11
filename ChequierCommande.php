<?php
	include('session.php');
        $error = "";
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");


        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        
                if(isset($_POST['numeroCompte'])? $_POST['numeroCompte']:false){

                                        $numeroCompte=$_POST['numeroCompte'];

                                        date_default_timezone_set('Europe/Paris');
                                        $current_date=date("Y-m-d H:i:s");
                                        $current_day=date("Y-m-d");
                                        $current_month=date("Y-m");

                                        //
                                        $error="";

                                        // ----------------------------------------------------------
                                        // Vérification 2 chequiers par mois civil

                                        //
                                        $sql= 	"
                                                SELECT 
                                                        count(commandes.id_commande) as nb_commande
                                                FROM 
                                                        clients
                                                        left join comptes on clients.id_client = comptes.id_client
                                                        left join commandes on comptes.id_compte=commandes.id_compte and date_format(commandes.date,'%Y-%m') = '" . $current_month . "'
                                                WHERE
                                                        clients.id_client = " . $_SESSION['user_id'] ."				
                                                ";

                                        //echo $sql;

                                        //		
                                        $result = executeQuery($sql);
                                        
                                        //	
                                        if ($result->num_rows > 0) 
                                        {
                                                //
                                                $row = $result->fetch_assoc();

                                                //
                                                $nb_commande=$row['nb_commande'];

                                                if ($nb_commande >= 2)			
                                                {
                                                        $error="Nb ch&eacute;quiers max atteint pour le compte '" . $numeroCompte . "'  (2 commandes par mois) " ;
                                                }
                                                else {
                                                    // Enregistrement de la commande dans la table des commandes
                                                    $sql="INSERT INTO commandes (id_compte,date) VALUES (" . $numeroCompte . ",'" . $current_date ."')";


                                                    //		
                                                    $result = executeQuery($sql);

                                                    // Rediection vers la page de confirmation-
                                                    header("location:ChequierConfirmer.php");


                                                            }

                                        }


                                    
                   
                }
               else {
                      $error = "Vous devez s&eacute;lectionner un num&eacute;ro de compte";
                }       
                            

        }


?>        
<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="./style/style.css" type="text/css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">COMMANDER UN CH&Eacute;QUIER</h1></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
                        <div>
                            <h2 class="txt1">Commande d'un carnet de ch&egrave;ques</h2>
                        </div>
<br/>
<br/>
                        <!-- Selection du compte pour lequel le chequier doit etre envoye//mettre une method POST-->
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                                <table width="900" align="left" border ="0" cellspacing="0" cellpadding="5">
                                   <tr>   
                                        <td align="right">Pour votre compte&nbsp;</td> 
                                        <td>
                                            <div class="form-group">
                                                <div class="col-xs-3">
<?php
                                                        // selection uniquement des comptes courants - les autres comptes ne sont pas concernés par la commande de cheques
                                                        //il faudrait afficher compte courant plutôt que l'id
                                                        $sql= 	"
                                                                    SELECT 
                                                                            comptes.id_client as id_client,
                                                                            comptes.id_compte as id_compte,
                                                                            comptes.type_compte as type_compte
                                                                    FROM 
                                                                            comptes
                                                                    WHERE

                                                                            comptes.id_client = " . $_SESSION['user_id'] . " and comptes.type_compte = 'CHQ'
                                                                            ";

                                                            // echo $sql;

                                                            $result = mysqli_query($db,$sql);

                                                            $count = mysqli_num_rows($result);


                                                            //Affichage de la liste des comptes
                                                            if($count >= 1) 
                                                            {					
                                                                    for ( $i = 1; $i <= $count; $i++ ) 
                                                                    {
                                                                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                                            $id_compte = $row['id_compte'];
                                                                            $type_compte=$row['type_compte'];


                                                                            if ($i == 1)
                                                                            {						
                                                                                echo ("<select id='numeroCompte' name='numeroCompte'>");						
                                                                                echo ("<option value='' ></option>");
                                                                            }
                                                                                //mettre une option value
                                                                                    echo "<option value='$id_compte'>".$type_compte."-N&deg;&nbsp;".$id_compte ."</option>";

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
                              <br/>
                               <br/>
                                 <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                                <br/>
                                <div>
                                    <div class="clear"></div>
                                    <h3 class="txt1">Vous recevrez votre commande &agrave; l'adresse suivante :</h3>
                                    <div>
                                                                                <?php        			
                                        //selection des champs civilite, nom et prenom afin d'afficher en haut de la page le nom de la personne connectée
                                        $sql= 	"SELECT 
                                                        civilite,nom,prenom,numero_voie,nom_voie,nom_voie_2,code_postal,ville
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
                                                
                                                echo " ".$numero_voie. " "."&nbsp;"."" .$nom_voie. " " ;
                                                echo "<br/>";
                                                if ($nom_voie_2!= '') 
                                                    {
                                                echo " ".$nom_voie_2. " " ;
                                                echo "<br/>";
                                                    }
                                                echo " ".$code_postal. " "."&nbsp;"."" .$ville. " " ;
                                        ?>
                                    </div>
                                    <br/>			
                                    <div class="formline">
                                            <span>Vous recevrez le format (talon ou portefeuille) que vous recevez habituellement.</span>
                                    </div>
                                </div>
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
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
