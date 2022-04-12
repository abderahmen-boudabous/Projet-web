<?php
require 'connexion.php';
$id_rec=$_GET['id_rec'];
$sql="DELETE FROM reclamation where id_rec='$id_rec'";
$query=mysqli_query($con,$sql);
if(isset($query)){
header("location:aff.php");
}

?>