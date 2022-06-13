<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./scripts/senddeleteapi.js" defer></script>
</head>

<body>
    <div class="font-questrial">
        <header>
            <nav class="bg-[#152647] w-full flex items-center justify-between px-24">
                <div id="logo">
                    <h2 class="text-white text-3xl font-semibold">HiTech</h2>
                </div>
                <ul id="menu" class="text-white flex text-lg">
                    <li class="p-5 bg-slate-300"><a href="#">Products</a></li>
                    <li class="p-5"><a href="addproduct.php">Add Product</a></li>
                    <li class="p-5"><a href="editproduct.php">Edit Product</a></li>
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
        <main class="py-12 px-24 flex flex-col gap-12" id="content">
        </main>
    </div>
    <script>
        const user_id = 1
        const api_product = "https://paa-product-4.herokuapp.com/product"
        const api_review = "https://paa-review.herokuapp.com/review/?productId="

        function formatRupiah(price) {
            let val = "";
            let rev = price.toString().split("").reverse();
            for (var pos = 0; pos < rev.length; pos++) {
                if (pos % 3 == 0 && pos != 0) {
                    val += ".";
                }
                val += rev[pos];
            }
            return val.split("").reverse().join("");
        }

        function elementStar(rating) {
            let element = "";
            let c = 0;
            while (rating > 0.5) {
                if (rating >= 1) {
                    element += '<i class="bi bi-star-fill"></i>';
                    rating -= 1;
                    c++;
                } else if (rating >= 0.5) {
                    element += '<i class="bi bi-star-half"></i>';
                    rating -= 0.5;
                    c++;
                }
            }
            if (c < 5) {
                for (let i = 0; i < 5 - c; i++) {
                    element += '<i class="bi bi-star"></i>';
                }
            }
            return element;
        }

        function addProduct(data) {
            let main = $("#content");
            for (let i = 0; i < data.length; i++) {
                const element = data[i];
                main.append(`
                <div class="flex justify-between shadow-lg p-6 rounded-2xl">
                <div class="flex gap-6">
                    <div class="bg-slate-300 w-36 h-36 rounded-lg">
                        <img src="${element.image}" alt="">
                    </div>
                    <div class="flex flex-col justify-between">
                        <div class="flex flex-col gap-2">
                            <h2 class="text-3xl font-semibold">${element.name}</h2>
                            <p class="text-lg">Rp ${formatRupiah(element.price)}</p>
                        </div>
                        <div class="flex gap-8 text-lg">
                            <p>Stock barang : <span>${element.stock}</span></p>
                            <p>Terjual : <span>7</span></p>
                            <p>Rating :
                                <span class="text-yellow-400">
                                    ${element.rating == null ? "Belum ada" : elementStar(element.rating)}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-end">
                    <div class="flex gap-2">
                        <button name="delete" class="border-2 border-[#152647] py-2 px-4 rounded-md" onclick="deleteProduct(${element.product_id})">Delete</button>
                        <a href="./editproduct.php?productId=${element.product_id}"><button name="edit" class="bg-[#152647] text-white py-2 px-4 rounded-md">Edit</button></a>
                    </div>
                </div>
            </div>`);
            }
        }

        async function fetchApi(url) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    cache: false,
                    success: function (data) {
                        resolve(data);
                    },
                    error: function (err) {
                        reject(err);
                    }
                });
            });
        }

        async function init() {
            let products = await fetchApi(api_product);
            products = products.filter((e) => e.user_id == user_id);
            let reviews = [];
            for (let index = 0; index < products.length; index++) {
                const element = products[index];
                const review = await fetchApi(api_review + element.product_id);
                if (review.status && review.result.length) {
                    // get avg rating
                    const rating = review.result.map((e) => e.rating).reduce((p, c) => p + c, 0) / review.result.length;
                    products[index] = { ...products[index], rating: rating };
                } else {
                    products[index] = { ...products[index], rating: null };
                }
            }
            addProduct(products);
        }

        $(document).ready(async () => {
            await init();
        });
    </script>
</body>
</html>