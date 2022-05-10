<?php
	class panier{
		private $idticket=null;
		private $iduser=null;
		private $aduser=null;

		function __construct($idticket, $iduser,$aduser){
			$this->idticket=$idticket;
			$this->iduser=$iduser;
			$this->aduser=$aduser;
		}
		function getiduser(){
			return $this->iduser;
		}
		function getaduser(){
			return $this->aduser;
		}
		function setiduser(string $iduser){
			$this->iduser=$iduser;
		}
		function setaduser(string $aduser){
			$this->aduser=$aduser;
		}
		
	}
	


?>