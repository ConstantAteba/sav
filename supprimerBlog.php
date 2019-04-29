<?PHP
include "BlogC.php";
include "commentairesC.php";
$BlogC=new BlogC();
$commentaireC=new commentaireC();
$BlogC->supprimerBlog($_GET["numero"]);
$commentaireC->supprimerBlog($_GET["numero"]);
	header('Location: ../index.php');

?>