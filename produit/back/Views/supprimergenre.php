<?php
	include '../Controller/GenreC.php';
	$genreC=new GenreC();
	$genreC->supprimergenre($_POST["idGenre"]);
	header('Location:afficherListeGenres.php');
?>