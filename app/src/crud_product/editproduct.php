<?php

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: 111111111111111111111',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }

$product_id = (int) $_GET['productId'];
$url="https://paa-product-4.herokuapp.com/product/$product_id";
 

$get_data =  callAPI('GET', $url, false);
// echo json_decode($get_data, true)['name'] ;
$response = json_decode($get_data, true);
// $errors = $response['response']['errors'];
// $data = $response['response']['data'][0];

// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// $response = curl_exec($curl);
// curl_close($curl);
// echo $response['description']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="./scripts/uploadThumbnail.js" defer></script>
    <script src="./scripts/formInput.js" defer></script>
    <script src="./scripts/sendupdateapi.js" defer></script>
</head>
<body>

    <div class="font-questrial">
        <header>
            <nav class="bg-[#152647] w-full flex items-center justify-between px-24">
                <div id="logo">
                    <h2 class="text-white text-3xl font-semibold">HiTech</h2>
                </div>
                <ul id="menu" class="text-white flex text-lg">
                    <li class="p-5"><a href="listproduct.php">Products</a></li>
                    <li class="p-5"><a href="addproduct.php">Add Product</a></li>
                    <li class="p-5 bg-slate-300"><a href="#">Edit Product</a></li>
                </ul>
                <form>
                    <div class="bg-white py-2 px-4">
                        <i class="bi bi-search mr-2"></i>
                        <input type="text" placeholder="Search..." class="outline-none">
                    </div>
                </form>
                <div class="text-white text-2xl flex gap-4">
                    <a href="#"><i class="bi bi-heart"></i></a>
                    <a href="#"></a><i class="bi bi-cart-fill"></i></a>
                    <a href="#"></a><i class="bi bi-person-circle"></i></a>
                </div>
            </nav>
        </header>
        <main class="py-12 px-24 flex gap-16">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col text-[#152647] w-[640px] h-96 bg-slate-200 rounded-2xl items-center justify-center gap-6">
                    <label for="upload" class="flex flex-col items-center">
                        <div id="thumbnail"></div>
                        <i class="bi bi-images text-8xl"></i>
                        <p class="text-lg font-semibold">Upload Image</p>
                    </label>
                    <input type="file" name="upload" id="upload" class="border-0 w-[100px]" placeholder="upload disini" accept="image/*" multiple>
                </div>
                
            </div>
            <div class="form flex flex-col gap-6 w-full">
                <h1 class="text-4xl font-bold">Update Your Product</h1>
                <div>
                    <input name="product" id="product" value="<?= $response['name']; ?>" placeholder="Product Name" class="w-full outline-none text-center text-2xl font-semibold">
                    <hr class="h-1 bg-[#152647]">
                </div>
                <div class="flex flex-col border-2 border-[#152647] rounded-md px-4 py-2 w-full">
                    <label for="price" class="text-sm">Price</label>
                    <input value="<?= $response['price'] ?>" type="text" name="price" id="price" placeholder="Rp 0" class="text-lg w-full outline-none">
                </div>
                <div class="flex flex-col border-2 border-[#152647] rounded-md px-4 py-2 w-full">
                    <label for="description" class="text-sm">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Add Description..." class="text-lg outline-none"><?= $response['description'] ?></textarea>
                </div>
                <div class="flex flex-col border-2 border-[#152647] rounded-md px-4 py-2 w-full">
                    <label for="stock" class="text-sm">Stock</label>
                    <input type="text" value="<?= $response['stock']; ?>" name="stock" id="stock" placeholder="0" class="text-lg w-full outline-none">
                </div>
                <div class="flex flex-col border-2 border-[#152647] rounded-md px-4 py-2 w-full">
                    <label for="stock" class="text-sm  mb-2">Category (Select One)</label>
                    <div class="grid grid-cols-2">
                        <div class="flex gap-2 items-center text-lg">
                            <input type="radio" name="tv" id="tv">
                            <label for="tv">Television</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="pc" id="pc">
                            <label for="pc">PC / Computer</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="laptop" id="laptop">
                            <label for="laptop">Laptop</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="phone" id="phone">
                            <label for="phone">Smartphone</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="ac" id="ac">
                            <label for="ac">AC / Air Conditioner</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input type="radio" name="other" id="other">
                            <label for="other">Other</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button class="border-2 border-[#152647] py-2 px-4 rounded-md">Delete Product</button>
                    <div class="flex gap-2">
                        <button class="border-2 border-[#152647] py-2 px-4 rounded-md">Cancel</button>
                        <button type="submit" name="ok" class="bg-[#152647] text-white py-2 px-4 rounded-md" onclick="updateProduct()">Save</button>
                    </div>
                </div>
</div>
        </main>
    </div>


</body>


</html>