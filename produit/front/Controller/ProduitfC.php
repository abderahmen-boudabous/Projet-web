<?php
	include '../config.php';
	include_once '../Model/Produit.php';
	class ProduitC {
		function afficherproduits(){
			$sql="SELECT * FROM produit";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerproduit($id){
			$sql="DELETE FROM produit WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterproduit($produit){
			$sql="INSERT INTO produit (id, nom, prix,type,etat,genre) 
			VALUES (:id, :nom, :prix,:type,:etat,:genre)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id'=>$produit->getid(),
					'nom' => $produit->getnom(),
                    'prix' => $produit->getprix(),
                    'type' => $produit->gettype(),
                    'etat' => $produit->getetat(),
					'genre' => $produit->getgenre(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererproduit($id){
			$sql="SELECT * from produit where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$produit=$query->fetch();
				return $produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierproduit($produit, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE produit SET 
						id=:id,						 
                        nom= :nom,
                        prix= :prix,
                        type= :type,
                        etat = :etat,
						genre = :genre
					WHERE id= :id'
				);
				$query->execute([
					'id'=>$produit->getid(),
					'nom' => $produit->getnom(),
					'prix' => $produit->getprix(),
					'type' => $produit->gettype(),
                    'etat' => $produit->getetat(),
					'genre' => $produit->getgenre(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recherche($search_value)
		{
			$sql="SELECT * FROM produit where 	prix like '$search_value' or nom like '%$search_value%' or type like '%$search_value%'   ";
	
			//global $db;
			$db =Config::getConnexion();
	
			try{
				$result=$db->query($sql);
	
				return $result;
	
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function triproduitsnom(){
			$sql="SELECT * FROM produit ORDER BY nom "; // ORDER BY nom hethy tri par 
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		

	}
?>