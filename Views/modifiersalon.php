<!DOCTYPE html>
<div style="background-image:url('background.png');padding:5px;width:1500;height:2000px;border:1px solid black;">
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
            $salonC->modifiersalon($salon, $_POST["idsalle"]);
            header('Location:afficherListesalons.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">

<head>
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
        <button><a href="afficherListesalons.php">Retour à la liste des salles</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idsalle'])){
				$salon = $salonC->recuperersalon($_POST['idsalle']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idsalle">Numéro salon:
                        </label>
                    </td>
                    <td><input class="controle"  type="number" name="idsalle" id="idsalle" required value="<?php echo $salon['idsalle']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nbrplace">nbrplace:
                        </label>
                    </td>
                    <td><input class="controle"  type="text" name="nbrplace" id="nbrplace" required value="<?php echo $salon['nbrplace']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="typesalle">typesalle:
                        </label>
                    </td>
                    <td><input class="controle"  type="text" name="typesalle" id="typesalle" required pattern="[1-9a-zA-Z-\.]{1,2}" value="<?php echo $salon['typesalle']; ?>" maxlength="20"></td>
                </tr>

                
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
    </body>
</html>