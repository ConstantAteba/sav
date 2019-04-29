<?PHP
include "ReclamationC.php";
$ReclamationC=new ReclamationC();
//echo $_POST["nom"];
if (isset($_POST["nom"])){
	$ReclamationC->supprimerReclamation($_POST["nom"]);
	header('Location: products.php');
	echo $_POST["nom"];
}
echo "mouf";
?>