<!DOCTYPE html>
<html lang="en">
<?php
	include '../Controller/salonC.php';
	$salonC=new salonC();
	$listesalons=$salonC->affichersalons(); 
?>
<?php
    include_once '../Model/salon.php';
    include_once '../Controller/salonC.php';

    $error = "";

    // create salon
    $salon = null;

    // create an instance of the controller
    $salonC = new salonC();
    if (
        isset($_POST["idsalle"]) &&
		isset($_POST["nbrplace"]) &&		
        isset($_POST["typesalle"])
       
    ) {
        if (
            !empty($_POST["idsalle"]) && 
			!empty($_POST['nbrplace']) &&
            !empty($_POST["typesalle"])
        ) {
            $salon = new salon(
                $_POST['idsalle'],
				$_POST['nbrplace'],
                $_POST['typesalle'], 
				
            );
            $salonC->ajoutersalon($salon);
            header('Location:afficherListesalons.php');
        }
        else
            $error = "Missing information";
    }


    

    
?>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Catalog</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-video-catalog.css">
    <link rel="stylesheet" href="css/style.css">
<!--

TemplateMo 552 Video Catalog

https://templatemo.com/tm-552-video-catalog

-->
<style>   
    Body {  
      font-family: Calibri, Helvetica, sans-serif;  
        
    }  
    button {   
           background-color: rgb(135,52,176);   
           width: 20%;  
            color: rgb(255, 255, 255);   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     input[type=text], input[type=number] ,input[type=date]{   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
            
            display: inline-block;   
            border: 2px solid rgb(80, 88, 98);   
            box-sizing: border-box;   
        }  
     button:hover {   
            opacity: 0.7;   
        }   
            
         
     .container {   
            padding: 25px;   
            background-color: rgb(195,149,216);  
        }  

        input.controle {
          outline:0;
          font-size:14px;
          width:250px;
        }   
        
        input.controle:valid {
          border:4px solid #0a0;
        }
        input.controle:invalid
        {
          border:4px solid #a00;
        } 
    </style>   
</head>
<body>
	<div class="tm-page-wrap mx-auto">
		<div class="position-relative">
			<div class="potition-absolute tm-site-header">
				<div class="container-fluid position-relative">
                    <div class="row">
                        <div class="col-7 col-md-4">
                            <a href="index.html" >
                                <img src="img\logo.png" alt="logo">
                          
                            </a>
                        </div>
                        <div class="col-5 col-md-8 ml-auto mr-0">
                            <div class="tm-site-nav">
                                <nav class="navbar navbar-expand-lg mr-0 ml-auto" id="tm-main-nav">
                                    <button class="navbar-toggler tm-bg-black py-2 px-3 mr-0 ml-auto collapsed" type="button"
                                        data-toggle="collapse" data-target="#navbar-nav" aria-controls="navbar-nav"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span>
                                            <i class="fas fa-bars tm-menu-closed-icon"></i>
                                            <i class="fas fa-times tm-menu-opened-icon"></i>
                                        </span>
                                    </button>
                                    <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                        <ul class="navbar-nav text-uppercase">
                                            <li class="nav-item active">
                                                <a class="nav-link tm-nav-link" href="index.html">Home </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="about.html">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="contact.html">Reclamation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link tm-nav-link" href="contact.html">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="tm-welcome-container tm-fixed-header tm-fixed-header-2">
				<div class="text-center">
					              	
				</div>                
            </div>

            <div id="tm-fixed-header-bg"></div> <!-- Header image -->
		</div>

		<!-- Page content -->
        <div class="section two" id="section2">
        welcome
    </div>
	<button><a href="#section1" class="btn">ajouter un Salon</a></button>
    
		<center><h1>Liste des salons</h1></center>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for category..">
		<table <table id="myTable" class="table table-striped"   border="1" align="center">
			<tr>
				<th>idsalle</th>
                <th onclick="sortTable(1)">objet(cliquez pour trier)</th> 
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
		
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

        <button><a href="#section2" class="btn">retour a la liste des Salons</a></button>
        <div class="section one" id="section1">
        welcome
    </div>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idsalle">Numéro salon:
                        </label>
                    </td>
                    <td><input class="controle" type="text" name="idsalle" id="idsalle" maxlength="20" required></td>
                </tr>
				<tr>
                    <td>
                        <label for="nbrplace">nbrplace:
                        </label>
                    </td>
                    <td><input class="controle" type="number" name="nbrplace" id="nbrplace" maxlength="20" required></td>
                </tr>
                <tr>
                    <td>
                        <label for="typesalle">typesalle:
                        </label>
                    </td>
                    <td><input  class="controle" type="text"  name="typesalle" id="typesalle"  pattern="[1-9a-zA-Z-\.]{1,2}"  required></td>
                </tr>
               
                <h4>Genre  <select name="genre">
    <option value="action">Action</option>
    <option value="comedy">Comedy</option>
    <option value="schi-fi">Sci-Fi</option>
    <option value="crime">Crime</option>
    <option value="romance">Romance</option>


   </select></h4>
   <button onclick="window.location.href = 'afficherListeatickets.php'">aller a ticket</button> 
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>

        <div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>	

		
			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/filter.js"></script>
</body>
</html>