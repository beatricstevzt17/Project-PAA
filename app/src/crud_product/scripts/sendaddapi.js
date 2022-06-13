let url = "https://paa-product-4.herokuapp.com/product";
let xhr = new XMLHttpRequest();

function addProduct(){
  const name = document.querySelector("#product").value;
  const price = document.querySelector("#price").value;
  const description = document.querySelector("#description").value;
  const stock = document.querySelector("#stock").value;
  // const category_id = document.querySelector();

  console.log("called")
  xhr.open("POST", url, true);

  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState === 4) {
  //      console.log(xhr.status);
  //      console.log(xhr.responseText);  
  //   }};

  xhr.setRequestHeader("Content-Type", "application/json");


  let data = `{
    "user_id": 1,
    "category_id": 2,
    "name": "${name}",
    "description": "${description}",
    "price": "${price}",
    "stock": "${stock}",
    "image": "-"
  }`;
  // console.log(data)

  xhr.onload = function () {
    var users = JSON.parse(xhr.responseText);
    if (xhr.readyState == 4 && xhr.status == "200") {
        console.table(users);
        alert("data added")
    } else {
        console.error(users);
    }
  }
  xhr.send(data);

  // location.reload();
}