<?php
    ob_start();
	include('session.php');
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");
        $errorDebit = "";
        $errorCredit = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        
            if(isset($_POST['CompteDebit'])? $_POST['CompteDebit']:false){

                    if(isset($_POST['CompteCredit'])? $_POST['CompteCredit']:false){
    
                        //
                            $id_client = $_SESSION['user_id'];
                            //$id_client=$_POST['id_client'];
                            $cpt_debit=$_POST['CompteDebit'];
                            $cpt_credit=$_POST['CompteCredit'];
                            $montant_vir=floatval(str_replace(',', '.', $_POST['montant']));
                            echo"$id_client";
                            // 
                            date_default_timezone_set('Europe/Paris');
                            $current_date=date("Y-m-d H:i:s");
                            $current_day=date("Y-m-d");

                            //
                            $error="";

                            // ----------------------------------------------------------
                            // V�rification Fonds suffisants

                            //
                            $sql= 	"
                                    SELECT 
                                            clients.id_client,
                                            clients.nom,
                                            clients.prenom,
                                            clients.limite_virement,
                                            type_compte.type_compte,
                                            agences.pays_banque,
                                            agences.cle_controle,
                                            agences.code_banque,
                                            agences.code_guichet,
                                            comptes.id_compte,
                                            comptes.cle_rib,
                                            comptes.autorisation_decouvert,
                                            ROUND(SUM(IFNULL(operations.valeur,0)),2) as solde
                                    FROM 
                                            clients
                                            left join comptes on clients.id_client = comptes.id_client
                                            left join agences on comptes.id_agence=agences.id_agence
                                            left join type_compte on comptes.type_compte=type_compte.type_compte
                                            left join operations on comptes.id_compte=operations.id_compte
                                    WHERE
                                            clients.id_client = " . $_SESSION['user_id'] ."
                                            and comptes.id_compte = " . $cpt_debit . "
                                    GROUP BY
                                            comptes.id_compte,
                                            comptes.type_compte,
                                            comptes.cle_rib,
                                            comptes.autorisation_decouvert,
                                            agences.pays_banque,
                                            agences.cle_controle,
                                            agences.code_banque,
                                            agences.code_guichet
                                    ";

                            //		
                            $result = executeQuery($sql);

                            //	
                            if ($result->num_rows > 0) 
                            {
                                    //
                                    $row = $result->fetch_assoc();

                                    //
                                    $autorisation_decouvert=$row['autorisation_decouvert'];
                                    $limite_virement=$row['limite_virement'];
                                    $solde=$row['solde'];

                                    if ($montant_vir > ($solde + $autorisation_decouvert))			
                                    {
                                            $error="Fonds insuffisants sur le compte '" . $cpt_debit . "' - Solde = " .$solde . "&euro; (dont " . $autorisation_decouvert . " &euro; de d&eacute;couvert) / Montant du virement = " . $montant_vir . " &euro;" ;
                                    }

                            }

                            // ----------------------------------------------------------
                            // V�rification plafond virement non atteint

                            /*
                            //
                            $sql= 	"
                                    SELECT 
                                            clients.limite_virement,
                                            ifnull(sum(virements.montant),0) as somme_virement
                                    FROM 
                                            clients
                                            left join comptes on clients.id_client = comptes.id_client
                                            left join virements on comptes.id_compte=virements.id_compte_deb and date_format(virements.date,\"%Y-%m-%d\") = '" . $current_day . "'
                                    WHERE
                                            clients.id_user = " . $id_user ."				
                                    ";

                            // echo $sql;

                            //		
                            $result = execute_query($sql);

                            //	
                            if ($result->num_rows > 0) 
                            {
                                    //
                                    $row = $result->fetch_assoc();

                                    //
                                    $limite_virement=$row['limite_virement'];
                                    $somme_virement=$row['somme_virement'];

                                    if (($somme_virement + $montant_vir) > $limite_virement)			
                                    {
                                            $error="Plafond Virement atteint - Compte '" . $cpt_debit . "' : Somme des virements effectu&eacute;s le " . $current_day . " = " . $somme_virement . "&euro; - Montant du virement = " . $montant_vir . " &euro; - Plafond = " . $limite_virement . " &euro;" ;
                                            return $error;
                                    }

                            }
                            */

                            //
                            if ($montant_vir > $limite_virement)			
                            {
                                    $error="Plafond Virement atteint - Compte '" . $cpt_debit . "' - Montant du virement = " . $montant_vir . " &euro; - Plafond = " . $limite_virement . " &euro;" ;
                            }

                            // ----------------------------------------------------------
                            // Enregistrement de l'operation dans la table des virements

                            // 
                            $sql="INSERT INTO virements (id_compte_deb,id_compte_cred,date,montant) VALUES (" . $cpt_debit . ","  . $cpt_credit . ",'" . $current_date . "'," . $montant_vir .")";

                            //		
                            $result = executeQuery($sql);


                            // ----------------------------------------------------------
                            // Enregistrement de l'operation dans le compte cr�diter

                            // -----
                            $sql="SELECT clients.nom,clients.prenom FROM comptes join clients on comptes.id_client=clients.id_client WHERE comptes.id_compte = '" . $cpt_debit . "'";

                            //		
                            $result = executeQuery($sql);

                            //
                            $row = $result->fetch_assoc();

                            $lib_cred= strtoupper($row['prenom'] . " " . $row['nom']);

                            // ----------------------------------------------------------

                            $sql="INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (" . $cpt_credit . "," . "'VIR'" . ",'" . "VIREMENT DE ". $lib_cred . "','" . $current_date . "'," . +($montant_vir) .")";

                            //echo $sql;

                            //		
                            $result = executeQuery($sql);

                            // ----------------------------------------------------------
                            // Enregistrement de l'op�ration dans le compte � d�biter

                            // -----
                            $sql="SELECT clients.nom,clients.prenom FROM comptes join clients on comptes.id_client=clients.id_client WHERE comptes.id_compte = '" . $cpt_credit . "'";

                            //		
                            $result = executeQuery($sql);

                            //
                            $row = $result->fetch_assoc();

                            $lib_deb=strtoupper($row['prenom'] . " " . $row['nom']);

                            // ----------------------------------------------------------

                            $sql="INSERT INTO operations (id_compte,type_operation,libelle,date,valeur) VALUES (" . $cpt_debit . "," . "'VIR'" . ",'" . "VIREMENT EN FAVEUR DE " . $lib_deb . "','" . $current_date . "'," . -($montant_vir) .")";

                            //		
                            $result = executeQuery($sql);

                            // ----------------------------------------------------------

                            //$error;

                            // ----------------------------------------------------------
                            header("location:VirementConfirmer.php");

                    }
                    else 
                    {
                            $errorCredit = "Vous devez s&eacute;lectionner un num&eacute;ro de compte &agrave; cr&eacute;diter";
                    }  
            }
            else 
            {
                    $errorDebit = "Vous devez s&eacute;lectionner un num&eacute;ro de compte &agrave; d&eacute;biter";
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
<br/>
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
                                                        <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">VIREMENTS</h1></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
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
                                                        <td width="27%" class="txt6" align="left" valign="middle"><b>CHOIX DES COMPTES ET DU MONTANT</b></td>
                                                        <td width="5%" class="txt5" align="middle" valign="middle"><h1>></h1></td>
                                                        <td width="5%" class="txt5" align="left" valign="middle"><img src="./images/Rond2.png" width="40" height="40"></td>
                                                        <td width="58%" class="txt5" align="middle" valign="middle"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
<br/>
                        <table>
                            <p>Le plafond de vos virements pour chaque op&eacute;ration <strong>est de 1000</strong> euros.<br />
                            <br />
                            </p>
                        </table>
                        <!--Creation de la zone de selection des comptes et des boutons de validation-->
                        <div class="container">                   
                            <form method="post" action="" class="form-horizontal">                   
                            <div class="form-group">
                                <label class="control-label col-sm-4">S&eacute;lection du compte &agrave; d&eacute;biter&nbsp;
                                </label> 
                                <div class="col-sm-3">
                                        <?php

                                                //La requete n'affiche pas les comptes avec un solde = 0 - OK
						$sql= 	"
							SELECT 
                                                                clients.civilite,
								clients.id_client,
								clients.nom,
								clients.prenom,
								clients.limite_virement,
								type_compte.type_compte,
								agences.pays_banque,
								agences.cle_controle,
								agences.code_banque,
								agences.code_guichet,
								comptes.id_compte,
								comptes.cle_rib,
								comptes.autorisation_decouvert,
								ROUND(SUM(IFNULL(operations.valeur,0)),2) as solde
							FROM 
								clients
								left join comptes on clients.id_client = comptes.id_client
								left join agences on comptes.id_agence=agences.id_agence
								left join type_compte on comptes.type_compte=type_compte.type_compte
								left join operations on comptes.id_compte=operations.id_compte
							WHERE
								clients.id_client = '" . $_SESSION['user_id'] ."'
							GROUP BY
								comptes.id_compte,
								comptes.type_compte,
								comptes.cle_rib,
								comptes.autorisation_decouvert,
								agences.pays_banque,
								agences.cle_controle,
								agences.code_banque,
								agences.code_guichet
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

                                                                $civilite1 = $row['civilite'];
                                                                $nom1=$row['nom'];
                                                                $prenom1=$row['prenom'];
                                                                $id_compte1=$row['id_compte'];
                                                                $type_compte1=$row['type_compte'];
                                                                $solde1=$row['solde'];


                                                                if ($i == 1)
                                                                {						
                                                                    echo ("<select id='CompteDebit' name='CompteDebit'>");						
                                                                    echo ("<option value='' ></option>");
                                                                }
                                                                    //mettre une option value
                                                                        echo "<option value='$id_compte1'>".$type_compte1."&nbsp;-&nbsp;N&deg;&nbsp;".$id_compte1 ."&nbsp;-&nbsp;Avoir disponible&nbsp;".$solde1." &euro;"	. "</option>";

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
                            <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $errorDebit; ?></div>
                            <br/>
                            <hr color="#c2c2c2" width="80%">
                            <br/>
                            <div class="form-group">
                                <label class="control-label col-sm-4">S&eacute;lection du compte du b&eacute;n&eacute;ficiaire &agrave; cr&eacute;diter&nbsp;
                                </label> 
                                <div class="col-sm-3">
                                        <?php

                                                //
                                                $sql= 	"
                                                        SELECT 
                                                                beneficiaires.id_client,
                                                                beneficiaires.id_client_benef,
                                                                beneficiaires.id_compte,
                                                                clients.civilite,
                                                                clients.nom,
                                                                clients.prenom
                                                        FROM 
                                                                clients, beneficiaires
                                                        WHERE

                                                                beneficiaires.id_client = " . $_SESSION['user_id'] . " and beneficiaires.id_client_benef = clients.id_client
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

                                                                $civilite2 = $row['civilite'];
                                                                $nom2=$row['nom'];
                                                                $prenom2=$row['prenom'];
                                                                $id_compte2=$row['id_compte'];


                                                                if ($i == 1)
                                                                {						
                                                                    echo ("<select id='CompteCredit' name='CompteCredit'>");						
                                                                    echo ("<option value='' ></option>");
                                                                }
                                                                    //mettre une option value
                                                                        echo "<option value='$id_compte2'>&nbsp;".$civilite2."&nbsp;".$prenom2."&nbsp;".$nom2."-&nbsp;Compte&nbsp;N&deg;&nbsp;".$id_compte2 ."</option>";

                                                                if ($i == $count)
                                                                {
                                                                        echo("</select>");
                                                                }

                                                        }				
                                                }
                                                else
                                                {
                                                            echo "Vous n'avez pas choisi de b&eacute;n&eacute;ficiaire. Vous pouvez en cr&eacute;er un dans le menu B&eacute;n&eacute;ficiaires.";                 

                                                }

                                        ?>						
                                </div>
                            </div>
                            <div style = "margin-left:450px; font-size:15px; color:#cc0000; margin-top:10px"><?php echo $errorCredit; ?></div>
                            <br/>
                            <hr color="#c2c2c2" width="80%">
                            <br/>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="montant">Montant de votre virement en Euros&nbsp;</label>
                                <div class='col-sm-3'>
                                    <div class='input-group date'>
                                        <input type="text" class="form-control" pattern="[0-9]{1,10}" min="20" size="10" name="montant" placeholder="Saisissez le montant &agrave; cr&eacute;diter" required="required">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-euro"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div>
                                <span>* Les virements sont soumis aux d&eacute;lais de traitement habituels. 
                                </span>
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
                </td>
            </tr>
        </table>
<br/><br/>
        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    </body>
</html>
