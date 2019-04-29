<?PHP
class Reclamation{
	private $cin;
	private $nom;
	private $email;
	private $objet;
	private $libelle;
	private $date;
	function __construct($nom,$email,$libelle,$objet){
		$this->nom=$nom;
		$this->email=$email;
		$this->objet=$objet;
		$this->libelle=$libelle;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getemail(){
		return $this->email;
	}
	function getlibelle(){
		return $this->libelle;
	}
	function getobjet(){
		return $this->objet;
	}
	function getdate(){
		return $this->date;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setlibelle($libelle){
		$this->libelle=$libelle;
	}
	function setobjet($objet){
		$this->objet=$objet;
	}
	
}

?>