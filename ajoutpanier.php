<?php
	include '../Controller/panierC.php';
	$aticketC=new panierC();
	$aticketC->ajouterpanier($_GET["idticket"]);
	header('Location:afficherpanier.php');
?>