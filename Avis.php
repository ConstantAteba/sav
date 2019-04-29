<?PHP
class Avis{
	private $cin;
	private $nom;
	private $email;
	private $note;
	private $commentaire;
	private $date;
	function __construct($nom,$email,$note,$commentaire){
		$this->nom=$nom;
		$this->email=$email;
		$this->note=$note;
		$this->commentaire=$commentaire;
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
	function getcommentaire(){
		return $this->commentaire;
	}
	function getnote(){
		return $this->note;
	}
	function getdate(){
		return $this->date;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setemail($email){
		$this->email;
	}
	function setcommentaire($commentaire){
		$this->commentaire=$commentaire;
	}
	function setnote($note){
		$this->note=$note;
	}
	
}

?>