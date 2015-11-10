<?php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
abstract class Head {
	public static function getAll(){
        $pdo = DbConn::getConn();
        $pdo->exec("SET NAMES 'utf8';");
        $q = "SELECT * FROM ".static::$table;
        $r = $pdo->query($q);
		$r->setFetchMode(PDO::FETCH_CLASS,get_called_class());
		$res = array();
		while($rw = $r->fetch()){
			$res[] = $rw;
		}
		return $res;
	}
	public static function get($id){
        $pdo = DbConn::getConn();
        $pdo->exec("SET NAMES 'utf8';");
        $id = strip_tags(trim($id));
        $q = "SELECT * FROM ".static::$table." WHERE ".static::$key ."=:id";
        $stmt = $pdo->prepare($q);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,get_called_class());
		$res =  $stmt->fetch();
        return $res;
	}
}