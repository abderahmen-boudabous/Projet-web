<?php
	include '../config.php';
	include_once '../Model/aticket.php';
	class aticketC {
		function afficheratickets($sort_option,$recherche)
		{
			if(!empty($recherche))
			{
				$sql='SELECT * FROM ticket WHERE typeticket LIKE "%'.$recherche.'%" ORDER BY typeticket DESC';
			}
			else
			{
				$sql="SELECT * FROM ticket ORDER BY typeticket $sort_option";
			}
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimeraticket($idticket){
			$sql="DELETE FROM ticket WHERE idticket=:idticket";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idticket', $idticket);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouteraticket($aticket){
			$sql="INSERT INTO ticket (idticket, typeticket, prix, dateticket) 
			VALUES (:idticket,:typeticket,:prix, :dateticket)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idticket' => $aticket->getidticket(),
					'typeticket' => $aticket->gettypeticket(),
					'prix' => $aticket->getprix(),
					'dateticket' => $aticket->getDateticket()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereraticket($idticket){
			$sql="SELECT * from ticket where idticket=$idticket";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$aticket=$query->fetch();
				return $aticket;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieraticket($aticket, $idticket){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE ticket SET 
						typeticket= :typeticket, 
						prix= :prix, 
						dateticket= :dateticket
					WHERE idticket= :idticket'
				);
				$query->execute([
					'typeticket' => $aticket->gettypeticket(),
					'prix' => $aticket->getprix(),
					'dateticket' => $aticket->getDateticket(),
					'idticket' => $idticket
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>