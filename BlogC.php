<?PHP
include_once "C:\wamp64\www\bready\config.php";
class BlogC {
function afficherBlog ($Blog){
		echo "Nom: ".$Blog->getNom()."<br>";
		echo "dates: ".$Blog->getdates()."<br>";
		echo "auteur: ".$Blog->getauteur()."<br>";
		echo "libelle: ".$Blog->getlibelle()."<br>";
	}
	
	function ajouterBlog($Blog){
		$sql="insert into blog (nom,dates,libelle,auteur,image) values (:nom,:dates,:libelle,:auteur,:image)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$Blog->getNom();
        $dates=$Blog->getdates();
        $libelles=$Blog->getlibelle();
        $auteur=$Blog->getauteur();
        $image=$Blog->getimage();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dates',$dates);
		$req->bindValue(':libelle',$libelles);
		$req->bindValue(':auteur',$auteur);
		$req->bindValue(':image',$image);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherBlogs(){
		//$sql="SElECT * From Blog e inner join formationphp.Blog a on e.cin= a.cin";
		$sql="SElECT * From blog";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerBlog($cin){
		$sql="DELETE FROM blog where NumBlog= :nom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierBlog($Blog,$nom){
		$sql="UPDATE blog SET nom=:nomm,dates=:dates,libelle=:libelles,auteur=:auteur,image=:image WHERE NumBlog=:nom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomm=$Blog->getNom();
        $dates=$Blog->getdates();
        $libelles=$Blog->getlibelle();
        $auteur=$Blog->getauteur();
        $image=$Blog->getimage();
		$req->bindValue(':nomm',$nomm);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dates',$dates);
		$req->bindValue(':libelles',$libelles);
		$req->bindValue(':auteur',$auteur);
		$req->bindValue(':image',$image);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererBlog($cin){
		$sql="SELECT * from blog where NumBlog=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeBlogs($tarif){
		$sql="SELECT * from blog where auteur=$auteur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>