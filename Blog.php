<?PHP
class Blog{
	private $cin;
	private $nom;
	private $date;
	private $libelle;
	private $auteur;
	private $image;
	function __construct($nom,$auteur,$date,$libelle,$image){
		$this->nom=$nom;
		$this->auteur=$auteur;
		$this->date=$date;
		$this->libelle=$libelle;
		$this->image=$image;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getauteur(){
		return $this->auteur;
	}
	function getlibelle(){
		return $this->libelle;
	}
	function getdates(){
		return $this->date;
	}
	function getimage(){
		return $this->image;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setauteur($auteur){
		$this->auteur=$auteur;
	}
	function setlibelle($libelle){
		$this->libelle=$libelle;
	}
	function setdate($date){
		$this->date=$date;
	}
	
}

?>