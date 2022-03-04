// menu burger
var burgerMenu = document.getElementById('burger-menu');
var overlay = document.getElementById('menu');
burgerMenu.addEventListener('click',function(){
  this.classList.toggle("close");
  overlay.classList.toggle("overlay");
});

// boite modale
// function modale() {
//   mod = document.getElementById("modid");
//   mod.style.visibility = (mod.style.visibility == "visible") ? "hidden" : "visible";
//   }

 