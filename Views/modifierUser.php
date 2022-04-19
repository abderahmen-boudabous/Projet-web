<?php
    include_once '../Model/user.php';
    include_once '../Controller/userC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new userC();
    if (
        isset($_POST["iduser"]) &&
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["Type"]) && 
        isset($_POST["email"]) && 
        isset($_POST["Pwd"])
    ) {
        if (
            !empty($_POST["iduser"]) && 
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["Type"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["Pwd"])
        ) {
            $user = new user(
                $_POST['iduser'],
				$_POST['nom'],
                $_POST['prenom'], 
				$_POST['Type'],
                $_POST['email'],
                $_POST['Pwd']
            );
            $userC->modifieruser($user, $_POST["iduser"]);
            header('Location:afficherListeusers.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="afficherListeusers.php">Retour à la liste des users</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['iduser'])){
				$user = $userC->recupereruser($_POST['iduser']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="iduser">Numéro user:
                        </label>
                    </td>
                    <td><input type="text" name="iduser" id="iduser" value="<?php echo $user['iduser']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Type">Type:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Type" value="<?php echo $user['type']; ?>" id="Type">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Type mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Pwd">Pwd d'inscription:
                        </label>
                    </td>
                    <td>
                        <input type="Pwd" name="Pwd" id="Pwd" value="<?php echo $user['pwd']; ?>">
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