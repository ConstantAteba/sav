<?PHP
class commentaire{
	private $cin;
	private $nom;
	private $date;
	private $libelle;
	private $nb;
	function __construct($nom,$nb,$date,$libelle){
		$this->nom=$nom;
		$this->nb=$nb;
		$this->date=$date;
		$this->libelle=$libelle;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getnb(){
		return $this->nb;
	}
	function getlibelle(){
		return $this->libelle;
	}
	function getdates(){
		return $this->date;
	}
	
	function setNom($nom){
		$this->nom=$nom;
	}
	function setnb($nb){
		$this->nb=$nb;
	}
	function setlibelle($libelle){
		$this->libelle=$libelle;
	}
	function setdates($date){
		$this->date=$date;
	}
	
}

?>