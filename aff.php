<html>
<head>
<title>cinema stream</title>
</head>
<body>
<h1>DATA</hl><hr>
<table border="1" width="80%">
    <tr>
        <th>email </th>
        <th>type_rec </th>
        <th>date_rec </th>
        <th>message </th>
    </tr>    
<?php
require 'connexion.php';
$requete="SELECT * from reclamation";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    //$id_rec=$rows['id_rec'];
echo "<tr>";
echo "<td>".$rows['email']."</td>";
echo "<td>".$rows['type_rec']."</td>";
echo "<td>".$rows['date_rec']."</td>";
echo "<td>".$rows['message']."</td>";
echo "<td><a href='delete.php?id_rec=".$rows['id_rec']."'>Supprimer</a></td>";
echo "<td><a href='userprofile.php?id_rec=".$rows['id_rec']."'>modifier</a></td>";
echo "</tr>";
}
?>
</body>
</html>