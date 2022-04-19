<!DOCTYPE html>
<div style="background-image:url('background.png');padding:5px;width:1500;height:2000px;border:1px solid black;">
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
        <button><a href="afficherListeatickets.php">Retour à la liste des tickets</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idticket'])){
				$aticket = $aticketC->recupereraticket($_POST['idticket']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
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
    </body>
</html>