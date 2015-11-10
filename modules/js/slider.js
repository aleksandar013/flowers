/**
 * Created by korisnik on 04/05/2015.
 */
function goto(x){
    var image = document.getElementById('img');
    image.src = "img/img" + x + ".jpg";
    circleFunc(x);
}

var imagecounter = 1;
var total = 3;

function slide(x){
    if (x == undefined) {
        x = 1;
    }
    var image = document.getElementById('img');
    imagecounter = imagecounter+x;
    if (imagecounter > total) {
        imagecounter = 1;
    }else if (imagecounter < 1) {
        imagecounter = total;
    }
    image.src = "img/img" + imagecounter + ".jpg";
    circleFunc(imagecounter);
}
timerid = setInterval(slide, 4000);

function circleFunc(imagecounter){
    var buttons = document.getElementById('buttons');
    buttons.innerHTML = "";
    for(i=1; i<=total; i++){
        var elem = document.createElement("img");
        elem.setAttribute("onclick", "goto(" + i + ")");
        if (i == imagecounter) {
            elem.setAttribute("src", "img/circle1.png");
        }else{
            elem.setAttribute("src", "img/circle0.png");
        }
        buttons.appendChild(elem);
    }
}

