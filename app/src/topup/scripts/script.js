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
  // $('#btn-confirm').css('visibility', 'hidden')
  // $('#virtual-acc-num').val('3333 4444 5555 6666')
  var dict = {
    payment_id : $('#agen-bank').val(), 
    gross_amount:$('#amount-num').val(),
    topup_id: 'topup-' + Math.floor(Date.now() * Math.random())
  };

  $.ajax({
      type: "POST", 
      url: "https://hitech-payment.nafishandoko.repl.co/payment/topup",
      data : JSON.stringify(dict),
      contentType: "application/json",
      crossDomain:true,
      success: function (resp) {
        // alert("Access Token :\n"+data.access_token)
        console.log(resp)
        // alert(resp.message+"\nPayment Code/VA Number: "+(resp.data.payment_code||resp.data.va_numbers[0].va_number)+"\nJumlah Tagihan: "+resp.data.gross_amount)
        alert(resp.message)
        $('#payment-code-num').val(resp.data.payment_code||'Not available')
        $('#virtual-acc-num').val(resp.data.va_numbers===undefined?'':resp.data.va_numbers[0].va_number)
        $('#instruction-text').html(resp.data.instruction||'Not available')
      },
      error: function (resp) {
        // alert(data.responseJSON.msg)
        console.log(resp)
      },
  });
}