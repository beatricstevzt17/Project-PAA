<?php


if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $array = [
        "email" => $email,
        "password" => $password,
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
    $result = file_get_contents("https://paa-account.herokuapp.com/api/v1/users/login", false, $context);
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