<?PHP
include_once "C:\wamp64\www\bready\config.php";
class commentaireC {
function affichercommentaire ($commentaire){
		echo "Nom: ".$commentaire->getNom()."<br>";
		echo "dates: ".$commentaire->getdates()."<br>";
		echo "libelle: ".$commentaire->getlibelle()."<br>";
	}
	function ajoutercommentaire($commentaire){
		$sql="insert into commentaire (nom,dates,libelle,numBlog) values (:nom,:dates,:libelle,:numBlog)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$commentaire->getNom();
        $dates=$commentaire->getdates();
        $libelles=$commentaire->getlibelle();
        $nb=$commentaire->getnb();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dates',$dates);
		$req->bindValue(':libelle',$libelles);
		$req->bindValue(':numBlog',$nb);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercommentaires(){
		//$sql="SElECT * From commentaire e inner join formationphp.commentaire a on e.cin= a.cin";
		$sql="SElECT * From commentaire";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimercommentaire($cin){
		$sql="DELETE FROM commentaire where nom= :nom";
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
	function supprimerBlog($cin){
		$sql="DELETE FROM commentaire where numBlog= :nom";
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
	function modifiercommentaire($commentaire,$nom){
		$sql="UPdates commentaire SET nom=:nomm,dates=:dates,libelle=:libelles WHERE nom=:nom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomm=$commentaire->getNom();
        $dates=$commentaire->getdates();
        $libelles=$commentaire->getlibelle();
		$req->bindValue(':nomm',$nomm);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':dates',$dates);
		$req->bindValue(':libelles',$libelles);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercommentaire($cin){
		$sql="SELECT * from commentaire where numBlog=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListecommentaires($tarif){
		$sql="SELECT * from commentaire where ";
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