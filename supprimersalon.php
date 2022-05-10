<?php
	include '../Controller/salonC.php';
	$salonC=new salonC();
	$salonC->supprimersalon($_GET["idsalle"]);
	header('Location:afficherListesalons.php');
?>