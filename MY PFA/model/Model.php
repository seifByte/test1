<?php
/* c'est le DAO (Data Access Object): Il sert
d’interface entre l’objet métier et la source
physique de données, grâce à PDO.
On y retrouve les requêtes CRUD (Create, Read, Update, Delete)
ainsi que d’autres requêtes d’extraction (recherche,…) */

require_once ("{$ROOT}{$DS}config{$DS}Conf.php"); 

class Model{
	  
	private static $pdo;
	//connexion à la base de donnée
	public static function Init(){
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try{
			self::$pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
			} catch(PDOException $e) {
				die ($e->getMessage()); 
			}
	}

	public static function getsAll(){
	    $SQL="SELECT * FROM ".static::$table;
		$rep = self::$pdo->query($SQL);
		
		/* Avec l’option PDO::FETCH_CLASS, PDO va créer une instance de la
		classe concernée, écrire les attributs correspondants aux champs de la table de
		la BDD puis appeler le constructeur. Ceci permet de récupérer directement un
		objet de la classe concernée */
		
		//ucfirst($string ) Retourne la chaîne string après avoir remplacé le premier caractère par sa majuscule
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));

		return $rep->fetchAll();
	}

	
	
    public static function selectid($cle_primaire) {
	    $sql = "SELECT * from ".static::$table." WHERE ".static::$primary."=:cle_primaire";
	    $req_prep = self::$pdo->prepare($sql);
	    $req_prep->bindParam(":cle_primaire", $cle_primaire);
	    $req_prep->execute();
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));
	    if ($req_prep->rowCount()==0){
			return null;
			die();
	  	}else{
			$rslt = $req_prep->fetch();
			return $rslt;
		}
	      
  	}

	  public static function select($val,$column) {
	    $sql = "SELECT * from ".static::$table." WHERE ".$column."=:val";
	    $req_prep = self::$pdo->prepare($sql);
	    $req_prep->bindParam(":val", $val);
	    $req_prep->execute();
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));
	    if ($req_prep->rowCount()==0){
			return null;
			die();
	  	}else{
			$rslt = $req_prep->fetch();
			return $rslt;
		}
	      
  	}

	  public static function selectmul($val,$column) {
	    $sql = "SELECT * from ".static::$table." WHERE ".$column."=:val";
	    $req_prep = self::$pdo->prepare($sql);
	    $req_prep->bindParam(":val", $val);
	    $req_prep->execute();
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Model'.ucfirst(static::$table));
	    if ($req_prep->rowCount()==0){
			return null;
			die();
	  	}else{
			$rslt = $req_prep->fetchAll();
			return $rslt;
		}
	      
  	}

	public static function delete($cle_primaire) {
		$sql = "DELETE FROM ".static::$table." WHERE ".static::$primary."=:cle_primaire";
		$req_prep = self::$pdo->prepare($sql);
		$req_prep->bindParam(":cle_primaire", $cle_primaire);
		$req_prep->execute();
	}

	public static function insert($data) {

		$columns = implode(", ", array_keys($data));
		$placeholders = implode(", ", array_map(function ($column) { return ":".$column; }, array_keys($data)));
		$sql = "INSERT INTO ".static::$table." ($columns) VALUES ($placeholders)";
		$req_prep = self::$pdo->prepare($sql);
		$req_prep->execute($data);

	}

	public static function lastInsertId() {

		$lastid= self::$pdo->lastInsertId();
	     return $lastid;

	}


	
	public static function update($tab, $cle_primaire) {
		$sql = "UPDATE ".static::$table." SET";
		foreach ($tab as $cle => $valeur){
			$sql .=" ".$cle."=:new".$cle.",";
		}
		$sql=rtrim($sql,",");
		$sql.=" WHERE ".static::$primary."=:oldid;";
		
		  $req_prep = self::$pdo->prepare($sql);
		  $values = array();
	  
	  foreach ($tab as $cle => $valeur){
				$values[":new".$cle] = $valeur;
		  }
		  $values[":oldid"] = $cle_primaire;
		  $req_prep->execute($values);
		  $obj = self::selectid($tab[static::$primary]);
		  return $obj;
  }


			public static function beginTransaction() {
				self::$pdo->beginTransaction();
			}

			public static function commit() {
				self::$pdo->commit();
			}

			public static function rollBack() {
				self::$pdo->rollBack();
			}

  
	
}//class
Model::Init();