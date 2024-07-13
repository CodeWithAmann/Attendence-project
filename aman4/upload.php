<?php
//send mail code

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Set timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Assuming you have a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "java@1234";
$dbname = "contactdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if(isset($_POST['fname'], $_POST['mnumber'], $_POST['email'], $_POST['address'], $_POST['purpose'], $_POST['imageData'])) {
    // Retrieve form data
    $fname = $_POST['fname'];
    $entrytime = date('Y-m-d H:i:s'); // Current time in IST
    $mnumber = $_POST['mnumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $purpose = $_POST['purpose'];

    // Decode and save the image data
    $imageData = $_POST['imageData'];
    $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
    $filename = 'uploads/' . uniqid() . '.png';
    file_put_contents($filename, $decodedImage);

    // Insert data into the database
    $sql = "INSERT INTO formdata (fname, entrytime, mnumber, email, address, purpose, photo_path) 
            VALUES ('$fname', '$entrytime', '$mnumber', '$email', '$address', '$purpose', '$filename')";

    if ($conn->query($sql) === TRUE) {
        echo "Data and photo uploaded successfully.";
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ardkptel@gmail.com'; // Your Gmail email address
            $mail->Password = 'bkrq zhjp oasw irky'; // Your Gmail App Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
        
            // Email content
            $mail->setFrom('your email', 'your name');
            $mail->addAddress($email, $fname);
            $mail->Subject = 'SCE Sasaram Entry acknowledgement';
            $mail->Body = 'Thank for visiting our College. Hope you will enjoy your journey.';
        
            // Send email
            if ($mail->send()) {
                echo 'Email sent successfully!';
                // header("Location: https://github.com/");
                // exit();
            } else {
                echo 'Error: ' . $mail->ErrorInfo;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Please fill all the required fields.";
}

$conn->close();
?>
