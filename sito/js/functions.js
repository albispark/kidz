$(document).ready(function(){

  $("button.openbtn").click(function(e){
    document.getElementById("mySidebar").style.width = "275px";
    document.body.style.marginLeft = "275px";
    document.getElementById("mySidebar").style.visibility = "visible";
    /*var modal = document.getElementById("focus_btn");
    modal.focus();*/
    $("body").addClass("fixed_position");
  });

  $(".btn-close").click(function(e){
    document.getElementById("mySidebar").style.visibility = "hidden";
    document.getElementById("mySidebar").style.width = "0";
    document.body.style.marginLeft= "0";
    $("body").removeClass("fixed_position");
  });
});