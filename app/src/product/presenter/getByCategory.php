<?php
echo 'diwqjdijwqi
dwqjdwq
diwqjwq
idwqjd
dwiqj';

$options = array(
    'http' => array(
        'method'  => 'GET'
    )
);

$context  = stream_context_create($options);
$result = file_get_contents("https://apifromkel1.herokuapp.com/api/v1/products?page=1&categoryId=2", false, $context);
$response = (array)(json_decode($result, true));


while ($data = $response["data"]["rows"]) {
    var_dump($data);
    echo '
        <div class="col-md-4">
        <div class="card" style="width: 16rem;">
            <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
            <div class="card-body">
                <h5 class="card-title">' . $data["name"] . '</h5>
                <p class="price">Rp <?= number_format($result[$i]["price"], 2, ",", ".") ?></p>
    
                <div class="d-flex flex-row mt-4">
                    <div class="col-3 discount">10%</div>
                    <div class="col-9 real-price">Rp <?= number_format((int)$result[$i]["price"] * 90 / 100, 2, ",", ".") ?></div>
                </div>
    
                <div class="d-flex flex-row mt-3">
                    <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
                    <div class="col-9 kota">Kota Semarang</div>
                    <img src="../assets/icons/love.svg" class="love" alt="icon maps">
                </div>
            </div>
        </div>
    </div>';
}
