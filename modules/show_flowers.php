<div id='main'>
    <div id="banner">
        <img src='img/banner5.jpg' alt="banner"/>
    </div>
<?php
//korisnik ne moze da udje direktno na ovu stranu, mora da udje na sajt preko index.php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
//require "../config.php";
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 14/04/2015
 * Time: 00:26
 */
//ukoliko nije setovan f_id dodeli mu nulu sto znaci da vraca korisnika na index.php
$searchId = isset($_GET['f_id'])?$_GET['f_id']:0;
if(!filter_var($searchId,FILTER_VALIDATE_INT) || $searchId<1){
    header("Location:./");
}
//citamo rekord iz tabele flowers u zavisnosti koji je f_id izabran
$getFlower = Flower::get($searchId);
//ako ne postoji objekat, odnosno ako je korisnik upisao u url f_id koji ne postoji vrati ga na index.php,koristimo php funkciju property_exists
if(isset($getFlower)){
    if(property_exists($getFlower,"f_id")==false){
        header("Location:./");
    }
}
//svojstvo objekta $flower->image, od stringa pravimo niz,da bi dobili niz img_arr, da bi mogli da pristupimo svakom elementu npr.$img_arr[0] = img10.jpg,$img_arr[1] = img10-mala.jpg
$img_arr = explode(",",$getFlower->image);
//prikazujemo ime biljke kao naslov h3 i description
echo "<div class='block'><h3>{$getFlower->name}</h3>
            {$getFlower->description}<br /><br />";
//koristimo metodu getImage koja petljom prolazi kroz niz img_arr, drugi parametar predstavlja atribut za plugin jquery lightbox galeriju(parametar je ime biljke koja je izabrana)
Flower::getImage($img_arr,$getFlower->getName());
echo "</div>";
?>
    </div>