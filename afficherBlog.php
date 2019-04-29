<?PHP
include "BlogC.php";
include "Blog.php";
$Blog1C=new BlogC();
$listeBlog=$Blog1C->afficherBlogs();

//var_dump($listeBlogs->fetchAll());
?>

<?PHP
foreach($listeBlog as $row){
	?>
                            <tr>
                                    <td><a href="blog-detail.php?numero=<?php echo $row['NumBlog'];?>" class="tm-link-black"><?PHP echo $row['nom']; ?></a></td>
                                    <td class="tm-trash-icon-cell"><a href="views/supprimerBlog.php?numero=<?php echo $row['NumBlog'];?>" class="tm-link-black"> <i class="fas fa-trash-alt tm-trash-icon"></i> </a></td>
                                </tr>
	<?PHP
}
?>
