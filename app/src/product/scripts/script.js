this.window.addEventListener("scroll", function () {
  console.log("aman");

  // when nav appear
  const class_title1 = ["col-12", "col-sm-3", "col-md-5", "col-lg-7"];
  const class_title2 = ["col-12", "col-sm-9", "col-md-7", "col-lg-5", "mx-5"];

  // when nav collapse
  const class_title1_collapse = ["col-lg-3", "col-sm-2"];
  const class_section = ["col-lg-6", "col-sm-7"];
  const class_title2_collapse = ["col-lg-3", "col-sm-3"];

  var nav = this.document.querySelector("nav");
  var title1 = this.document.getElementById("title1");
  var title2 = this.document.getElementById("title2");
  var form = this.document.querySelector("form.mx-4");
  var no_filled = this.document.getElementById("box-section-no-filled");

  if (this.window.scrollY > 40) {
    nav.classList.remove("hideNav");
    title1.classList.add(...class_title1);
    title2.classList.add(...class_title2);
    no_filled.classList.add("hideSection");

    title1.classList.remove(...class_title1_collapse);
    title2.classList.remove(...class_title2_collapse);
    no_filled.classList.remove(...class_section);

    form.classList.remove("hideSearch");
  } else {
    nav.classList.add("hideNav");
    title1.classList.remove(...class_title1);
    title2.classList.remove(...class_title2);
    no_filled.classList.remove("hideSection");

    title1.classList.add(...class_title1_collapse);
    title2.classList.add(...class_title2_collapse);
    no_filled.classList.add(...class_section);

    form.classList.add("hideSearch");
  }
});

function template_konten({ name, discPrice, price }) {
  return `<div class='col-md-4 mt-4'>
      <div div class= "card" style = "width: 16rem; height : 22rem;" >
      <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
      <div class="card-body">
        <h5 class="card-title">${name}</h5>
        <p class="price">Rp ${discPrice}</p>

        <div class="d-flex flex-row mt-4">
          <div class="col-3 discount">10%</div>
          <div class="col-9 real-price"><span class="strikethrough">${price}</span></div>
        </div>

        <div class="d-flex flex-row mt-3">
          <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
            <div class="col-9 kota">Kota Semarang</div>
            <img src="../assets/icons/love.svg" class="love" alt="icon maps">
            </div>
        </div>
      </div>
    </div>`
}

function init() {
  $.ajax({
    type: 'GET',
    dataType: 'json',
    contentType: "application/json",
    cache: true,
    url: 'https://paa-product-4.herokuapp.com/product',
    success: function (response) {
      var len = response.length
      $(".items-data").html("")
      for (let i = 0; i < len; i++) {
        let discount = 10;
        let price = response[i].price
        let discPrice = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(price * (100 - discount) / 100);
        $(".items-data").append(template_konten({ name: response[i].name, discPrice: discPrice, price: price }))
      }
      $("#custom-loading").css("display", "none")
    }
  });
}

init()

$('[id*="search"]').keyup(function () {
  var search_nav = $('#search_navbar').val()
  var search_menu = $('#search_menu').val()
  if (search_nav.length == 0 && search_menu.length == 0) {
    init()
  } else {
    $.ajax({
      type: 'GET',
      dataType: 'json',
      contentType: "application/json",
      cache: true,
      url: 'https://paa-product-4.herokuapp.com/product',
      success: function (response) {
        var len = response.length
        $(".items-data").html("")
        for (let i = 0; i < len; i++) {
          let name = response[i].name
          let discount = 10;
          let price = response[i].price
          let discPrice = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(price * (100 - discount) / 100);

          if ((name.toLowerCase().includes(search_menu) && search_menu.length != 0) || (name.toLowerCase().includes(search_nav) && search_nav.length != 0)) {
            $(".items-data").append(template_konten({ name: response[i].name, discPrice: discPrice, price: price }))
          }
        }
      }
    })
  }
});

