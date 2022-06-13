<?php


if (isset($_POST["Daftar"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $image = $_POST["image"];

    if ($_POST['password'] !== $_POST['retypePassword']) {
        die('Password and Confirm password should match!');   
    }

    $array = [
        "username" => $username,
        "email" => $email,
        "password" => $password,
        "address" => $address,
        "image" => $image,
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
    $result = file_get_contents("https://paa-account.herokuapp.com/api/v1/users/register", false, $context);
    $response = json_decode($result, true);
    if ($response["status"]) {
        header("Location: http://20.212.184.157/PAA/FE/PAA/signin.php"); // Ubah lokasi sesuai yg kalian ingin\
    }
    else {
        $message = "Format Salah";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    // Ketika credential tidak sesuai maka tidak bisa meneruskan ke halaman lain
    
   exit;
    // header("Location: http://20.212.184.157/PAA/FE/PAA/signin.php"); 
}
?>