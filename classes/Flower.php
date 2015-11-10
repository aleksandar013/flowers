<?php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
class Flower extends Head {
	public static $table = "flowers";
	public static $key = "f_id";
    public $f_id = null;
    public $cat_id,$name,$description,$image;
    public static function getById($id){
        $pdo = DbConn::getConn();
        $pdo->exec("SET NAMES 'utf8';");
        $row = array();
        $q = "SELECT * FROM flowers WHERE cat_id = :id";
        $stmt = $pdo->prepare($q);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,"Flower");
        while($res =  $stmt->fetch()){
             $row[]=$res;
        }
        return $row;
    }
    function intro($count){
        return mb_substr($this->description,0,$count,"UTF-8")."<a href='?f_id={$this->getId()}'> Pročitaj više...</a>";
    }/*
    static public function instantiate($record){
        $object = new self;
        foreach($record as $attribute=>$value){
            $object->$attribute = $value;
        }
        return $object;
    }*/
    function getId(){
        return $this->f_id;
    }
     function getName(){
        return $this->name;
    }
    public function insert(){
        $pdo = DbConn::getConn();
        $pdo->exec("SET NAMES 'utf8';");
        $q = "INSERT INTO flowers(cat_id,name,description,image) VALUES (:cat_id,:name,:desc,:img)";
        $stmt=$pdo->prepare($q);
        $stmt->execute(array(":cat_id"=>$this->cat_id,":name"=>$this->name,":desc"=>$this->description,":img"=>$this->image));
    }
    public static function getImage($niz,$lightbox){
        for($i=0,$c = count($niz);$i<$c;$i++){
            if($i%2==0){
                echo "<a href='img/large/{$niz[$i]}' data-lightbox='{$lightbox}'>";
            } else {
                echo "<div class='border'><img src='img/small/{$niz[$i]}'></div></a>";
            }
        }
    }
}

