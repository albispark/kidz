sideBarOpen=false;

$(document).ready(function(){

  $('button.openbtn').click(function(e){
    document.getElementById("mySidebar").style.width = "275px";
    document.getElementById("main").style.marginLeft = "275px";
    document.body.style.overflow = 'hidden';
    sideBarOpen=true;
  });

  $('a.closebtn').click(function(e){
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.overflow = 'none';
    sideBarOpen=false;
  });
});