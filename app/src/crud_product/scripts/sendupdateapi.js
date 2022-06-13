const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);


let url = `https://paa-product-4.herokuapp.com/product/${urlParams.get('productId')}`
console.log(urlParams.get('productId'));

let xhr = new XMLHttpRequest();

function updateProduct(){
  xhr.open("PUT", url);
  const name = document.querySelector("#product").value;
  const price = document.querySelector("#price").value;
  const description = document.querySelector("#description").value;
  const stock = document.querySelector("#stock").value;

  // console.log(name)


  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
   if (xhr.readyState === 4) {
      console.log(xhr.status);
      console.log(xhr.responseText);  
   }};

  var data = `{
    "user_id": 1,
    "category_id": 2,
    "name": "${name}",
    "description": "${description}",
    "price": "${price}",
    "stock": "${stock}",
    "image": "-"
  }`;
  xhr.send(data);

  alert("product data updated");
}