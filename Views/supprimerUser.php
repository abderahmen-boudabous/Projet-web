<?php
	include '../Controller/userC.php';
	$userC=new userC();
	$userC->supprimeruser($_GET["iduser"]);
	header('Location:afficherListeusers.php');
?>