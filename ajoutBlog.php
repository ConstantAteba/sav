<?PHP
include ("Blog.php");
include ("BlogC.php");

$Blog1=new Blog($_POST['nom'],$_POST['auteur'],$_POST['dates'],$_POST['libelle'],$_POST['image']);
$Blog1C=new BlogC();
$Blog1C->ajouterBlog($Blog1);
header('Location: ../index.php');
?>