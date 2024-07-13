<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

// Set timezone to Indian Standard Time (IST)
date_default_timezone_set('Asia/Kolkata');

// Create a new PHPMailer instance
$mail = new PHPMailer();

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
if(isset($_POST['mnumber'], $_POST['purpose'])) {
    // Retrieve form data
    $mobilenumber = $_POST['mnumber'];
    $purposeText = $_POST['purpose'];

    // Prepare and execute a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM formdata WHERE mnumber = ?");
    $stmt->bind_param("s", $mobilenumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $entrytime = date('Y-m-d H:i:s');
        $mnumber = $mobilenumber;
        $email = $row['email']; 
        $address = $row['address'];
        $purpose = $purposeText;
        $photoURL = $row['photo_path'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO formdata (fname, entrytime, mnumber, email, address, purpose, photo_path) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $entrytime, $mnumber, $email, $address, $purpose, $photoURL);
        if ($stmt->execute()) {
            echo "Data and photo uploaded successfully.";
            
            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'your-email@gmail.com'; // Your Gmail email address
                $mail->Password = 'your-gmail-app-password'; // Your Gmail App Password
                $mail->SMTPSecure = 'tls'; // Use TLS
                $mail->Port = 587; // TLS port
            
                // Email content
                $mail->setFrom('your-email@gmail.com', 'Your Name');
                $mail->addAddress($email, $fname);
                $mail->Subject = 'SCE Sasaram Entry acknowledgement';
                $mail->Body = 'Thank you for visiting our College. Hope you will enjoy your journey.';
            
                // Send email
                if ($mail->send()) {
                    echo 'Email sent successfully!';
                } else {
                    echo 'Error: ' . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "No record found for the provided mobile number.";
        header("Location: http://localhost/aman4/errorpage/index.php");
        exit();
    }
    $stmt->close(); // Close statement
} else {
    echo "Please fill all the required fields.";
}

$conn->close(); // Close connection
header("Location: http://localhost/aman4/submitalertbutton/index.php"); // Redirect
exit();
?>
