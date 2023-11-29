<?php 
$name = $_POST['name']; 
$cpu = $_POST['cpu']; 
$gpu = $_POST['gpu']; 
$ram = $_POST['ram']; 
$psu = $_POST['psu']; 

$postData = "&name=" . $name . "&cpu=" . $cpu . "&gpu=" . $gpu . "&ram=" . $ram . "&psu=" . $psu; 

$service_url = "http://localhost/nice1/serverPOST.php?" . $postData; 
 
$curl = curl_init($service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    $result=json_decode($response);
    if ($result->status == 201) {
        echo $result->status . " Data successful";
        echo "<br>name=" . $name . "<br>cpu=" . $cpu . "<br>gpu=" . $gpu . "<br>ram=" . $ram . "<br>psu=" . $psu;  
    } else {
        echo $result->status_message;
    }
    ?>
    