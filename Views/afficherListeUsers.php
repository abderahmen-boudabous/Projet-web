<?php
	include '../Controller/userC.php';
	$userC=new userC();
	$listeusers=$userC->afficherusers(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouteruser.php">Ajouter un user</a></button>
		<center><h1>Liste des users</h1></center>
		<table border="1" align="center">
			<tr>
				<th>iduser</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Type</th>
				<th>Email</th>
				<th>Pwd</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeusers as $user){
			?>
			<tr>
				<td><?php echo $user['iduser']; ?></td>
				<td><?php echo $user['nom']; ?></td>
				<td><?php echo $user['prenom']; ?></td>
				<td><?php echo $user['type']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><?php echo $user['pwd']; ?></td>
				<td>
					<form method="POST" action="modifieruser.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $user['iduser']; ?> name="iduser">
					</form>
				</td>
				<td>
					<a href="supprimeruser.php?iduser=<?php echo $user['iduser']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
