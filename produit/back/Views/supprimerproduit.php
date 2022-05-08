<?php
	include '../Controller/ProduitC.php';
	$produitC=new ProduitC();
	$produitC->supprimerproduit($_POST["id"]);
	header('Location:afficherListeProduits.php');
?>