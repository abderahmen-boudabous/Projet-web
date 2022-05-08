<?php
	class Genre{
		private $genrename=null;
		private $genredescription=null;


		
		private $password=null;
		function __construct($genrename, $genredescription){
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