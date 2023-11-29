<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webservice";

try {
   
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['search'])) {
        // ดึงค่าที่ระบุในตัวแปร $search
        $search = $_POST['search'];

        $sql = "SELECT * FROM space WHERE name = :name"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $search); 
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
           
            echo "ไม่มีชื่อในระบบ";
        } else {
            
        foreach ($results as $row) {
            echo "Name: " . $row['name'] . "<br>"; 
            echo "CPU: " . $row['cpu'] . "<br>"; 
            echo "GPU: " . $row['gpu'] . "<br>"; 
            echo "RAM: " . $row['ram'] . "<br>"; 
            echo "PSU: " . $row['psu'] . "<br>"; 
            echo "------------------------<br>"; 
        }
    }
    } else {
        echo "Please enter a name to search.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
