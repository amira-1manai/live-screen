<?php
	include './../../config.php';
	include_once '../../Model/film.php';
	class FilmC {
		function afficherfilms(){
			$sql="SELECT * FROM film";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerfilm($idf){
			$sql="DELETE FROM film WHERE idf=:idf";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idf', $idf);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterfilm($film){
			$sql="INSERT INTO film (titre,score,nbre_votants, Date_sortie,duree,qualite,image,categorie) 
			VALUES ( :titre,:score,:nbre_votants,:Date_sortie,:duree,:qualite,:img,:categorie)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					
					'titre' => $film->gettitre(),
					'score' => $film->getscore(),
					'nbre_votants' => $film->getnbre_votants(),
					'Date_sortie' => $film->getDate_sortie(),
					'duree' => $film->getDuree(),
					'qualite' => $film->getqualite(),
					'img' => $film->getimg(),
					'categorie' => $film->getcategorie()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererfilm($idf){
			$sql="SELECT * from film where idf=$idf";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierfilm($film, $idf){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE film SET 
						titre= :titre, 
						score= :score, 
						nbre_votants= :nbre_votants, 
						Date_sortie= :Date_sortie,
						duree=:duree,
						qualite=:qualite,
						image=:img,
						categorie=:categorie
					WHERE idf= :idf'
				);
				$query->execute([
					'titre' => $film->gettitre(),
					'score' => $film->getscore(),
					'nbre_votants' => $film->getnbre_votants(),
					'Date_sortie' => $film->getDate_sortie(),
					'idf' => $idf,
					'duree' => $film->getDuree(),
					'qualite' => $film->getqualite(),
					'img' => $film->getimg(),
					'categorie' => $film->getcategorie()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>