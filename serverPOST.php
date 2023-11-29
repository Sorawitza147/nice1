<?php
$name = $_REQUEST['name']; 
$cpu = $_REQUEST['cpu']; 
$gpu = $_REQUEST['gpu']; 
$ram = $_REQUEST['ram']; 
$psu = $_REQUEST['psu']; 


$servername = "localhost";
$username = "root";
$password = "";
$dbName = "webservice";
$conn = new mysqli($servername, $username, $password, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO space (name, cpu, gpu, ram, psu) VALUES ('$name', '$cpu', '$gpu', '$ram', '$psu')"; 
$result = $conn->query($sql);

if ($result) {
    response(201, "Product Inserted", $result);
} else {
    response(400, "Product not Inserted", $result);
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
