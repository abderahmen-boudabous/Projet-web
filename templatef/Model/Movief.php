<?php
	class Movie{
		private $idMovie=null;
		private $title=null;
		private $director=null;
		private $region=null;
		private $genre=null;
		private $rating=null;
		private $poster=null;



		
		private $password=null;
		function __construct($idMovie, $title, $director, $region, $genre, $rating){
			$this->idMovie=$idMovie; 
			$this->title=$title;
			$this->director=$director;
			$this->region=$region;
			$this->genre=$genre;
			$this->rating=$rating;


		}
		function getidMovie(){
			return $this->idMovie;
		}
		function gettitle(){
			return $this->title;
		}
		function getdirector(){
			return $this->director;
		}
		function getregion(){
			return $this->region;
		}
		function getgenre(){
			return $this->genre;
		}
		function getrating(){
			return $this->rating;
		}
		function getposter(){
			return $this->poster;
		}
		function settitle(string $title){
			$this->title=$title;
		}
		function setdirector(string $director){
			$this->director=$director;
		}
		function setregion(string $region){
			$this->region=$region;
		}
		function setgenre(string $genre){
			$this->genre=$genre;
		}
		function setrating(string $rating){
			$this->rating=$rating;
		}
		function setposter(string $poster){
			$this->poster=$poster;
		}
		function getInputFromTextBox() {
$idMovie = document. getElementById("idMovie").value;
			alert($idMovie);
			}
			
	}


?>