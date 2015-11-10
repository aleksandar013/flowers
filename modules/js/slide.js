/**
 * Created by korisnik on 12/04/2015.
 */
$(document).ready(function(){
    $("#btn").click(function(){
       $("#myDiv").slideToggle(1000);
    });
});
$(document).ready(function(){
    $("#btn").mouseenter(function(){
        $(this).css("background-color","#cccccc");
    });
    $("#btn").mouseleave(function(){
        $(this).css("background-color","#ffffff");
    });
});
$(document).ready(function(){
    var url = window.location.href;
    $("#nav ul li a").each(function() {
        if(url == (this.href)) {
            $(this).closest("li").addClass("active");
        }
    });
});