<!DOCTYPE html>
<html lang="en">
    <?php
    include_once '../Model/Movie.php';
    include_once '../Controller/MovieC.php';

    $error = "";

    // create Movie
    $movie = null;

    // create an instance of the controller
    $movieC = new MovieC();
    if (
        isset($_POST["idMovie"]) &&
		isset($_POST["title"]) &&		
        isset($_POST["director"]) &&
		isset($_POST["region"]) &&
        isset($_POST["genre"]) &&
        isset($_POST["rating"]) 



    ) {
        if (
            !empty($_POST["idMovie"]) && 
			!empty($_POST['title']) &&
            !empty($_POST["director"]) && 
			!empty($_POST["region"]) && 
			!empty($_POST["genre"]) &&
            !empty($_POST["rating"]) 


        ) {
            $movie = new Movie(
                $_POST['idMovie'],
				$_POST['title'],
                $_POST['director'], 
				$_POST['region'],
                $_POST['genre'],
                $_POST['rating']



            );
            $movieC->modifiermovie($movie, $_POST["idMovie"]);
            header('Location:afficherListeMovies.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
                                    if (isset($_POST['idMovie'])){
                                        $movie = $movieC->recuperermovie($_POST['idMovie']);
                                        
                                ?>
                        
                                <form action="" method="POST">
                                    <table align="center">
                                        <tr id="header">
                                            <br> <br> <br>

                                            <td><input type="text" hidden name="idMovie" id="idMovie" value="<?php echo $movie['idMovie']; ?>" maxlength="20"></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text" readonly name="title" id="title" value="<?php echo $movie['title']; ?>" maxlength="20"></td>
                                        </tr>
                                        <tr>
                
                                            <td><input type="text" hidden name="director" id="director" value="<?php echo $movie['director']; ?>" maxlength="20"></td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <input type="text" hidden name="region" value="<?php echo $movie['region']; ?>" id="region">
                                            </td>
                                        </tr>  
                                        <tr>

                                            <td>
                                                <input type="text" hidden name="genre" value="<?php echo $movie['genre']; ?>" id="genre">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                        <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">    
                                                </td>
                                                </tr>                    
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="submit" value="Rate"> 
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
<a href="afficherListeMovies.php">
  <button>Return</button>
</a>
							</div>							
						</div>						
					</div>					
				</div>

				<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-11.jpg"></div>

				

				
			</div>
		</main>

			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>
</html>