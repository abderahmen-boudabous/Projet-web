<!DOCTYPE html>
<html lang="en">
    <?php
    include_once '../Model/aticket.php';
    include_once '../Controller/aticketC.php';

    $error = "";

    // create aticket
    $aticket = null;

    // create an instance of the controller
    $aticketC = new aticketC();
    if (
        isset($_POST["idticket"]) &&
		isset($_POST["typeticket"]) &&		
        isset($_POST["prix"]) &&
		isset($_POST["dateticket"]) 
        ) {
        if (
            !empty($_POST["idticket"]) && 
			!empty($_POST['typeticket']) &&
            !empty($_POST["prix"]) && 
			!empty($_POST["dateticket"])

        ) {
            $aticket = new aticket(
                $_POST['idticket'],
				$_POST['typeticket'],
                $_POST['prix'], 
				$_POST['dateticket'],
            );
            $aticketC->modifieraticket($aticket, $_POST["idticket"]);
            header('Location:afficherListeatickets.php');
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
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idticket'])){
				$aticket = $aticketC->recupereraticket($_POST['idticket']);
				
		?>
        
        <form action="" method="POST">
            <table border="0" align="center">
                <tr>
                    <td>
                        <label for="idticket">Numéro aticket:
                        </label>
                    </td>
                    <td><input class="controle"  type="text" name="idticket" id="idticket" value="<?php echo $aticket['idticket']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="typeticket">typeticket:
                        </label>
                    </td>
                    <td><input class="controle"  type="text" name="typeticket" id="typeticket" required pattern="[a-zA-Z-\.]{4,12}" value="<?php echo $aticket['typeticket']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input class="controle"  type="text" name="prix" id="prix" required value="<?php echo $aticket['prix']; ?>" maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="dateticket">Date Ticket:
                        </label>
                    </td>
                    <td>
                        <input class="controle"  type="date" name="dateticket" id="dateticket" required value="<?php echo $aticket['dateticket']; ?>">
                    </td>
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

				<div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

				

		
	</div>

	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parallax.min.js"></script>
</body>
</html>