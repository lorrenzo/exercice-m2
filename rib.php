<?php
//Appel de la librairie de session
include('session.php');

// Inclusion de la librairie
require('FPDF.php');

$id_compte=$_GET['compte'];
//echo "$id_compte";

$id_client = $_SESSION['user_id'];


// importe un fichier de mise en page par exemple (Agarder?)
//require('ribPDF.php');

// Selectionner les donn�es de la base de donn�es. Voir si on ne peut pas appeler directement config.php
	/*define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'olfatibank');*/

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (! $db){
            exit('Erreur lors de la connexion.');
        }

                //     $sql= 	"
                //             SELECT
                //                     clients.civilite,
                //                     clients.nom,
                //                     clients.prenom,
                //                     clients.numero_voie,
                //                     clients.nom_voie,
                //                     clients.nom_voie_2,
                //                     clients.code_postal,
                //                     clients.ville,
                //                     comptes.iban,
                //                     comptes.pays_banque,
                //                     comptes.cle_controle,
                //                     comptes.code_banque,
                //                     comptes.code_guichet,
                //                     comptes.num_compte,
                //                     comptes.cle_rib
                //             FROM
                //                     clients left join (comptes, operations) on clients.id_client=comptes.id_client and comptes.id_compte = operations.id_compte
                //             WHERE
                //                     clients.id_client = " . $_SESSION['user_id'] . "
                //             ";
                //
                //             // echo $sql;
                //
				// $result = mysqli_query($db,$sql);
                //
				// $count = mysqli_num_rows($result);


                                //Affichage des resultats
                                // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                                $civilite = "mr";
                                $nom="bragard";
                                $prenom="christophe";
                                $numero_voie="6";
                                $nom_voie="ramey";
                                $nom_voie_2="";
                                $code_postal="";
                                $ville="paris";
                                $iban="mon iban";
                                $pays_banque="france";
                                $cle_controle="08";
                                $code_banque="12345566";
                                $code_guichet="1234556";
                                $num_compte="123232323";
                                $cle_rib="21323";




// Cr�er un nouveau document PDF = new FPDF(orientation P=portrait, unite de mesure millimetre=mm, format page=A4)
$pdf = new FPDF('P','mm','A4');


//Definition des sauts de page automatiques = SetAutoPageBreak(automatique=false)
$pdf->SetAutoPageBreak(false);

//creer une nouvelle page dans le document = SetAutoPageBreak(P=portrait, L=paysage)
$pdf->AddPage();

//Definir les informations de resume du document = SetTitle()
$pdf->SetTitle('RIB');

//Positionner une image Image(nom du fichier, abscisse de position, ordonnee de position, hauteur image, largeur image,type optionnel)
//par defaut le logo est affich� dans le coin haut gauche.
$pdf->Image('./images/olfati.png',10,10,40,80);

//Choix de la police de caracteres SetFont(Famille du font = Arial,B=bold I=italique u=underline,taille de la font)
$pdf->SetFont('Arial','B',18);

//Definir la couleur a utiliser pour le texte =SetTextColor()
$pdf->SetTextColor(47,85,151);//m�me bleu que les en-tete de page

//definition du RIB comme un tableau sans bordures Cell(largeur jusqu'a la marge a droite, hauteur, texte a ecrire, bordure 0=sans bordure, position � la fin 0=droite 1=deb ligne suivante 2=en dessous, alignement L a gauche C=centre R=droite, remplissage 0=non 1=oui) )
$pdf->Cell(500,20,'RELEVE D IDENTITE BANCAIRE',0,1,'C',0);

//Changement de la police de caracteres SetFont(Famille du font = Arial,B=bold I=italique u=underline,taille de la font)
$pdf->SetTextColor(47,85,151);//noir
$pdf->SetFont('Arial','',14);
$pdf->Cell(80,7,'Etablissement',0,0,'C',0);// titre premiere colonne
$pdf->Cell(80,7,'Guichet',0,0,'C',0);// titre deuxieme colonne
$pdf->Cell(80,7,'N�de Compte',0,0,'C',0);// titre troisieme colonne
$pdf->Cell(80,7,'Cl� RIB',0,1,'C',0);// titre quatrieme colonne

//remplissage des donnees avec les info de la requ�te SQL
$pdf->SetTextColor(0,0,0);//noir
$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,7,$code_banque,0,0,'C',0);
$pdf->Cell(80,7,$code_guichet,0,0,'C',0);
$pdf->Cell(80,7,$num_compte,0,0,'C',0);
$pdf->Cell(80,7,$cle_rib,0,1,'C',0);

//Changement de la police de caracteres SetFont(Famille du font = Arial,B=bold I=italique u=underline,taille de la font)
$pdf->SetTextColor(47,85,151);//noir
$pdf->SetFont('Arial','',14);
$pdf->Cell(300,7,'IBAN - Identifiant international de compte',0,1,'C',0);// titre colonne

//remplissage des donnees avec les info de la requ�te SQL
$pdf->SetTextColor(0,0,0);//noir
$pdf->SetFont('Arial','B',14);
$pdf->Cell(80,7,$iban,0,1,'C',0);

//Changement de la police de caracteres SetFont(Famille du font = Arial,B=bold I=italique u=underline,taille de la font)
$pdf->SetTextColor(47,85,151);//noir
$pdf->SetFont('Arial','',14);
$pdf->Cell(100,7,'Titulaire du compte',0,1,'C',0);// titre colonne

//remplissage des donnees avec les info de la requ�te SQL
$pdf->SetTextColor(0,0,0);//noir
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10,7,$civilite,0,0,'C',0);
$pdf->Cell(30,7,$nom,0,0,'C',0);
$pdf->Cell(30,7,$prenom,0,1,'C',0);
$pdf->Cell(10,7,$numero_voie,0,0,'C',0);
$pdf->Cell(30,7,$nom_voie,0,1,'C',0);
$pdf->Cell(40,7,$nom_voie_2,0,1,'C',0);
$pdf->Cell(10,7,$code_postal,0,0,'C',0);
$pdf->Cell(30,7,$ville,0,1,'C',0);



// construction du PDF
//
//$pdf->buildPDF();

// t�l�charge le fichier Output(nom du fichier, type de destination F=serveur I=navigateur en ligne D=telechargement)
$pdf->Output('RIB.pdf', 'D');

?>
