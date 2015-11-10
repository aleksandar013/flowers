<?php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
?>
<div id='main'>
    <div id="banner">
        <img src='img/banner4.jpg' alt="banner"/>
    </div>
    <?php
    /**
     * User: Aleksandar Kresovic
     * Email: aleksandar.kresovic3@gmail.com
     * Date: 11/04/2015
     * Time: 10:34
     */
    $flowers = Flower::getById(3);
    foreach($flowers as $flower){
        $img_arr = explode(",",$flower->image);
        echo "<div class='block'><h3>{$flower->name}</h3>
            {$flower->intro(120)}<br />";
        Flower::getImage($img_arr,"vrtno");
        echo "</div>";
    }
    ?>
</div>