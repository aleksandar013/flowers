<?php
/**
 * User: Aleksandar Kresovic
 * Email: aleksandar.kresovic3@gmail.com
 * Date: 11/04/2015
 * Time: 10:11
 */
require "config.php";
// asocijativni niz (bela lista) , samo te strane mogu biti ucitane
$pages = array(1=>array("title"=>"Naslovna","file"=>"naslovna.php"),
                2=>array("title"=>"Vrtno bilje","file"=>"vrtno.php"),
                3=>array("title"=>"Saksijsko bilje","file"=>"saksijsko.php"),
                 4=>array("title"=>"Rezano cveće","file"=>"rezano_cvece.php"));
    if(!isset($page_title)) $page_title = "Default Page Title";
//ukoliko nije unet parametar, podrazumevani ce biti 1, znaci ucitace se strana Naslovna
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pageNumber = count($pages);
//validacija,koliko je parametar manji od 1 ili veci odbroja elemenata niza, onda vrati korisnika na pocetnu stranu
    if(!filter_var($page,FILTER_VALIDATE_INT) || $page<1 || $page>$pageNumber){
            header("Location:./");
    }
    switch($page){
        case 1:
            $page_name =  "{$pages[1]['file']}";
            $page_title = "Cvet na dlanu | Home";
            break;
        case 2:
            $page_name =  "{$pages[2]['file']}";
            $page_title = "Cvet na dlanu | Vrtno bilje";
            break;
        case 3:
            $page_name =  "{$pages[3]['file']}";
            $page_title = "Cvet na dlanu | Saksijsko bilje";
            break;
        case 4:
            $page_name =  "{$pages[4]['file']}";
            $page_title = "Cvet na dlanu | Rezano cveće";
            break;
    }
    include "includes/header.php";
//ukoliko postoji $_GET['f_id'] ucitaj stranu show flowers, ukoliko ppostoji $_GET['page'] onda ucitava strane iz niza pages
    if(isset($_GET['f_id']) ){
        include "modules/show_flowers.php";
    } else {
        include "modules/{$page_name}";
    }
    include "includes/footer.php";





