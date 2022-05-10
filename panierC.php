<?php
	include '../config.php';
	include_once '../Model/panier.php';
	class panierC {
		function afficherpaniers()
		{

			$sql="SELECT p.idcom,t.idticket,t.typeticket,t.prix FROM ticket t,panier p WHERE t.idticket=p.idticket ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerpanier($idpanier){
			$sql="DELETE FROM panier WHERE idcom=:idpanier";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idpanier', $idpanier);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterpanier($idticket){
			$sql="INSERT INTO panier (idticket) 
			VALUES (:idticket)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'idticket' => $idticket,
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

	}
?>