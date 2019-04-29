<?PHP
include "Reclamation.php";
include "ReclamationC.php";
//echo $_POST["nom"];
if (isset($_POST["nom"])){
	$Reclamation1=new Reclamation($_POST['nom'],$_POST['email'],$_POST['libelle'],$_POST['objet']);
    $ReclamationC=new ReclamationC();
	$ReclamationC->modifierReclamation($Reclamation1,$_POST["nom"]);
	include "C:/wamp64/www/dashboard-master/dashboard-master/mail.php";
	header('Location: ../products.php');
	echo $_POST["nom"];
}
?>