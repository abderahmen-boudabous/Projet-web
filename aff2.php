<html>
<head>
<title></title>
</head>
<body>
<h1>DATA</hl><hr>
<table border="1" width="80%">
    <tr>
        <th>user </th>
        <th>message </th>
        <th>date </th>

    </tr>    
<?php
require 'connexion.php';
$requete="SELECT * from chat";
$query=mysqli_query($con,$requete);
while($rows=mysqli_fetch_assoc($query)){
    //$id_rec=$rows['id_rec'];
echo "<tr>";
echo "<td>".$rows['user']."</td>";
echo "<td>".$rows['message']."</td>";
echo "<td>".$rows['date']."</td>";

echo "<td><a href='delete2.php?id=".$rows['id']."'>Supprimer</a></td>";
//echo "<td><a href='userprofile.php?id_rec=".$rows['id_rec']."'>modifier</a></td>";
echo "</tr>";
}
?>
</body>
</html>