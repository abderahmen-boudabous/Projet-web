<!DOCTYPE html>
<html lang="en">
    <?php
	include '../Controller/MovieC.php';
	$movieC=new MovieC();
    $listeMovies11=$movieC->affichermovies11();

?>
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
<!--

TemplateMo 552 Video Catalog

https://templatemo.com/tm-552-video-catalog

-->
</head>
<style>
    body {
        padding: 0px;
        margin: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    
    table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        background-color: #084969;
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background-color: #084969;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
</style>
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
                           
<br> <br>
								<table>
                                    <thead>
                                               <tr id="header">
                                                   <th>Poster</th>
                                                   <th>title</th>
                                                   <th>director</th>
                                                   <th>region</th>
                                                   <th>genre</th>
                                                   <th>rating</th>

                                   
                                               </tr>
                                       </thead>
                                               <?php
                                                     foreach($listeMovies11 as $movie){
                                               ?>
                                               <tr>
                                                  <td></td> 
                                                   <td><?php echo $movie['title']; ?></td>
                                                   <td><?php echo $movie['director']; ?></td>
                                                   <td><?php echo $movie['region']; ?></td>
                                                   <td><?php echo $movie['genre']; ?></td>
                                                   <td>%<?php echo $movie['rating']; ?> <img src="img/rateicon.jpg"  width="40" height="40" ></td> 


                                   
                                                   <td>
                                                       <form method="POST" action="rating.php">
                                                           <input type="submit" name="Modifier" value="Rate">
                                                           <input type="hidden" value=<?PHP echo $movie['idMovie']; ?> name="idMovie">
                                                       </form>

                                                   </td>
                                                  
                                               </tr>
                                               
                                               <?php
                                                   }
                                               ?>

                                           </table>
                                           <br> <br>
                                        


							</div>
                            							
						</div>
                                                   
					</div>	
                    				
				</div>
                &nbsp;	&nbsp;	&nbsp;  <a href="searchmovies.php"> <button>Movies by genre</button></a>

                <a href="afficherListeMovies11.php"> <button name="btn-sort" id="sort">Sort</button></a>


                &nbsp;	&nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                 <a href="freemovie.html">Watch The dark knight (2008) for free</a> 
                 <br> <br>
				<div class="parallax-window" data-parallax="scroll" data-image-src="img/tn-10.jpg"></div>
<br> <br>	

  



	<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

			</div>
		</main>

			
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>