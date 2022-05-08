<?php
	class Produit{
		//private $id=null;
		private $nom=null;
		private $prix=null;
		private $type=null;
        private $etat=null;
		private $genre=null;
		private $password=null;

		    function __construct($nom, $prix, $type,$etat,$genre){
		
			$this->nom=$nom;
			$this->prix=$prix;
			$this->type=$type;
            $this->etat=$etat;
			$this->genre=$genre;   

		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getprix(){
			return $this->prix;
		}
		function gettype(){
			return $this->type;
		}
        function getetat(){
			return $this->etat;
		}
		function getgenre(){
			return $this->genre;
		}

		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		function settype(string $type){
			$this->type=$type;
		}
        function setetat(string $etat){
			$this->etat=$etat;
		}
		function setgenre(string $genre){
			$this->genre=$genre;
		}

		
	}


?>