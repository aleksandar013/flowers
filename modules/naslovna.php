<?php
//korisnik ne moze da udje direktno na ovu stranu, mora da udje na sajt preko index.php
if(!defined("FRAMEWORK_LOADED")){
    die ("Invalid enter!");
}
?>
<div id='main'>
    <!-- slider za prikazivanje slika -->
    <div id="wrap">
        <div id="container">
            <img id="img" src="img/img1.jpg" alt="flowers world" />
            <div id="left_holder"><img onclick="slide(-1)" id="left" src="img/arrow_left.png" alt="left slide" /></div>
            <div id="right_holder"><img onclick="slide(+1)" id="right" src="img/arrow_right.png" alt="right slide"/></div>

            <div id="buttons">
                <img src="img/circle1.png" alt="circle1" />
                <img src="img/circle0.png" alt="circle" />
                <img src="img/circle0.png" alt="circle3" />
            </div>
        </div>
    </div>
    <!-- sadrzaj stranice -->
<div class="block">
<h3>Podela cvetnih kultura i značaj</h3>
<p>Cvetne kulture se mogu podeliti na:</p>
<ul>
    <li>vrtno bilje</li>
    <li>sobno-saksijsko cveće</li>
    <li>rezano cveće</li>
</ul>
<p>Vrtno bilje se uglavnom koristi za oplemenjivanje cvetnih trgova, dvorišta, terasa, gradskih parkova.</p>
<p>Sobno-saksijsko cveće se deli na cvetno-dekorativne i lisno-dekorativne vrste.Cvetno-dekorativne se uzgajaju zbog dekorativnosti cveta,dok je kod lisno-dekorativnih glavni dekorativni element - list.</p><p>Rezano cveće se koristi za izradu buketa, aranžmana, bidermajera.Na prvom mestu kao rezano cveće koristi se ruža - <em>kraljica cveća.</em>U grupu rezanog cveća spadaju još i gerber, ljiljan, karanfil, kala.</p>
</div>
<div class="author">
    <button id="btn">Podaci o autoru</button>
    <div id="myDiv">
        <br/>
        <p>Ime i prezime: Aleksandar Kresović</p>
        <p>Zanimanje: PHP Web Developer</p>
        <p>E-mail: aleksandar.kresovic3@gmail.com</p>
        <p>Grad: Pančevo</p>
        <p>Država: Srbija</p>
    </div><!-- kraj sadrzaja stranice -->
</div>
    <div class="border"><div class="banner"></div></div>
</div>
<!-- java script je isto vezan za slider -->
<script type="text/javascript">
    var arrowL = document.getElementById('left');
    var arrowR = document.getElementById('right');

    arrowL.style.visibility="hidden";
    arrowR.style.visibility="hidden";

    arrowL.addEventListener('mouseover', function(){
        arrowL.src = "img/arrow_left_h.png";
    });

    arrowL.addEventListener('mouseout', function(){
        arrowL.src = "img/arrow_left.png";
    })

    arrowR.addEventListener('mouseover', function(){
        arrowR.src = "img/arrow_right_h.png";
    });

    arrowR.addEventListener('mouseout', function(){
        arrowR.src = "img/arrow_right.png";
    })

    document.getElementById("wrap").addEventListener('mouseover', function(){
        arrowL.style.visibility="";
        arrowR.style.visibility="";
        clearInterval(timerid);
    })
    document.getElementById('wrap').addEventListener('mouseout', function(){
        arrowL.style.visibility="hidden";
        arrowR.style.visibility="hidden";
        timerid = setInterval(slide, 4000);
    })
</script>