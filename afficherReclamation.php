<?PHP

include "ReclamationC.php";
include "Reclamation.php";
$Reclamation1C=new ReclamationC();
$listeReclamation=$Reclamation1C->afficherReclamations();
$listeReclamation1=$Reclamation1C->afficherReclamations();
$i=0;$compteur=0;
$test=0;
$db = config::getConnexion();
//var_dump($listeAviss->fetchAll());
$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
foreach($listeReclamation1 as $raw){
  $compteur++;}
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($compteur/$messagesParPage);

if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$listeReclamation=$db->query('SELECT * FROM reclamation ORDER BY NumReclamation DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');

?>

<?PHP
foreach($listeReclamation as $row){
  $i++;
	?>

<tr>
                                        <th scope="row">
                                            <form method="post" action="../dashboard-master/views/modifierReclamation.php">
                                        <input type="hidden" value="<?PHP echo $row['nom']; ?>" name="nom">
                                        <input type="hidden" value="<?PHP echo $row['email']; ?>" name="email">
                                        <input type="hidden" value="<?PHP echo $row['objet']; ?>" name="objet">
                                        <input type="hidden" value="<?PHP echo $row['libelle']; ?>" name="libelle">
                                        <button class="btn btn-small btn-primary">Traiter</button></td>
                                        </form>
                                        </th>
                                        <td class="tm-product-name"><?PHP echo $i; ?>. <?PHP echo $row['objet']; ?></td>
                                        <td class="text-center"><?PHP echo $row['libelle']; ?></td>
                                        <td class="text-center"><?PHP echo $row['nom']; ?></td>
                                        <td><?PHP echo $row['email']; ?></td>
                                        <td><?PHP if($row['Etat']==$test){echo "Non Traité";} else echo "Traité"; ?></td>
                                        <td><form method="post" action="../dashboard-master/views/supprimerReclamation.php">
                                        <input type="hidden" value="<?PHP echo $row['nom']; ?>" name="nom">
                                        <input type="hidden" value="<?PHP echo $row['email']; ?>" name="email">
                                        <button class="fas fa-trash-alt tm-trash-icon"></button></td>
                                        </form>
                                    </tr>
<div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label"></span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
	<?PHP
}

for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
        ?>
         <li class="page-item active"> <a class="page-link" href="#"><?php echo $i;?></a></li> 
         <?php
     }  
     else //Sinon...
     {
        ?>
          <li class="page-item"><a href="../dashboard-master/products.php?page=<?php echo $i;?>" class="page-link" href="#"><?php echo $i;?></a></li>
          <?php
     }
}
echo '</p>';

?>
</ul>
                                </nav>
                            </div>
                                   