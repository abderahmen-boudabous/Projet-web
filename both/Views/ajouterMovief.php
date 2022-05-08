<!DOCTYPE html>
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
		isset($_POST["region"]) 

    ) {
        if (
            !empty($_POST["idMovie"]) && 
			!empty($_POST['title']) &&
            !empty($_POST["director"]) && 
			!empty($_POST["region"])  

        ) {
            $movie = new Movie(
                $_POST['idMovie'],
				$_POST['title'],
                $_POST['director'], 
				$_POST['region']

            );
            $movieC->ajoutermovie($movie);
            header('Location:afficherListeMovies.php');
        }
        else
            $error = "Missing information";
    }

    
?>

<html lang="en" >


<body>
	    

		<form action="" method="POST">
            
			<tr>
				<td>
                    <br> <br> <br>
					<label for="idMovie">id Movie
					</label>
				</td>
				<td><input type="text" name="idMovie" id="idMovie" maxlength="20" placeholder="Enter the movie id here"></td>
			</tr>
			<tr>
				<td>
					<label for="title">title
					</label>
				</td>
				<td><input type="text" name="title" id="title" required placeholder="Enter the title here"></td>
			</tr>
			<tr>
				<td>
					<label for="director">director
					</label>
				</td>
				<td><input type="text" name="director" id="director" pattern="[a-zA-Z]+[ ][a-zA-Z]+" required placeholder="Enter the director here"></td>
			</tr>
			<tr>
				<td>
					<label for="region">region
					</label>
				</td>
				<td>
					<input type="text" name="region" id="region"  placeholder="Enter the region here" required pattern="[a-zA-Z-.]{3,20}" >
				</td>
			</tr>              
			<tr>
                <br> <br>
            <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="">


				<td></td>
                <br> <br> 
				<td>
					<input type="submit" value="Add"> 
				</td>
				<td>
					<input type="reset" value="Cancel" >
				</td>
			</tr>
	</form>



</body>

</html>