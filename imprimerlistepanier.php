<?PHP
    include "E:/bd/htdocs/template/Controller/panierC.php";
	
    require_once "E:/bd/htdocs/template/config.php";
	$panierC = new panierC();
	$afficherpanier=$panierC->afficherpaniers();

	
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/style.css">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<a class="logo" href="afficherpanier.php">
      
        </a>
		<title> Afficher Liste des Paniers </title>
    </head>
    <body onload="window.print()">

		<hr>
		
		<table border=1 align = 'center'>
			<tr>
                <th>idcom</th>
				<th>idticket</th>
				<th>nom de film</th>
                <th>prix</th>
                
           
				
			</tr>
		

			<?PHP
				foreach ($afficherpanier as $panier){
			?>
            		<tr>
					<td><?php echo $panier['idcom']; ?></td>
				<td><?php echo $panier['idticket']; ?></td>
				<td><?php echo $panier['typeticket']; ?></td>
                <td><?php echo $panier['prix']; ?></td>
                    
					
					
				</tr>
			<?PHP
				}
			?>
			<?PHP
				
			?>
		</table>
	</body>
</html>