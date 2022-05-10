<?php
	class aticket{
		private $idpanier = null;
		private $idticket=null;
		private $typeticket=null;
		private $prix=null;
		private $dateticket;

		function __construct($idticket, $typeticket, $prix, $dateticket){
			$this->idticket=$idticket;
			$this->typeticket=$typeticket;
			$this->prix=$prix;
			$this->dateticket=$dateticket;
		}
		function getidpanier(){
			return $this->idpanier;
		}
		function getidticket(){
			return $this->idticket;
		}
		function gettypeticket(){
			return $this->typeticket;
		}
		function getprix(){
			return $this->prix;
		}
		function getDateticket(){
			return $this->dateticket;
		}
		function settypeticket(string $typeticket){
			$this->typeticket=$typeticket;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		function setdateticket(string $dateticket){
			$this->dateticket=$dateticket;
		}
		
	}
	


?>