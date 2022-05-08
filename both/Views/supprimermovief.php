<?php
	include '../Controller/MovieC.php';
	$movieC=new MovieC();
	$movieC->supprimermovie($_GET["idMovie"]);
	header('Location:afficherListeMovies.php');
?>