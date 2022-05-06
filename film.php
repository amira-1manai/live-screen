<?php
	class film{
		private $titre=null;
		private $score=null;
		private $nbre_votants=null;
		private $date_sortie;
		private $duree;
		private $qualite;
		private $img;
		private $categorie;
		
		private $password=null;
		function __construct( $titre, $score, $nbre_votants, $date_sortie,$duree,$qualite,$img,$categorie){
			
			$this->titre=$titre;
			$this->score=$score;
			$this->nbre_votants=$nbre_votants;
			$this->date_sortie=$date_sortie;
			$this->duree=$duree;
			$this->qualite=$qualite;
			$this->img=$img;
			$this->categorie=$categorie;
		}
	
		
		function gettitre(){
			return $this->titre;
		}
		function getscore(){
			return $this->score;
		}
		function getnbre_votants(){
			return $this->nbre_votants;
		}
		function getDate_sortie(){
			return $this->date_sortie;
		}
		function getDuree(){
			return $this->duree;
		}
		function getqualite(){
			return $this->qualite;
		}
		function getimg(){
			return $this->img;
		}
		function getcategorie(){
			return $this->categorie;
		}
	
		function settitre(string $titre){
			$this->titre=$titre;
		}
		function setscore(int $score){
			$this->score=$score;
		}
		function setnbre_votants(int $nbre_votants){
			$this->nbre_votants=$nbre_votants;
		}
		function setdate_sortie(string $date_sortie){
			$this->date_sortie=$date_sortie;
		}
		function setduree(int $duree){
			$this->$duree=$duree;
		}
		function setqualite(string $qualite){
			$this->qualite=$qualite;
		}
		function setimg(string $img){
			$this->img=$img;
		}
		function setcategorie(string $categorie){
			$this->categorie=$categorie;
		}
		
	}


?>