<?php
	include '../config.php';
	include_once '../Model/Movie.php';
	class MovieC {
		function affichermovies(){
			$sql="SELECT * FROM movies";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function affichermovies11(){
			$sql11="SELECT * FROM movies ORDER BY title ASC ";
			$db = config::getConnexion();
			try{
				$liste11 = $db->query($sql11);
				return $liste11;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimermovie($idMovie){
			$sql="DELETE FROM movies WHERE idMovie=:idMovie";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idMovie', $idMovie);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutermovie($movie){
			$sql="INSERT INTO movies (idMovie, title, director, region, genre, poster) 
			VALUES (:idMovie,:title,:director,:region,:genre,:poster)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idMovie' => $movie->getidMovie(),
					'title' => $movie->gettitle(),
					'director' => $movie->getdirector(),
					'region' => $movie->getregion(),
					'genre' => $movie->getgenre(),
					'poster' => $movie->getposter()


				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperermovie($idMovie){
			$sql="SELECT * from movies where idMovie=$idMovie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$movie=$query->fetch();
				return $movie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiermovie($movie, $idMovie){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE movies SET 
						title= :title, 
						director= :director, 
						region= :region,
						genre= :genre,
						poster= :poster

					WHERE idMovie= :idMovie'
				);
				$query->execute([
					'title' => $movie->gettitle(),
					'director' => $movie->getdirector(),
					'region' => $movie->getregion(),
					'genre' => $movie->getgenre(),
					'poster' => $movie->getposter(),

					'idMovie' => $idMovie
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>