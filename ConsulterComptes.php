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
                                                    <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">CONSULTER MES COMPTES</h1></td>
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
                    </td>
                </tr>
            </table>
            
                    <div class="container">
                    <!-- Creation du tableau pour afficher les infos des comptes courants (numero compte, intitule et solde-->

			<?php
			
				//requete SQL a ameliorer car on n'a pas besoin a ce niveau de la table clients
				$sql= 	"
					SELECT 
						clients.civilite,
						clients.nom,
						clients.prenom,
                                                agences.pays_banque,
                                                agences.cle_controle,
                                                agences.code_banque,
                                                agences.code_guichet,
                                                comptes.id_compte,
                                                comptes.cle_rib,
                                                comptes.type_compte,
                                                ROUND(SUM(IFNULL(operations.valeur,0)),2) as solde
					FROM 
						clients 
                                                left join comptes 	on clients.id_client=comptes.id_client
                                                left join agences 	on comptes.id_agence=agences.id_agence
                                                left join operations 	on comptes.id_compte=operations.id_compte										
					WHERE

						clients.id_client = " . $_SESSION['user_id'] . "
					GROUP BY
                                                clients.nom,
                                                clients.prenom,
                                                agences.pays_banque,
                                                agences.cle_controle,
                                                agences.code_banque,
                                                agences.code_guichet,
                                                comptes.id_compte,
                                                comptes.cle_rib,
                                                comptes.type_compte
                                        ORDER BY 
                                                comptes.id_compte
					";
				

				// echo $sql;
										
				$result = mysqli_query($db,$sql);
		 										
				$count = mysqli_num_rows($result);


                                //Affichage d'une phrase d'information sur le nombre de comptes detenus par le client avec gestion du pluriel
                                if($count > 1)
                                    {
                                    echo "<b>Vous avez " .$count." comptes</b>";
                                    }
                                else if ($count == 1)
                                    {
                                    echo "<b>Vous avez " .$count." compte</b>";
                                    }
                                else
                                    {
                                    echo "<b>Vous n'avez pas de comptes.</b>";
                                    }
                                echo ("<br/>");
                                echo ("<br/>");
                                
                                //Affichage du solde total - fonctionne mais ne sort pas de la boucle et les tableaux suivants sont crees mais pas remplis
				/*if($count >= 1) 
                                    {	
                                                $total=0;
                                            for ( $i = 0; $i <= $count; $i++ ) 
                                                {
                                                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                $solde2=$row['solde'];
                                                $total = $total+$solde2;
                                                }
                                                echo "$total";
                                    }
                                echo ("<br/>");*/
                                
                                
                               
                                //Affichage des tableaux pour chacun des comptes
				if($count >= 1) 
				{					
					for ( $i = 1; $i <= $count; $i++ ) 
					{
                                                $row = $result->fetch_assoc();

                                                $nom=$row['nom'];
                                                $prenom=$row['prenom'];
                                                $pays_banque=$row['pays_banque'];
                                                $cle_controle=$row['cle_controle'];
                                                $code_banque=$row['code_banque'];
                                                $code_guichet=$row['code_guichet'];
                                                $id_compte=$row['id_compte'];
                                                $cle_rib=$row['cle_rib'];
                                                $type_compte=$row['type_compte'];
                                                $solde=$row['solde'];
        
                                           
                                                
                                                echo ("<table width='1000' align='center' border='0' cellspacing='0' cellpadding='0'>");
                                                    echo ("<tr>");
                                                        echo ("<td class='txt1' bgcolor='#c2c2c2'>");        
                                                            echo ("<table width='100%' cellpadding='10' cellspacing='0'>") ;            
                                                                echo ("<tr class='tr'> ");
                                                                            echo "<td width='30%' align='left' valign='middle' class='txt3'>"."<h3>"."COMPTE&nbsp;".$type_compte."</h3>"."</td> ";
                                                                            echo "<td width='50%' align='left' valign='middle' class='txt3'>"."<h3>"."N&deg;&nbsp;".$id_compte."</h3>"."</td>"; 
                                                                            echo "<td width='20%' align='middle' valign='middle' class='txt3'>"."<h2>"."<a href=ConsulterOperations.php?compte=".$id_compte." class='txt43'>". $solde." &euro;"	. "</a>"."</h2>"."</td>"; 
                                                                echo ("</tr>"); 
                                                            echo ("</table>");
                                                            echo ("<table width='100%' cellpadding='1' cellspacing='1'>"); 
                                                                echo ("<tr>"); 
                                                                        echo "<td class='td'>"."<a href=VirementInitier.php class='txt3'>"."Virement"."</a>"."<br>"."</td> ";
                                                                        echo "<td class='td'>"."<a href=RIB.php?compte=".$id_compte ." class='txt3'>"."Editer un RIB"."</a>"."<br>"."</td> ";
                                                                        echo "<td class='td'>"."<a href=ConsulterOperations.php?compte=".$id_compte." class='txt3'>"."Consulter l'historique"."</a>"."</td> ";
                                                                echo ("</tr>");    
                                                            echo ("</table>"); 
                                                        echo ("</td>");
                                                    echo ("</tr>");
                                                echo ("</table>");
                                                echo ("<br/>");

					}				
				}
				else
				{
                                    echo ("<h2> Aucun compte trouv&eacute;. </h2>" );
      				}
				
			?>						
<br/>        
<br/>

		</div>
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
