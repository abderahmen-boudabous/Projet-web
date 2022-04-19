<?php
	class user{
		private $iduser=null;
		private $nom=null;
		private $prenom=null;
		private $Type=null;
		private $email=null;
		private $Pwd=null;
		
		function __construct($iduser, $nom, $prenom, $Type, $email, $Pwd){
			$this->iduser=$iduser;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->Type=$Type;
			$this->email=$email;
			$this->Pwd=$Pwd;
		}
		function getiduser(){
			return $this->iduser;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getType(){
			return $this->Type;
		}
		function getEmail(){
			return $this->email;
		}
		function getPwd(){
			return $this->Pwd;
		}
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setType(string $Type){
			$this->Type=$Type;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setPwd(string $Pwd){
			$this->Pwd=$Pwd;
		}
		
	}


?>