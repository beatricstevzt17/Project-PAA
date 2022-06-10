<?php

function getByCategory()
{
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    }
    $options = array(
        'http' => array(
            'method'  => 'GET'
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents("https://apifromkel1.herokuapp.com/api/v1/products?page=1&categoryId=2", false, $context);
    $response = json_decode($result, true);
    return $response;
}
