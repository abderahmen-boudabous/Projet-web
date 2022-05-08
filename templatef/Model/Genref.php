<?php
	class Genre{
		private $idGenre=null;
		private $genrename=null;
		private $genredescription=null;


		
		private $password=null;
		function __construct($idGenre, $genrename, $genredescription){
			$this->idGenre=$idGenre;
			$this->genrename=$genrename;
			$this->genredescription=$genredescription;


		}
		function getidGenre(){
			return $this->idGenre;
		}
		function getgenrename(){
			return $this->genrename;
		}
		function getgenredescription(){
			return $this->genredescription;
		}
		

		function setgenrename(string $genrename){
			$this->genrename=$genrename;
		}
		function setgenredescription(string $genredescription){
			$this->genredescription=$genredescription;
		}
		

		
	}


?>