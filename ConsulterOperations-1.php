<?php
	include('session.php');
        require("fonction.php");
        include("navbar.php");
        include("header.php"); 

        $id_compte=$_GET['compte'];

?>        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
               <!-- 		<link href="../dist/css/bootstrap.css" rel="stylesheet">
		<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../dist/css/bootstrap-theme.min.css" rel="stylesheet">-->
                       <!-- DATATABLES !-->     
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css"/> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"/> 
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/style.css" type="text/css">
              


    </head>
    <body class="body">
        <!--Center pour que le tableau soit centré-->
        <center>
            <table bgcolor="white" width="1200" border="0" cellspacing="0" cellpadding="30" marginwidth="1200" marginheight="">
                <tr>
                    <td> 
                        <!--Creation du menu-->
                        <table width="1200" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                                <td class="txt1"> 
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr> 
                                            <td> 
                                                <table width="100%" border="0" cellspacing="1" cellpadding="5">
                                                   <tr>
                                                        <td width="15%" class="txt4" align="left" valign="middle"><a href="ConsulterComptes.php" class="txt4">MES COMPTES</a></td>
                                                        <td width="5%" class="txt4" align="left" valign="middle">|</td>
                                                        <td width="15%" class="txt4" align="left" valign="middle"><a href="Gerer.php" class="txt4">MES SERVICES</a></td>
                                                        <td width="5%" class="txt4" align="left" valign="middle">|</td>
                                                        <td width="20%" class="txt4" align="left" valign="middle"><a href="ConsulterClientInfo.php" class="txt4">MES INFORMATIONS</a></td>
                                                        <td width="5%" class="txt4" align="left" valign="middle">|</td>
                                                        <td width="20%" class="txt4" align="left" valign="middle"><a href="Documents.php" class="txt4">MES DOCUMENTS</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
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
                                                    <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">CONSULTER L'HISTORIQUE DE MES COMPTES</h1></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
<br/>        
                <h1><a href="ConsulterComptes.php" class="txt3"><b><<</b></a></h1>
<br/>        
		<h2 class="txt4">Op&eacute;rations effectu&eacute;es</h2>
                    <div class="container" bgcolor="white">

			<?php
                                    	$sql= 	"
			SELECT 
				clients.nom,
				clients.prenom,
				agences.pays_banque,
				agences.cle_controle,
				agences.code_banque,
				agences.code_guichet,
				comptes.id_compte,
				comptes.cle_rib,
				comptes.type_compte,
				operations.id_operation,
				operations.type_operation,
				operations.libelle,
				DATE_FORMAT(operations.date,\"%d/%m/%Y\") as date,
				ROUND(operations.valeur,2) as valeur
			FROM 
				clients 
				left join comptes on clients.id_client=comptes.id_client
				left join agences on comptes.id_agence=agences.id_agence
				left join operations on comptes.id_compte=operations.id_compte
			WHERE
                                clients.id_client = " . $_SESSION['user_id'] . "
				and comptes.id_compte = " .$id_compte . "
			ORDER BY 
				operations.date DESC
			";
		

		//echo $sql;
									
                $result = mysqli_query($db,$sql);
		
		//		
		$count = $result->num_rows;

		//													
		if($count >= 1) 
		{					
			for ( $i = 1; $i <= $count; $i++ ) 
			{
				
				// Récupération de l'enregistrement i
				$row = $result->fetch_assoc();
						
				// Initialisation des variables
				$nom=$row['nom'];
				$prenom=$row['prenom'];
				$pays_banque=$row['pays_banque'];
				$cle_controle=$row['cle_controle'];
				$code_banque=$row['code_banque'];
				$code_guichet=$row['code_guichet'];
				$id_compte=$row['id_compte'];
				$cle_rib=$row['cle_rib'];
				$type_compte=$row['type_compte'];
				$id_operation = $row['id_operation'];
				$type_operation = $row['type_operation'];
				$libelle = $row['libelle'];
				$date = $row['date'];
				$valeur = $row['valeur'];

				// Affichage du tableau
				if ($i == 1)
				{
					// Affichage des informations du compte

					echo ("<h2> Compte " . $type_compte . " N&deg;&nbsp;(" . $id_compte . ") </h2>" );
					echo ("<br/>");
				}

				//
				if ($i == 1)
				{
                                                echo("<table id='myTable' background-color='FFFFFF' cellpadding='0' cellspacing='0' border='0' class='table' >");

				
					//
					echo("<thead>");
					
						echo ("<tr class='txt3'>");

							echo("<th><b> 			Date 	</th>");
							echo("<th><b>			Libell&eacute; </th>");
							echo("<th align=\"right\" ><b> Valeur 	</th>");

						echo ("</tr>");
					
					echo("</thead></tbody>");
					

					//	
					echo("<tbody>");
					
				}
						
				echo ("<tr>");
							

					echo ("<td>" 			. $date 							. "</td>") ;
					echo ("<td>" 			. $libelle 							. "</td>") ;
					echo ("<td align=\"right\">" 	. number_format($valeur, 2, ',', ' ')." &euro;"	. " </a> " 	. "</td>") ;
			
				echo ("</tr>");

				if ($i == $count)
				{
					echo("</tbody>");
					echo("</table>");
					echo("</div>");
				}

			}				
		}
		else
		{
						
		}
                
			?>						

		</div>

        </center>
        <footer>
            <?php footer (); ?>
        </footer>
    
            <script type="text/javascript">
            //Partie DATATABLES
            $(document).ready(function(){
                 $('#myTable').DataTable(
                         { "pagingType": "full_numbers"}
                );
            });                            

        </script>  

    </body>
</html>
