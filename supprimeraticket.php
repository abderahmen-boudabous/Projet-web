<?php
	include '../Controller/aticketC.php';
	$aticketC=new aticketC();
	$aticketC->supprimeraticket($_GET["idticket"]);
	header('Location:afficherListeatickets.php');
?>