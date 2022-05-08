<!DOCTYPE html>
<html lang="en">
    <?php
    include_once '../Model/Genre.php';
    include_once '../Controller/GenreC.php';

    $error = "";

    // create Genre
    $genre = null;

    // create an instance of the controller
    $genreC = new GenreC();
    if (
        isset($_POST["idGenre"]) &&
		isset($_POST["genrename"]) &&		
        isset($_POST["genredescription"]) 

    ) {
        if (
            !empty($_POST["idGenre"]) && 
			!empty($_POST['genrename']) &&
            !empty($_POST["genredescription"])  

        ) {
            $genre = new Genre(
                $_POST['idGenre'],
				$_POST['genrename'],
                $_POST['genredescription']

            );
            $genreC->modifiergenre($genre, $_POST["idGenre"]);
            header('Location:afficherListeGenres.php');
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
                                    if (isset($_POST['idGenre'])){
                                        $genre = $genreC->recuperergenre($_POST['idGenre']);
                                        
                                ?>
                        
                                <form action="" method="POST">
                                    <table>
                                        <tr>
                                            <br> <br> <br>
                                            <td>
                                                <label for="idGenre">ID Genre:
                                                </label>
                                            </td>
                                            <td><input type="text" readonly name="idGenre" id="idGenre" value="<?php echo $genre['idGenre']; ?>" maxlength="20"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="genrename">genrename:
                                                </label>
                                            </td>
                                            <td><input type="text" name="genrename" id="genrename" value="<?php echo $genre['genrename']; ?>" maxlength="20"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="genredescription">genredescription:
                                                </label>
                                            </td>
                                            <td><input type="text" name="genredescription" id="genredescription" value="<?php echo $genre['genredescription']; ?>" maxlength="20"></td>
                                        </tr>
                        
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" value="Modifier"> 
                                            </td>
                                            <td>
                                                <input type="reset" value="Annuler" >
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                }
                                ?>
<br> <br>
<a href="afficherListeGenres.php">
  <button>Return</button>
</a>
							</div>							
						</div>						
					</div>					
				</div>

				<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

				

				
			</div>
		</main>

			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>