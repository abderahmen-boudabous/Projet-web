<?php
	include '../Controller/salonC.php';
	$salonC=new salonC();
	$listesalons=$salonC->affichersalons(); 
?>
<html>
<div style="background-image:url('background.png');padding:5px;width:1000;height:1000px;border:1px solid black;">
	<head></head>
	<body>
	    <button><a href="ajoutersalon.php">Ajouter un salon</a></button>
		<center><h1>Liste des salons</h1></center>
		<table border="1" align="center">
			<tr>
				<th>idsalle</th>
				<th>nbrplace</th>
				<th>typesalle</th>
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listesalons as $salon){
			?>
			<tr>
				<td><?php echo $salon['idsalle']; ?></td>
				<td><?php echo $salon['nbrplace']; ?></td>
				<td><?php echo $salon['typesalle']; ?></td>
				
				<td>
					<form method="POST" action="modifiersalon.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $salon['idsalle']; ?> name="idsalle">
					</form>
				</td>
				<td>
					<a href="supprimersalon.php?idsalle=<?php echo $salon['idsalle']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
