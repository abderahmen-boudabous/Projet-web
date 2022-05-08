<?php
	class Movie{
		private $title=null;
		private $director=null;
		private $region=null;
		private $genre=null;
		private $poster=null;



		
		private $password=null;
		function __construct($title, $director, $region, $genre, $poster){
			$this->title=$title;
			$this->director=$director;
			$this->region=$region;
			$this->genre=$genre;
			$this->poster=$poster;


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
		function setposter(string $poster){
			$this->poster=$poster;
		}
		
	}


?>