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
            $userC->ajouteruser($user);
            header('Location:afficherListeusers.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<html lang="en">
<div style="background-image:url('background.png');padding:5px;width:1000;height:1000px;border:1px solid black;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>

    <style>   
    Body {  
      font-family: Calibri, Helvetica, sans-serif;  
        
    }  
    button {   
           background-color: rgb(232,76,136);   
           width: 100%;  
            color: rgb(255, 255, 255);   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     form {   
            border: 3px solid #353030;   
        }   
     input[type=text], input[type=password] ,input[type=number], input[type=email]{   
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
      .cancelbtn {   
            width: auto;   
            padding: 10px 18px;  
            margin: 10px 5px;  
        }   
            
         
     .container {   
            padding: 25px;   
            background-color: rgb(56, 44, 54);  
        }  

        input.controle {
          outline:0;
          font-size:14px;
          width:250px;
        }   
        
        input.controle:valid {
          border:6px solid #0a0;
        }
        input.controle:invalid
        {
          border:6px solid #a00;
        } 
        #message {
          display:none;
          background: #f1f1f1;
          color: #000;
          position: relative;
          padding: 20px;
          margin-top: 10px;
        }

        #message p {
          padding: 10px 35px;
          font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
          color: green;
        }

        .valid:before {
          position: relative;
          left: -35px;
          content: "   ✔";
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
          color: red;
        }

        .invalid:before {
          position: relative;
          left: -35px;
          content: "   ✖";
        }
    </style>   
</head>
    <body>
        <button><a href="afficherListeusers.php">Retour à la liste des users</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <div class="container"> 
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="iduser">ID User
                        </label>
                    </td>
                    <td><input class="controle" type="number" id="iduser" name="iduser" placeholder="Type ID.." required minlength="1" maxlength="20" size="25 "</td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input class="controle" type="text" name="nom" id="nom" placeholder="Type Name.." required minlength="1" maxlength="20" size="25 " required pattern="[a-zA-Z-\.]{1,12}"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input class="controle" type="text" name="prenom" id="prenom" placeholder="Type Surname.." required minlength="1" maxlength="20" size="25 " required pattern="[a-zA-Z-\.]{1,12}" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">E-mail:
                        </label>
                    </td>
                    <td>
                        <input class="controle" type="email" name="email" id="email" placeholder="Type E-mail" required minlength="1" maxlength="20" size="25 ">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="text">Pwd :
                        </label>
                    </td>
                    <td>
                        <input class="controle" type="text" id="pwd" name="pwd" placeholder="Type Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                    </td>
                </tr>

                

                    <div id="message">
                     <tr>
                    <td>
                        <h3>INVALID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                    </td>
                    <td>
                        <p id="letter" class="invalid">    A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">   A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">    A <b>number</b></p>
                        <p id="length" class="invalid">    Minimum <b>8 characters</b></p>
                                            </td>
                </tr>
                    </div>
                <tr>
                    <td>
                        <label for="Type">Type:
                        </label>
                    </td>
                    <td>
                <select name="type" >
                    <option value="Regular">Regular User</option>
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>


                </select>
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input class="controle" type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input  type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </div>
        </form>
    </body>
    <script>
var myInput = document.getElementById("pwd");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
   
</html>