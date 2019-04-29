<?PHP
include "AvisC.php";
$AvisC=new AvisC();
if (isset($_POST["nom"])){
	$AvisC->supprimerAvis($_POST["nom"]);
	header('Location: ../product-detail.php');
}

?>