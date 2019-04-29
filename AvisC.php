<?PHP
include "config.php";
class AvisC {
function afficherAvis ($Avis){
		echo "Nom: ".$Avis->getNom()."<br>";
		echo "email: ".$Avis->getemail()."<br>";
		echo "note: ".$Avis->getnote()."<br>";
		echo "Commentaire: ".$Avis->getcommentaire()."<br>";
	}
	function calculerSalaire($Avis){
		echo $Avis->getcommentaire() * $Avis->getnote();
	}
	function ajouterAvis($Avis){
		$sql="insert into avis (nom,email,commentaire,note) values (:nom,:email,:commentaire,:note)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$Avis->getNom();
        $email=$Avis->getemail();
        $commentaires=$Avis->getcommentaire();
        $note=$Avis->getnote();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':commentaire',$commentaires);
		$req->bindValue(':note',$note);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherAviss(){
		//$sql="SElECT * From Avis e inner join formationphp.Avis a on e.cin= a.cin";
		$sql="SElECT * From avis";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerAvis($cin){
		$sql="DELETE FROM avis where nom= :nom";
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
	function modifierAvis($Avis,$nom){
		$sql="UPDATE avis SET nom=:nomm,email=:email,commentaire=:commentaires,note=:note WHERE nom=:nom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomm=$Avis->getNom();
        $email=$Avis->getemail();
        $commentaires=$Avis->getcommentaire();
        $tarif=$Avis->getnote();
		$req->bindValue(':nomm',$nomm);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':commentaires',$commentaires);
		$req->bindValue(':note',$note);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererAvis($cin){
		$sql="SELECT * from avis where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeAviss($tarif){
		$sql="SELECT * from avis where note=$note";
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