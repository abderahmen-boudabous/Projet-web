<?php
	include '../config.php';
	include_once '../Model/salon.php';
	class salonC {
		function affichersalons(){
			$sql="SELECT * FROM salle";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimersalon($idsalle){
			$sql="DELETE FROM salle WHERE idsalle=:idsalle";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idsalle', $idsalle);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajoutersalon($salon){
			$sql="INSERT INTO salle (idsalle, nbrplace, typesalle) 
			VALUES (:idsalle,:nbrplace,:typesalle)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idsalle' => $salon->getidsalle(),
					'nbrplace' => $salon->getnbrplace(),
					'typesalle' => $salon->gettypesalle(),
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recuperersalon($idsalle){
			$sql="SELECT * from salle where idsalle=$idsalle";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$salon=$query->fetch();
				return $salon;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifiersalon($salon, $idsalle){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE salle SET 
						nbrplace= :nbrplace, 
						typesalle= :typesalle,
					WHERE idsalle= :idsalle'
				);
				$query->execute([
					'nbrplace' => $salon->getnbrplace(),
					'typesalle' => $salon->gettypesalle(),
					'idsalle' => $idsalle
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>