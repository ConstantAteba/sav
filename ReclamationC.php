<?PHP
include_once "../config.php";
class ReclamationC {
function afficherReclamation ($Reclamation){
		echo "Nom: ".$Reclamation->getNom()."<br>";
		echo "email: ".$Reclamation->getemail()."<br>";
		echo "objet: ".$Reclamation->getobjet()."<br>";
		echo "libelle: ".$Reclamation->getlibelle()."<br>";
	}
	function calculerSalaire($Reclamation){
		echo $Reclamation->getlibelle() * $Reclamation->getobjet();
	}
	function ajouterReclamation($Reclamation){
		$sql="insert into reclamation (nom,email,libelle,objet) values (:nom,:email,:libelle,:objet)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$Reclamation->getNom();
        $email=$Reclamation->getemail();
        $libelle=$Reclamation->getlibelle();
        $objet=$Reclamation->getobjet();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':libelle',$libelle);
		$req->bindValue(':objet',$objet);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherReclamations(){
		//$sql="SElECT * From Reclamation e inner join formationphp.Reclamation a on e.cin= a.cin";
		$sql="SElECT * From reclamation ORDER BY nom";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerReclamation($nom){
		$sql="DELETE FROM Reclamation where nom= :nom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':nom',$nom);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierReclamation($Reclamation,$nom){
		$sql="UPDATE Reclamation SET Etat=:etat WHERE nom=:nom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$nomm=$Reclamation->getNom();
		$etat=1;
		$req->bindValue(':nom',$nomm);
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
        }
		
	}
	function recupererReclamation($cin){
		$sql="SELECT * from Reclamation where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeReclamations($tarif){
		$sql="SELECT * from Reclamation where objet=$objet";
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