<?php
	include '../Controller/GenreC.php';
	$genreC=new GenreC();
	$genreC->supprimergenre($_GET["idGenre"]);
	header('Location:afficherListeGenres.php');
?>