let url = "https://paa-product-4.herokuapp.com/product/";
let xhr = new XMLHttpRequest();

function deleteProduct(productId){
  console.log("called")
  xhr.open("DELETE", url+productId);
  xhr.onload = function () {
    var users = JSON.parse(xhr.responseText);
    if (xhr.readyState == 4 && xhr.status == "200") {
        console.table(users);
        alert("data deleted")
    } else {
        console.error(users);
    }
  }
  xhr.send(null);

  // location.reload();
}
