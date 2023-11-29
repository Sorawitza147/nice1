<?php
$data=["name"==>"Sorawit","cpu"=>"i513500"]
$url = "http://localhost/nice1/serverPUT.php";


$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $service_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));


$result = curl_exec($ch);


if ($result) {
    echo $result->status . "ส่งข้อมูลไปยังเซิร์ฟเวอร์เรียบร้อย";
} else {
    echo $result->status_message;
}

?>
