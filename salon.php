<?php
	class salon{
		private $idsalle=null;
		private $nbrplace=null;
		private $typesalle=null;
		

		function __construct($idsalle, $nbrplace, $typesalle){
			$this->idsalle=$idsalle;
			$this->nbrplace=$nbrplace;
			$this->typesalle=$typesalle;
			
		}
		function getidsalle(){
			return $this->idsalle;
		}
		function getnbrplace(){
			return $this->nbrplace;
		}
		function gettypesalle(){
			return $this->typesalle;
		}
		
		
		function setnbrplace(string $nbrplace){
			$this->nbrplace=$nbrplace;
		}
		function settypesalle(string $typesalle){
			$this->typesalle=$typesalle;
		}
	
	}


?>