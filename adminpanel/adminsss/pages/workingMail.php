<?php

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email is provided
    if (empty($_POST['email'])) {
        echo "Please provide a Gmail ID.";
        exit;
    }

    $email = $_POST['email'];

    // Fetch data for the given email from the database
    $stmt = $conn->prepare("SELECT exmne_fullname, exmne_course, exmne_gender, exmne_birthdate, exmne_year_level, exmne_email, exmne_password FROM examinee_tbl WHERE exmne_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $examinee = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if data is found for the given email
    if (!$examinee) {
        echo "No data found for the given email.";
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
        <table>
            <tr>
                <th>Full Name</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Year Level</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <tr>
                <td>'.$examinee["exmne_fullname"].'</td>
                <td>'.$examinee["exmne_course"].'</td>
                <td>'.$examinee["exmne_gender"].'</td>
                <td>'.$examinee["exmne_birthdate"].'</td>
                <td>'.$examinee["exmne_year_level"].'</td>
                <td>'.$examinee["exmne_email"].'</td>
                <td>'.$examinee["exmne_password"].'</td>
            </tr>
        </table>
    </body>
    </html>';

    // Send the email using Gmail
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
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
        echo 'Error sending email: ' . $mail->ErrorInfo;
    } else {
        echo 'Email sent successfully!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <form method="post" action="">
        <label for="email">Gmail ID:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Send Email</button>
    </form>
</body>
</html>
