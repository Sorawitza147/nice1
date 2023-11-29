<?php

if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    $data = [];
    $incoming = file_get_contents("php://input");
    parse_str($incoming, $data);
    $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
    $cpu = filter_var($data['cpu'], FILTER_SANITIZE_STRING);  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "webservice";

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE space SET name = '$name' WHERE cpu = '$cpu'";     

    $result = $conn->query($sql);

    if ($result) {
        response(208, "Product Updated", $result);
    } else {
        response(400, "Bad request", $result);
    }

    $conn->close();
}

function response($status, $status_message, $data) {
    header("HTTP/1.1 $status");
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}
?>
