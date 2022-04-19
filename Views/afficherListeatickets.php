<?php
	include '../Controller/aticketC.php';
	$aticketC=new aticketC();
	$listeatickets=$aticketC->afficheratickets(); 
?>
<html>
<div style="background-image:url('background.png');padding:5px;width:1000;height:1000px;border:1px solid black;">
	<head></head>
	<body>
	    <button><a href="ajouteraticket.php">Ajouter un aticket</a></button>
		<center><h1>Liste des atickets</h1></center>
		<table border="1" align="center">
			<tr>
				<th>idticket</th>
				<th>typeticket</th>
				<th>prix</th>
				<th>DateTicket</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeatickets as $aticket){
			?>
			<tr>
				<td><?php echo $aticket['idticket']; ?></td>
				<td><?php echo $aticket['typeticket']; ?></td>
				<td><?php echo $aticket['prix']; ?></td>
				<td><?php echo $aticket['dateticket']; ?></td>
				<td>
					<form method="POST" action="modifieraticket.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $aticket['idticket']; ?> name="idticket">
					</form>
				</td>
				<td>
					<a href="supprimeraticket.php?idticket=<?php echo $aticket['idticket']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
