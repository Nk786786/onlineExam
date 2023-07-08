<!DOCTYPE html>
<html>
<head>
    <title>VQS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-danger" style="background-color: #343a40; color: #ffffff;">
    <a class="navbar-brand" href="#">Virtual Quiz System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/onlineExam/indexing.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/onlineExam/adminpanel/admin/">Admin <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/onlineExam/">Student</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h2>Virtual Quiz System (VQS)</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="email">Gmail ID:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your gmail id" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com$">
        </div>
        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>
</div>

<?php
// Send the email using Gmail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/Exception.php';
require 'PHPmailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email is provided
    if (empty($_POST['email'])) {
        echo '<div class="container mt-4"><div class="alert alert-danger" role="alert">Please provide a Gmail ID.</div></div>';
        exit;
    }

    $email = $_POST['email'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cee_db";
    $conn = null;

    try {
        $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit;
    }

    // Fetch data for the given email from the database
    $stmt = $conn->prepare("SELECT exmne_fullname, exmne_course, exmne_gender, exmne_birthdate, exmne_year_level, exmne_email, exmne_password FROM examinee_tbl WHERE exmne_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $examinee = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data is found for the given email
    if (!$examinee) {
        echo '<div class="container mt-4"><div class="alert alert-warning" role="alert">No data found for the given email.</div></div>';
        exit;
    }

    // Generate the email body in HTML format
    $emailBody = '<html>
    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2>Examinee Data</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Year Level</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . $examinee["exmne_fullname"] . '</td>
                    <td>' . $examinee["exmne_course"] . '</td>
                    <td>' . $examinee["exmne_gender"] . '</td>
                    <td>' . $examinee["exmne_birthdate"] . '</td>
                    <td>' . $examinee["exmne_year_level"] . '</td>
                    <td>' . $examinee["exmne_email"] . '</td>
                    <td>' . $examinee["exmne_password"] . '</td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'targetfocus2020@gmail.com';
    $mail->Password = 'jgxmfwyoheiebxaz';

    $mail->setFrom('targetfocus2020@gmail.com', 'Admin (VQA)');
    $mail->addAddress($email);
    $mail->Subject = 'Examinee Data';
    $mail->isHTML(true);
    $mail->Body = $emailBody;

    if (!$mail->send()) {
        echo '<script>alert("Email not sent");</script>';
    } else {
        echo '<script>alert("Email sent successfully!");</script>';
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
