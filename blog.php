
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Virtual Quiz System</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS Styles */
    body {
      background-color: #f8f9fa;
      color: #333;
    }

    .navbar {
  background-color: #dc3545; /* Modified: Changed navbar color to match VQS theme */
}

.navbar-brand {
  color: #fff; /* Modified: Changed navbar brand text color to white */
}

.navbar-nav .nav-link {
  color: #fff; /* Modified: Changed navbar link text color to white */
}

.blog-content {
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.blog-title {
  font-size: 32px;
  margin-bottom: 20px;
}

.blog-date {
  color: #999;
  margin-bottom: 20px;
}

.blog-description {
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.cta-button {
  background-color: #dc3545; /* Modified: Changed CTA button color to match VQS theme */
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.cta-button:hover {
  background-color: #c82333; /* Modified: Changed CTA button hover color to match VQS theme */
}

.animated {
  animation-duration: 1s;
  animation-fill-mode: both;
}

.fadeIn {
  animation-name: fadeIn;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.blog-image {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
  margin: 0 auto; /* Center the image horizontally */
  display: block; /* Ensure the image is treated as a block element */
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
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="blog-content animated fadeIn">
          <h2 class="blog-title">Revolutionizing Education with Virtual Quizzes</h2>
          <p class="blog-date">Published on June 26, 2023</p>
          <img src="canva/logo2.png" alt="Virtual Quiz System" class="blog-image">
          <p class="blog-description">The Virtual Quiz System (VQS) has emerged as a game-changer in the field of education. With its engaging online environment, it revolutionizes the way quizzes are conducted.</p>
          <p class="blog-description">Using VQS, participants can engage in quizzes remotely, eliminating the need for physical presence. The system provides a variety of quiz categories and timed quizzes, ensuring a challenging and interactive experience. Participants' answers are automatically recorded, and immediate feedback and scores are provided.</p>
          <p class="blog-description">Administrators have the authority to create and update quiz categories, questions, and time limits. They can also monitor participant performance, view quiz results, and receive feedback.</p>
          <p class="blog-description">VQS is developed using PHP and PDO, ensuring efficient database connectivity and secure data management. The system incorporates a timer feature that restricts participants to complete the quiz within the allocated time, adding an element of challenge.</p>
          <p class="blog-description">Overall, VQS provides an engaging and convenient online platform for conducting quizzes. It promotes interactive learning and assessment, allowing educational institutions, organizations, and individuals to host quizzes remotely.</p>
          <p class="text-center">
            <a href="#" class="cta-button">Learn More</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>