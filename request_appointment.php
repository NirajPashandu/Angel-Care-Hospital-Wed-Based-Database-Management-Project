<?php
$mysqli = new mysqli("localhost", "pashand_hospital", "123456", "pashand_hospital");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($num_rows > 0) {
        $error_msg = "<p style='color: red'><b>Your account already exists! Please login or Create a new account!</b></p>";
    } else {
        $stmt_insert = $mysqli->prepare("INSERT INTO `booking`(`name`, `address`, `contact`, `doctor`, `date`, `time` )");
        $stmt_insert->bind_param("sssssssss", $_POST["name"], $_POST["address"], $_POST["contact"], $_POST["doctor"], $_POST["date"], $_POST["time"]);

 

        if ($stmt_insert->execute()) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $mysqli->error;
        }

 

            $stmt_insert->close();
        }

    }

 

    $booking_result = $mysqli->query("SELECT name, address, contact, doctor, date, time   FROM booking");
    $booking = [];
    while ($row = $booking_result->fetch_assoc()) {
        $booking[] = $row;
    }
    $booking_result->close();
    $mysqli->close();
?>