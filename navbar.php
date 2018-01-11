<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="deconnexion.php"><img src="./images/olfati.png" width="60" height="35"></a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="testCO.php">Test connexion sql</a></li> -->
      
                                             
      
       <?php if(!empty($_SESSION['user_id'])){ ?>
      <li><a href=ConsulterComptes.php class="active"> 
                                        <?php 

                                        //selection des champs civilite, nom et prenom afin d'afficher en haut de la page le nom de la personne connectée
                                        $sql= 	"select civilite,nom,prenom from clients where id_client=" . $_SESSION['user_id'] . ";";
                                        // echo $sql pour afficher le nom de l'utilisateur;

                                        $result = mysqli_query($db,$sql);

                                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                                        $civilite = $row['civilite'];
                                                        $nom=$row['nom'];
                                                        $prenom=$row['prenom'];

                                                                echo "Bonjour, " . $civilite . " " . $prenom . " " . $nom . "" ;
                                        ?>
</a></li>
      <li><a href="ConsulterComptes.php">Mes comptes</a></li>
      <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mes services
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="VirementInitier.php">Virement</a></li>
          <li><a href="NewCompteInitier.php">Nouveau Compte</a></li>
          <li><a href="Beneficiaires.php">B&eacute;n&eacute;ficiaires</a></li>
        </ul>
      </li>
      <li><a href="ClientInfo.php">Mes informations</a></li>
	        <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Mes documents
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="ChequierCommande.php">Commandes</a></li>
        </ul>
      </li>

      <?php }?>
        <!-- <li><a href="#">Page 2</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      
      <?php if(empty($_SESSION['user_id'])){ ?>
        <li>
          <a href="NewClientInfo.php"><span class="glyphicon glyphicon-user"></span> Devenir Client</a>
        </li>
        <li>
          <a href="LoginClient.php"><span class="glyphicon glyphicon-log-in"></span> Je me connecte</a>
        </li>
      <?php } else {?>
        <li>
          <a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Je me d&eacute;connecte</a>
        </li><?php }?>
    </ul>
  </div>
</nav>