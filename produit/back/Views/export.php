<?php
// Include Database connection
include("config.php");
// Include SimpleXLSXGen library
include("SimpleXLSXGen.php");
$produit = [
  ['id', 'nom', 'prix', 'type', 'etat','genre']
];
$id = 0;
$sql = "SELECT * FROM produit";
$res = mysqli_query($pdo, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    $id++;
    $produit = array_merge($produit, array(array($id,$row['nom'], $row['prix'], $row['type'], $row['etat'],$row['genre'] )));
  }
}
$xlsx = SimpleXLSXGen::fromArray($produit);
$xlsx->downloadAs('produit.xlsx'); // This will download the file to your local system
// $xlsx->saveAs('produit.xlsx'); // This will save the file to your server
echo "<pre>";
print_r($produit);
?>