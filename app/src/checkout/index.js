fetch('http://20.255.60.66:4000/cart/1')
.then(function(response) {
  if (!response.ok) {
    console.log('Error with Status Code: ' + response.status)
    return
  }
  response.json().then(function(data) {
    const urlProduct = 'https://paa-product-4.herokuapp.com/product/'
    for (let i = 0; i < data.data.cart_list.length; i++) {
      document.getElementById("getQuantity").innerHTML += data.data.cart_list[i].quantity + "<br />"
      document.getElementById("inputQuantity").value += data.data.cart_list[i].quantity
      fetch(urlProduct+data.data.cart_list[i].product_id)
      .then(function(response) {

        if (!response.ok) {
          console.log('Error with Status Code: ' + response.status)
          return
        }

        response.json().then(function(data) {
          var price = data.price;
          var	number_string = price.toString(),
            sisa 	= number_string.length % 3,
            priceIDR 	= number_string.substr(0, sisa),
            thousand 	= number_string.substr(sisa).match(/\d{3}/g)
              
          if (thousand) {
            separator = sisa ? '.' : '';
            priceIDR += separator + thousand.join('.')
          }

          document.getElementById("getProduct").innerHTML += data.name + "<br />"
          document.getElementById("getPrice").innerHTML += priceIDR + "<br />"

        })
      })
      .catch(function(err) {
        console.log('Error: ' + err)
      })
    }
  })
})
.catch(function(err) {
  console.log('Error: ' + err);
})