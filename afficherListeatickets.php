<!DOCTYPE html>
<html lang="en">
    <?php
	include '../Controller/aticketC.php';
    $recherche=null;
    if(isset($_GET['s']) && !empty($_GET['s']))
    {
        $recherche=htmlspecialchars($_GET['s']);
    }
    $sort_option="";
    if(isset($_GET['sort_alphabet']))
    {
        if($_GET['sort_alphabet'] == "a-z")
        {
            $sort_option="ASC";
        }
        else if($_GET['sort_alphabet'] == "z-a")
        {
            $sort_option = "DESC";
        }
    }
	$aticketC=new aticketC();
	$listeatickets=$aticketC->afficheratickets($sort_option,$recherche); 
?>
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
            $aticketC->ajouteraticket($aticket);
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-video-catalog.css">
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
        <button><a href="#section1" class="btn">ajouter un Ticket</a></button>
        <div class="card-body">
        <form method="GET">
             <input type="search" name="s" placeholder="Rechercher un utilisateur">
            <input type="submit" name="envoyer">
        </form>
            <form action="" method="GET"|>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group mb-3">
                            <select name="sort_alphabet" class="form-control">
                                <option value="">--Select Option</option>
                                <option value="a-z"<?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] =="a-z"){echo "selected";} ?> >A-Z (Ascending Order)</option>
                                <option value="z-a" <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] =="z-a"){echo "selected";} ?>>Z-A (Descending Order)</option>
                            </select>
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                Sort
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
		<center><h1>Liste des tickets</h1></center>
		<table border="0" align="center">
			<tr>
				<th>idticket</th>
				<th>typeticket</th>
				<th>prix</th>
				<th>DateTicket</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeatickets as $aticket){
			?>
			<tr>
				<td><?php echo $aticket['idticket']; ?></td>
				<td><?php echo $aticket['typeticket']; ?></td>
				<td><?php echo $aticket['prix']; ?></td>
				<td><?php echo $aticket['dateticket']; ?></td>
				<td>
					<form method="POST" action="modifieraticket.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $aticket['idticket']; ?> name="idticket">
					</form>
				</td>
				<td>
					<a href="supprimeraticket.php?idticket=<?php echo $aticket['idticket']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/about-2.jpg"></div>

        <button><a href="#section2" class="btn">retour a la liste des tickets</a></button>
        <div class="section one" id="section1">
        welcome
    </div>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="0" align="center">
                <tr>
                    <td>
                        <label for="idticket">Numéro aticket:
                        </label>
                    </td>
                    <td><input class="controle" type="text" name="idticket" id="idticket" maxlength="20" ></td>
                </tr>
				<tr>
                    <td>
                        <label for="typeticket">typeticket:
                        </label>
                    </td>
                    <td><input class="controle" type="text" name="typeticket" id="typeticket" maxlength="20" required pattern="[a-zA-Z-\.]{4,12}"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input  class="controle" type="number" min=0  name="prix" id="prix"   required></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateticket">DateTicket:
                        </label>
                    </td>
                    <td>
                        <input  class="controle" type="date" min="19-04-2022" name="dateticket" id="dateticket" required >
                    </td>
                </tr>
                <h4>Genre  <select name="genre">
    <option value="action">Action</option>
    <option value="comedy">Comedy</option>
    <option value="schi-fi">Sci-Fi</option>
    <option value="crime">Crime</option>
    <option value="romance">Romance</option>


   </select></h4>
   <button onclick="window.location.href = 'afficherListesalons.php'">aller a salon</button> 
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
</body>
</html>