$(document).ready(function () {
    let dataProduct = [];
    let dataProduct2 = [];
    let dataProductSearch = [];
    let page = 1;
    let querySearch = "";
    function getDataByCategory(categoryId, page) {
        console.log("masuk")
        $.ajax({
            type: 'GET',
            dataType: 'json',
            contentType: "application/json",
            cache: true,
            url: `https://apifromkel1.herokuapp.com/api/v1/products?page=${page}&categoryId=${categoryId}`,
            success: function (data) {
                dataProduct2 = data["data"]["rows"]
                data["data"]["rows"].forEach(function (item) {
                    const price = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price);
                    const priceDisc = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price * 90 / 100);
                    dataProduct.push(`<div class="col-md-4">
                    <div class="card" style="width: 16rem;">
                        <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="price">Rp ${price}</p>
                
                            <div class="d-flex flex-row mt-4">
                                <div class="col-3 discount">10%</div>
                                <div class="col-9 real-price">Rp ${priceDisc}</div>
                            </div>
                
                            <div class="d-flex flex-row mt-3">
                                <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
                                <p class="col-9 kota">Kota Semarang</p>
                                <img src="../assets/icons/love.svg" class="love" alt="icon maps">
                            </div>
                        </div>
                    </div>
                </div>`)
                });
                $("#loading").hide();
                $(".items-data").html(dataProduct);
            }
        });
    };

    getDataByCategory(2, 1);

    $("#prev").click(function () {
        if (page > 1 && querySearch.length === 0) {
            page--
            $("#loading").show();
            dataProduct = [];
            $(".items-data").html('')
            $.ajax({
                type: 'GET',
                dataType: 'json',
                contentType: "application/json",
                cache: true,
                url: `https://apifromkel1.herokuapp.com/api/v1/products?page=${page}&categoryId=2`,
                success: function (data) {
                    dataProduct2 = data["data"]["rows"]
                    data["data"]["rows"].forEach(function (item) {
                        const price = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price);
                        const priceDisc = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price * 90 / 100);
                        dataProduct.push(`<div class="col-md-4">
                    <div class="card" style="width: 16rem;">
                        <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="price">Rp ${price}</p>
                
                            <div class="d-flex flex-row mt-4">
                                <div class="col-3 discount">10%</div>
                                <div class="col-9 real-price">Rp ${priceDisc}</div>
                            </div>
                
                            <div class="d-flex flex-row mt-3">
                                <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
                                <p class="col-9 kota">Kota Semarang</p>
                                <img src="../assets/icons/love.svg" class="love" alt="icon maps">
                            </div>
                        </div>
                    </div>
                </div>`)
                    });
                    $("#loading").hide();
                    $(".items-data").html(dataProduct);
                }
            });
        }

    })

    $("#next").click(function () {
        if (querySearch.length === 0) {
            $("#loading").show();
            page++
            dataProduct = [];
            $(".items-data").html('')
            $.ajax({
                type: 'GET',
                dataType: 'json',
                contentType: "application/json",
                cache: true,
                url: `https://apifromkel1.herokuapp.com/api/v1/products?page=${page}&categoryId=2`,
                success: function (data) {
                    dataProduct2 = data["data"]["rows"]
                    data["data"]["rows"].forEach(function (item) {
                        const price = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price);
                        const priceDisc = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price * 90 / 100);
                        dataProduct.push(`<div class="col-md-4">
                        <div class="card" style="width: 16rem;">
                            <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="price">Rp ${price}</p>
                    
                                <div class="d-flex flex-row mt-4">
                                    <div class="col-3 discount">10%</div>
                                    <div class="col-9 real-price">Rp ${priceDisc}</div>
                                </div>
                    
                                <div class="d-flex flex-row mt-3">
                                    <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
                                    <p class="col-9 kota">Kota Semarang</p>
                                    <img src="../assets/icons/love.svg" class="love" alt="icon maps">
                                </div>
                            </div>
                        </div>
                    </div>`)
                    });
                    $("#loading").hide();
                    $(".items-data").html(dataProduct);
                }
            });
        }
    })

    $('#search').keyup(function () {
        querySearch = $("#search").val();
        if ($("#search").val().length == 0) {
            $(".items-data").html(dataProduct);
            $(".pagination").show();
        } else {
            $(".pagination").hide();
            dataProductSearch = [];
            dataProduct2.forEach(function (item) {
                if (item.name.toLowerCase().includes($("#search").val())) {
                    const price = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price);
                    const priceDisc = Intl.NumberFormat('en-ID', { maximumSignificantDigits: 3 }).format(item.price * 90 / 100);
                    dataProductSearch.push(`<div class="col-md-4">
                <div class="card" style="width: 16rem;">
                    <img src="../assets/images/laptop1.jpg" class="card-img-top" alt="gambar.">
                    <div class="card-body">
                        <h5 class="card-title">${item.name}</h5>
                        <p class="price">Rp ${price}</p>
            
                        <div class="d-flex flex-row mt-4">
                            <div class="col-3 discount">10%</div>
                            <div class="col-9 real-price">Rp ${priceDisc}</div>
                        </div>
            
                        <div class="d-flex flex-row mt-3">
                            <img src="../assets/icons/location.svg" class="maps" alt="icon maps">
                            <p class="col-9 kota">Kota Semarang</p>
                            <img src="../assets/icons/love.svg" class="love" alt="icon maps">
                        </div>
                    </div>
                </div>
            </div>`)
                }
            })
            $(".items-data").html(dataProductSearch);
        }
    });


})