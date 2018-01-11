<?php
	include('session.php');
        require("fonction.php");
        include("header.php"); 
        include("navbar.php");
        $id_compte=$_GET['compte'];

       
?>        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <link rel="stylesheet" type="text/css" href="./style/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

        <script type="text/javascript" language="javascript" src="assets/js/vendor/jquery.min.js"></script>
        <script type="text/javascript" language="javascript" src="assets/js/vendor/datatables.min.js"></script>

        
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/datetime-moment.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/type-detection/num-html.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/any-number.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/currency.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/numeric-comma.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.16/sorting/num-html.js"></script>
        <script type="text/javascript" src="fonctions.js"></script>

<!--        <script src='./js/jquery.min.js'></script>-->
<!--        <script>window.jQuery || document.write('<script src= \"./assets/js/vendor/jquery.min.js \"><\/script>')</script>-->
        <script src='./dist/js/bootstrap.min.js'></script>
        <script src='./assets/js/docs.min.js'></script>


    </head>
    <body class="body">
        <!--Center pour que le tableau soit centr�-->
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
                                                    <td class="BarreSousMenu" width="100%"><h1 class="txt2" align="left" valign="middle">CONSULTER MES OP&Eacute;RATIONS</h1></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
<br/>        
		<h2 class="txt4">Op&eacute;rations effectu&eacute;es</h2>
<br/>
               		<div class="container">
			<?php

                                //
				$id=$_SESSION['user_id'];
				
				//
				$id_compte=$_GET['compte'];
			
				//
				afficher_operations($id,$id_compte);

                        ?>                    
                        </div>

        </center>
        <footer>
            <?php footer (); ?>
        </footer>

    		<script type="text/javascript" charset="utf-8">	
            //Partie DATATABLES
 //           $(document).ready(function(){
  //               $('#operations').DataTable(
 //                        { "pagingType": "full_numbers"}
 //               );
 //           });                            



			$(document).ready(function() 
				{

				//	$.fn.dataTable.moment( 'DD/MM/YYYY - HH:mm:ss' )

                    $('#operations').dataTable({
                        "paging":   false, // pas de pagination
                        "ordering": true,
                        "info":     false,
                        "language": { // aide à trier correctement le prix
                            "decimal": ".",
                            "thousands": ","
                        },
                        "order": [[ 0, "desc" ]] // défini le tri par défaut (peut-être doublon avec la requête sql quand on arrive sur la page)
                    });
				} 
			);

		</script>

    <script type="text/javascript">
			$('#operations')
					.removeClass( 'display' )
					.addClass('table table-striped table-bordered');
		</script>

                
    </body>
</html>
