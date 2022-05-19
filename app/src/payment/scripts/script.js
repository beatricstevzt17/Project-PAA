// this.window.addEventListener("scroll", function () {
//   var header = this.document.querySelector("header");
//   if (this.window.scrollY > 40) {
//     header.classList.add("summonNav");
//     this.document.getElementById("no_filled").style.display = "none";
//     this.document.getElementById("input-navbar").style.display = "flex";
//   } else {
//     header.classList.remove("summonNav");
//     this.document.getElementById("no_filled").style.display = "flex";
//     this.document.getElementById("input-navbar").style.display = "none";
//   }
// });


function confirmCheckout(){
  $('#btn-confirm').css('visibility', 'hidden')
  $('#virtual-acc-num').val('3333 4444 5555 6666')
}