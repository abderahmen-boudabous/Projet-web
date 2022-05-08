<!DOCTYPE html>
<html lang="en">
<?php
    include_once '../Model/Produit.php';
    include_once '../Controller/ProduitC.php';

    $error = "";

    // create Produitl
    $produit = null;

    // create an instance of the controller
    $produitC = new ProduitC();
    if (
       // isset($_POST["id"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prix"]) &&
		isset($_POST["type"]) &&
        isset($_POST["etat"]) &&
        isset($_POST["genre"])


    ) {
        if (
           // !empty($_POST["id"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["type"]) && 
            !empty($_POST["etat"]) &&
            !empty($_POST["genre"])

        ) {
            $produit = new Produit(
               // $_POST['id'],
				$_POST['nom'],
                $_POST['prix'], 
				$_POST['type'],
                $_POST['etat'],
                $_POST['genre']

            );
            $produitC->modifierproduit($produit, $_POST["id"]);
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

                                <div id="error">
                                    <?php echo $error; ?>
                                </div>
                                    
                                <?php
			if (isset($_POST['id'])){
				$produit = $produitC->recupererproduit($_POST['id']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">ID :
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $produit['id']; ?>" maxlength="20" readonly ></td>
                </tr> 
				<tr>
                    <td>
                        <label for="nom">Name:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $produit['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" value="<?php echo $produit['prix']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="genre">Genre:
                        </label>
                    </td>
                    <td><input type="number" name="genre" id="genre" value="<?php echo $produit['genre']; ?>" maxlength="20"></td>
                </tr>
                
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
                    <td></td>
                    <td>
                        <input type="submit" value="Update"> 
                    </td>
                    <td>
                        <input type="reset" value="Cancel" >
                    </td>
                </tr> 
                                    </table>
                                </form>
                                <?php
                                }
                                ?>
<br> <br>
<a href="afficherListeProduits.php">
  <button>Return</button>
</a>
							</div>							
						</div>						
					</div>					
				</div>

				<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-7.jpg"></div>

				

				
			</div>
		</main>

			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>