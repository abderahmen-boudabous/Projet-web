<!DOCTYPE html>
<html lang="en">
<?php
	include '../Controller/ProduitC.php';
    include_once '../Model/Produit.php';
    
    
	$produitC=new ProduitC();
	$listeProduits=$produitC->afficherproduits(); 
?>
<?php


    $error = "";

    // create Produit
    $produit = null;

    // create an instance of the controller
    $produitC = new ProduitC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prix"]) &&
		isset($_POST["type"]) &&
        isset($_POST["etat"]) &&
        isset($_POST["genre"]) &&
        isset($_POST["image"])

         


    ) {
        if ( 
			!empty($_POST['nom']) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["type"]) && 
            !empty($_POST["etat"]) && 
            !empty($_POST["genre"]) &&
            !empty($_POST["image"])

        ) {
            $produit = new Produit(
				$_POST['nom'],
                $_POST['prix'], 
				$_POST['type'],
                $_POST['etat'],
                $_POST['genre'],
                $_POST['image']

            );
            $produitC->ajouterproduit($produit);
            header('Location:afficherListeProduits.php');
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
<!--

TemplateMo 552 Video Catalog

https://templatemo.com/tm-552-video-catalog

-->

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
		<main>
			<div class="container-fluid px-0">
				<div class="mx-auto tm-content-container">					
					<div class="row mt-3 mb-5 pb-3">
						<div class="col-12">
							<div class="mx-auto tm-about-text-container px-3">
                            <form  method="GET" action="recherche.php">
                           <input type="text" name="recherche"  >
                              
                           <button type="submit" name="Ajouter" class="btn btn-light">Search </button>
                         </form>
								<table border = "1" >
                                    <thead>
                                               <tr>
                                                  
                                                   <th></th>
                                                   <th>Name</th>
                                                   <th>Price</th>
                                                   <th>Type</th>
                                                   <th>Storage</th>
                                                   <th>Genre</th>
                                                   <th>Image</th>
                                                   <th>Update</th>
                                                   <th>Delete</th>
                                               </tr>
                                       </thead>
                                               <?php
                                                   foreach($listeProduits as $produit){
                                               ?>
                                               <tr>
                                                  <td></td> 
                                                   <td><?php echo $produit['nom']; ?></td>
                                                   <td><?php echo $produit['prix']; ?></td>
                                                   <td><?php echo $produit['type']; ?></td>
                                                   <td><?php echo $produit['etat']; ?></td>
                                                   <td><?php echo $produit['genre']?></td>
                                                   <td><img src=<?php echo $produit['image'];  ?>/></td>  
                                   
                                                   <td>
                                                       <form method="POST" action="modifierproduit.php">
                                                           <input type="submit" name="Update" value="Update">
                                                           <input type="hidden" value=<?PHP echo $produit['id']; ?> name="id">
                                                       </form>
                                                   </td>
                                                   <td>
                                                       <form method="POST" action="supprimerproduit.php">
                                                           <input type="submit" name="Delete" value="delete">
                                                           <input type="hidden" value=<?PHP echo $produit['id']; ?> name="id">
                                                       </form>
                                                   </td>
                                                 
                                               </tr>
                                               <?php
                                                   }
                                               ?>
                                           </table>
							</div>							
						</div>						
					</div>					
				</div>
            
                <a href="searchproduits.php">
                      <button>Search</button>
                </a>
                <a href="triproduitsnom.php">
                      <button>Tri Par Nom</button>
                </a>
                
                <a href="export.php">
                      <button>Excel</button>
                </a>
                                                

				<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-4.jpg"></div>

				
				<form action="" method="POST" >
            <br> <br>
			<tr>
				<td>
					<label for="nom">Name :
					</label>
				</td>
				<td><input type="text" name="nom" id="nom" required placeholder="Name Product :"></td>
			</tr>
            <br> <br>
			<tr>
				<td>
					<label for="prix">Price :
					</label>
				</td>
				<td><input type="number" name="prix" id="prix" placeholder="Price : *** DT"></td>
			</tr>
            <br> <br>
            <!-- <tr>
				<td>
					<label for="genre">Genre :
					</label>
				</td>
				<td><input type="number" name="genre" id="genre" placeholder="genre : "></td>
			</tr> -->
            <label for="genre" >Genre : </label>
            <select  type="text" name="genre" >
            <option value="70 ">drink</option>
            <option value="71 ">snack</option> 
          </select>
            <br> <br>
            <tr>
				<td>
					<label for="image">Image :
					</label>
				</td>
				<td><input type="file" name="image" id="image"></td>
			</tr>
            <br> <br> 
			<label for="type" >SIZE : </label>
            <select  type="text" name="type" >
            <option value="BIG">BIG</option>
            <option value="MEDIUM">MEDIUM</option>
            <option value="SMALL">SMALL</option> 
          </select>
          <br> <br>
        <label> STORAGE :
        <input type="radio" name="etat" value="available" > available 
        </label>
        <label>
        <input type="radio" name="etat" value="not available" > not available 
        </label> 

			<tr>
                <br> <br> 
				<td>
					<input type="submit" value="Add"> 
				</td>
				<td>
					<input type="reset" value="Cancel" >
				</td>
			</tr>
	</form>
	<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-6.jpg"></div>

			</div>
		</main>

			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>