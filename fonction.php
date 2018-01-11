<?php               
        function executeQuery($sql) {
            // creation de la connection
            $c = new mysqli("localhost:3306", "root", "root", "olfatibank", 3306);
            if ($c->connect_errno) {
                //si erreur de connection
                return "Probleme d'acces a la base";
            }
            $res = $c->query($sql);
            // fermeture connection
            $c->close();
            //retour du r�sultat
            return $res;
        }
        

        //Fonction de creation du pied de page fixe en bas de la page - avec CSS
        function footer ()
        {
            echo ("<div class='footer'>");
                echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
                    echo ("<tr>");
                         echo ("<td class='BarreFooter' align='left' width='20%'><img src='./images/olfati.png' width='50' height='30'><br></td>");
                         echo ("<td class='BarreFooter' align='left' width='20%'><a href='MentionsLegales.php' class='txt9' target=_blank>Mentions L&eacute;gales</a><br></td>");
                         echo ("<td class='BarreFooter' align='left' width='20%'><a href='Help.php' class='txt9' target=_blank>Aide</a><br></td>");
                         echo ("<td class='BarreFooter' align='left' width='20%'></td>");
                         echo ("<td class='BarreFooter' align='left' width='20%'></td>");
                    echo ("<tr>");
                echo ("</table>");
                echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
                    echo ("<tr>");
                        echo ("<td class='BarreFooter' align='left' width='100%'>&nbsp;</td>");
                    echo ("</tr>");
                echo ("</table>");
            echo ("</div>");
        }
        

		function barre_menu()
		{
			echo ("<table bgcolor='white' width='1200' border='0' cellspacing='0' cellpadding='30' marginwidth='1200'>");
				echo ("<tr>");
                    echo ("<td>");
                        echo ("<table width='1200' border='0' cellspacing='0' cellpadding='0'>");
							echo ("<tr>");
                                echo("<td class'txt1'>");
                                    echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
										echo ("<tr>");
											echo ("<td>");
                                                echo ("<table width='100%' border='0' cellspacing='1' cellpadding='5'>");
													echo ("<tr>");
                                                        echo ("<td width='15%' class='txt4' align='left' valign='middle'><a href='ConsulterComptes.php' class='txt4'>MES COMPTES</a></td>");
                                                        echo ("<td width='5%' class='txt4' align='left' valign='middle'>|</td>");
                                                        echo ("<td width='15%' class='txt4' align='left' valign='middle'><a href='Gerer.php' class='txt4'>MES SERVICES</a></td>");
                                                        echo ("<td width='5%' class='txt4' align='left' valign='middle'>|</td>");
                                                        echo ("<td width='20%' class='txt4' align='left' valign='middle'><a href='ClientInfo.php' class='txt4'>MES INFORMATIONS</a></td>");
                                                        echo ("<td width='5%' class='txt4' align='left' valign='middle'>|</td>");
                                                        echo ("<td width='20%' class='txt4' align='left' valign='middle'><a href='Documents.php' class='txt4'>MES DOCUMENTS</a></td>");
										echo ("</tr>");
									echo ("</table>");
								echo ("</td>");
							echo ("</tr>");
						echo ("</table>");
					echo ("</td>");
				echo ("</tr>");
			echo ("</table>");
		}

	function afficher_operations($id,$id_compte)
	{
		
		//
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
				DATE_FORMAT(operations.date ,\"%d/%m/%Y - %H:%i:%s\") as date,
				ROUND(operations.valeur,2) as valeur
			FROM 
				clients 
				left join comptes on clients.id_client=comptes.id_client
				left join agences on comptes.id_agence=agences.id_agence
				left join operations on comptes.id_compte=operations.id_compte
			WHERE
				clients.id_client = " . $_SESSION['user_id'] . "
				and comptes.id_compte = " .$id_compte. "
			ORDER BY 
				operations.date DESC
			";
		

								
		$result = executeQuery($sql);
		
		//		
		$count = $result->num_rows;

		//													
		if($count >= 1) 
		{					
			for ( $i = 1; $i <= $count; $i++ ) 
			{
				
				// R�cup�ration de l'enregistrement i
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

				// Affichage Entete
				if ($i == 1)
				{
					// Affichage des informations du compte
					echo ("<h2 align='left'> <a href=\"./ConsulterComptes.php\"> <span class=\"glyphicon glyphicon-chevron-left\"></span>  </a>  </h2>");
					echo ("<h2 align='left'> Compte " . $type_compte . " N&deg;" . $id_compte . " </h2>" );
				}

				// Imprimer RIB et Relev�
				if ($i == 1)
				{
					// Affichage des informations du compte
					echo("<div class=\"row\">");
			
						echo("<div class=\"col-sm-2 form-group\">");
					
							echo ("<input type=\"button\" class=\"boutonbleu\" id=\"btn_pdf\" value=\"Imprimer le RIB\" id=\"btnRIB\" >");
	
						echo("</div>");
	
						echo("<div class=\"col-sm-2 form-group\">");
					
							echo ("<input type=\"button\" class=\"boutonbleulong\" id=\"btn_releve\" value=\"Imprimer le Relev&eacute;\" id=\"btnRIB\" >");
		
						echo("</div>");

					echo("</div>");
					

				}
				
				
				// Tableau
				if ($i == 1)
				{

					echo ("<table id=\"operations\" class=\"display\" cellspacing=\"0\" width=\"auto\">");
				
					//
					echo("<thead>");
					
						echo ("<tr>");

							echo("<th> 	DATE 	</th>");
							echo("<th> 	LIBELLE </th>");
							echo("<th >	VALEUR 	</th>");

						echo ("</tr>");
					
					echo("<thead>");

					//	
					echo("<tbody>");
					
				}
						
				echo ("<tr>");
							

					echo ("<td>" 	. $date 						. "</td>") ;
					echo ("<td>" 	. $libelle 						. "</td>") ;
					echo ("<td>" 	. number_format($valeur, 2) . " &euro; " 		. "</td>") ;
			
				echo ("</tr>");

				if ($i == $count)
				{
					echo("</tbody>");
					echo("</table>");
					echo("</div>");
				}
			}				
		}		
	}
?>
