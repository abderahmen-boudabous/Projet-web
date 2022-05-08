<?php
	class Genre{
		//private $idGenre=null;
		private $genrename=null;		
		private $password=null;

		function __construct(/*$idGenre,*/$genrename){
			//$this->idGenre=$idGenre;
			$this->genrename=$genrename;
			
		}
		function getidGenre(){
			return $this->idGenre;
		}
		function getgenrename(){
			return $this->genrename;
		}

		function setgenrename(string $genrename){
			$this->genrename=$genrename;
		}		
	}
?>