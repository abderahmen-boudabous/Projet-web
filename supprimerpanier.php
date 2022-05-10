<?php
	include '../Controller/panierC.php';
	$panierC=new panierC();
	$panierC->supprimerpanier($_GET["idcom"]);
	header('Location:afficherpanier.php');
?>