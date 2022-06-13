

<?php

if (isset($_POST["sendotp"])) {
    $email = $_POST["email"];

    $array = [
        "email" => $email,
    ];

    $credential = json_encode($array);

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => $credential,
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents("https://rest-api47.herokuapp.com/api/v1/otp/send", false, $context);
    $response = json_decode($result, true);
    if ($response["status"]) {
        header("Location: http://20.212.184.157/PAA/FE/PAA/signin.php"); // Ubah lokasi sesuai yg kalian ingin\
    }
    else {
        $message = "Akun Tidak di temukan";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    // Ketika credential tidak sesuai maka tidak bisa meneruskan ke halaman lain
    
   exit;
}

if (isset($_POST["loginotp"])) {
    $email = $_POST["email"];
    $otp = $_POST["otp"];

    $array = [
        "email" => $email,
        "otp" => $otp,
    ];

    $credential = json_encode($array);

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => $credential,
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents("https://rest-api47.herokuapp.com/api/v1/otp/verif", false, $context);
    $response = json_decode($result, true);
    if ($response["status"]) {
        header("Location: http://20.212.184.157/PAA\app\src\product\screen/index.php"); // Ubah lokasi sesuai yg kalian ingin\
    }
    else {
        $message = "Akun Tidak di temukan";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    // Ketika credential tidak sesuai maka tidak bisa meneruskan ke halaman lain
    
   exit;
    // header("Location: http://20.212.184.157/PAA/FE/PAA/signin.php"); 
}
?>