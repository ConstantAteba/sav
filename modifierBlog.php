<?PHP
include ("Blog.php");
include ("BlogC.php");

$Blog1=new Blog($_POST['nom'],$_POST['auteur'],$_POST['dates'],$_POST['libelle'],$_POST['image']);
$Blog1C=new BlogC();
$Blog1C->modifierBlog($Blog1,$_GET["numero"]);
$numero=$_GET["numero"];
header("Location: ../blog-detail.php?numero=$numero");
?>