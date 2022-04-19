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
<html lang="en">
<div style="background-image:url('background.png');padding:5px;width:1500;height:2000px;border:1px solid black;">
<head>
<img src="logo.png" alt="Logo" height="150"
    width="150">   
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListesalons.php">Retour à la liste des salons</a></button>
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
    </body>
</html>