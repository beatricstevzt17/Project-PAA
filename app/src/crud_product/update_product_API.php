<?php 
  $url = "https://paa-product-4.herokuapp.com/product/" . $_GET['productId'];
  echo $url;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_PUT, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $headers = array(
    "Content-Type: application/json",
 );
 curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
 $name = $_POST['product'];
 $description = $_POST['description'];
 $price = $_POST['price'];
 $stock = $_POST['stock'];
 
 $data = <<<DATA
 {
  "user_id": 1,
  "category_id": 2,
  "name": "$name",
  "description": "$description",
  "price": "$price",
  "stock": "$stock",
  "image": "-"
 }
 DATA;
 echo $data;
 
 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
 
 //for debug only!
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 
 $resp = curl_exec($curl);
 curl_close($curl);
 var_dump($resp);
 
 ?>
?>