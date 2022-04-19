<?php
      require'connexion.php';
   if(isset($_GET['id_rec'])){

      $email=$_POST['email'];
      $type_rec=$_POST['type_rec'];
      $date_rec=$_POST['date_rec'];
      $message=$_POST['message'];
      $id_rec=$_POST['id_rec'];
      $sql="UPDATE reclamation set email='$email',type_rec='$type_rec',date_rec='$date_rec',message='$message' where id='$id' ";
      $q=mysqli_query($con,$sql);
      if(isset($query)){
         header("location:userprofile.php");
    }

   }else{
   $email=$_POST['email'];
   $type_rec=$_POST['type_rec'];
   $date_rec=$_POST['date_rec'];
   $message=$_POST['message'];

   $requete="INSERT INTO reclamation ( email, type_rec, date_rec, message) VALUES('$email','$type_rec','$date_rec','$message')";
   $query=mysqli_query($con,$requete);
   if(isset($query)){
        header("location:userprofile.php");
   }
}
   

?>   