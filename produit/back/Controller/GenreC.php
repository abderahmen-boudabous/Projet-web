<?php
	include '../config.php';
	include_once '../Model/Genre.php';
	class GenreC {
		function affichergenres(){
			$sql2="SELECT * FROM genre";
			$db = config::getConnexion();
			try{
				$liste2 = $db->query($sql2);
				return $liste2;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimergenre($idGenre){
			$sql2="DELETE FROM genre WHERE idGenre=:idGenre";
			$db = config::getConnexion();
			$req2=$db->prepare($sql2);
			$req2->bindValue(':idGenre', $idGenre);
			try{
				$req2->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutergenre($genre){
			$sql2="INSERT INTO genre (idGenre, genrename) 
			VALUES (:idGenre,:genrename)";
			$db = config::getConnexion();
			try{
				$query2 = $db->prepare($sql2);
				$query2->execute([
					'idGenre'=>$genre->getidGenre(),
					'genrename' => $genre->getgenrename(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperergenre($idGenre){
			$sql2="SELECT * from genre where idGenre=$idGenre";
			$db = config::getConnexion();
			try{
				$query2=$db->prepare($sql2);
				$query2->execute();

				$genre=$query2->fetch();
				return $genre;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiergenre($genre, $idGenre){
			try {
				$db = config::getConnexion();
				$query2 = $db->prepare(
					'UPDATE genre SET 
					    idGenre=:idGenre,
						genrename= :genrename  
					WHERE idGenre= :idGenre'
				);
				$query2->execute([
					'idGenre' =>$genre->getidGenre(),
					'genrename' => $genre->getgenrename(),
					'idGenre' => $idGenre
				]);
				echo $query2->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		
		public function afficherpg($idGenre)
		{
			try{
				$pdo = config::getConnexion();
				$query3 = $pdo->prepare(
					' SELECT * FROM produit WHERE genre = :id'
				);
				$query3->execute([
					'id' => $idGenre
				]);
				return $query3->fetchAll();
			} catch (PDOExpception $e3){
				$e3->getMessage();
			}

		}	
	}
?>