$(document).ready(function(){

  $('button.openbtn').click(function(e){
    document.getElementById("mySidebar").style.width = "275px";
    document.getElementById("main").style.marginLeft = "275px";
    $('body').addClass("fixed_position");
  });

  $('a.closebtn').click(function(e){
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    $('body').removeClass("fixed_position");
  });
});