<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topup</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,500&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="container">
        <!-- <nav>
            <div class="nav-link">
                <h1 class="brand">HiTech</h1>
                <ul>
                    <li><a href="">TOP UP</a></li>
                    <li><a href="">STORE</a></li>
                </ul>
            </div>
            <div class="search-home">
                <div class="search"></div>
                <div class="home"></div>
            </div>
        </nav> -->
        <div class="topnav">
            <a class="nav-link brand" href="#home">HiTech</a>
            <a class="nav-link active" href="#about">TOP UP</a>
            <a class="nav-link" href="#contact">STORE</a>
            <!-- <div class="search-container">
                <form action="/action_page.php">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Search.." name="search">
                </form>
            </div> -->
            <div class="search-home">
                <div class="search">
                    <img class="search-icon" src="../assets/icons/search.png" alt="">
                    <input type="text" placeholder="Search.." name="search">
                </div>
                <a href="" class="home-link"><img class="home-icon" src="../assets/icons/home.png" alt=""></a>
            </div>
        </div>
        <div class="main-content">
            <div class="content">
                <div class="input">
                    <div class="amount-input">
                        <label for="amount-num">Nominal Topup</label>
                        <input type="number" name="amount-num" id="amount-num">
                    </div>
                    <div class="payment-code-input">
                        <label for="payment-code-num">Payment Code</label>
                        <input type="text" name="payment-code-num" id="payment-code-num" disabled value="" placeholder="Confirm to generate">
                    </div>
                    <div class="virtual-acc-input">
                        <label for="virtual-acc-num">Nomor akun virtual</label>
                        <input type="text" name="virtual-acc-num" id="virtual-acc-num" disabled value="" placeholder="Confirm to generate">
                    </div>
                    <div class="select-agen-bank">
                        <label for="agen-bank">Pilih Metode Pembayaran</label>
                        <div class="agen-bank">
                            <select name="agen-bank" id="agen-bank">
                                <option value="empty">Metode Pembayaran</option>
                                <optgroup label="Store" value="cstore">
                                    <option value="1">Indomaret</option>
                                </optgroup>
                                <optgroup label="Bank Transfer" value="bank_transfer">
                                    <option value="2">BRI</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>                    
                </div>
                <div class="instruction-detail">
                    <div id="instruction-text">
                        Confirm to generate
                        <!-- <ol>
                            <li>Login ke <strong>ibank.bni.co.id</strong></li>
                            <li>Pilih menu <strong>TRANSAKSI > VIRTUAL ACCOUNT BILLING</strong></li>
                            <li>Masukkan nomor akun virtual yang muncul pada kolom awal, pilih rekening sumber anda kemudian klik <strong>“Lanjut”</strong></li>
                            <li>Masukkan jumlah top up yang akan dibayarkan</li>
                            <li>Di halaman konfirmasi, masukkan token autentikasi untuk menyelesaikan transaksi anda</li>
                        </ol>
                        <p>Catatan :</p>
                        <ul>
                            <li>Jumlah minimum untuk top up HiPay adalah Rp. 10.000</li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <button class="btn-confirm" id="btn-confirm" onclick="confirmCheckout()">Confirm</button>
        </div>
    </div>
    <script src="../scripts/script.js"></script>
</body>

</html>