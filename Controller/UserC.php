<?php
	include '../config.php';
	include_once '../Model/user.php';
	class userC {
		function afficherusers(){
			$sql="SELECT * FROM users";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimeruser($iduser){
			$sql="DELETE FROM users WHERE iduser=:iduser";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':iduser', $iduser);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouteruser($user){
			$sql="INSERT INTO users (iduser, Nom, Prenom, Type, Email, Pwd) 
			VALUES (:iduser,:Nom,:Prenom, :Type,:Email, :Pwd)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'iduser' => $user->getiduser(),
					'Nom' => $user->getNom(),
					'Prenom' => $user->getPrenom(),
					'Type' => $user->getType(),
					'Email' => $user->getEmail(),
					'Pwd' => $user->getPwd()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereruser($iduser){
			$sql="SELECT * from users where iduser=$iduser";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieruser($user, $iduser){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE users SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						Type= :Type, 
						Email= :Email, 
						Pwd= :Pwd
					WHERE iduser= :iduser'
				);
				$query->execute([
					'Nom' => $user->getNom(),
					'Prenom' => $user->getPrenom(),
					'Type' => $user->getType(),
					'Email' => $user->getEmail(),
					'Pwd' => $user->getPwd(),
					'iduser' => $iduser
				]);
				echo $query->rowCount() . " records UPDATE successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>