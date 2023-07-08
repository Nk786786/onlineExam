<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Virtual Quiz System - Contact</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body {
      background: white;
      font-family: 'Roboto', sans-serif;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .contact-form {
      width: 80%;
      max-width: 500px;
      padding: 40px;
      border-radius: 30px;
      background: linear-gradient(144deg, rgba(126, 39, 156, 1) 0%, rgba(49, 39, 157, 1) 49%);
      color: #fff;
      text-align: center;
    }
    .contact-form h2 {
      font-size: 28px;
      margin-bottom: 20px;
      letter-spacing: 0.5px;
    }
    .contact-form p {
      font-size: 18px;
      font-weight: 300;
      margin-bottom: 20px;
      letter-spacing: 0.5px;
      line-height: 26px;
    }
    .contact-form ul {
      list-style: none;
      margin-bottom: 30px;
    }
    .contact-form ul li {
      margin-top: 15px;
      font-size: 18px;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .contact-form ul li i {
      background: #f44770;
      padding: 12px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .contact-form ul li a {
      color: #fff;
      text-decoration: none;
    }
    .contact-form ul li a:hover {
      color: #f44770;
    }
    .social-icons {
      list-style: none;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
    }
    .social-icons li {
      margin: 0 8px;
    }
    .social-icons li i {
      background: #f44770;
      color: #fff;
      padding: 15px;
      font-size: 20px;
      border-radius: 50%;
      cursor: pointer;
      transition: all .5s;
    }
    .social-icons li i:hover {
      background: #fff;
      color: #000000;
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .contact-form {
        width: 100%;
        padding: 20px;
        border-radius: 20px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="http://localhost/onlineExam/indexing.php">Virtual Quiz System</a>
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
          <a class="nav-link" href="http://localhost/onlineExam/index.php">Student</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="contact-form">
      <h2>Get in Touch</h2>
      <p>Feel free to reach out to us with any questions or inquiries.</p>
      <ul>
        <li><i class="fas fa-map-marker-alt"></i>Aligarh Muslim University, Aligarh, Uttar pradesh, India</li>
        <li><i class="fas fa-phone-alt"></i> <a href="#">+91 8218084713</a></li>
        <li><i class="fas fa-envelope"></i> <a href="navaidmails@gmail.com">navaidmails@gmail.com</a></li>
      </ul>
      <ul class="social-icons">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
      </ul>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
