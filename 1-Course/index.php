<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Recommendations</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="stylehf.css">
  <style>
    @font-face {
    font-family: myFont2;
    src: url(Book+Ends.ttf);
}

/* Footer Styles */
#survey-footer {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    height:20px;
    background-color: white;
    color: black;
}

.container-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: lightcyan;
    color: black;
    height:50px;
}

.footer-logo .logo {
    color: black;
    text-decoration: none;
    padding: 5px;
    font-family: myFont2;
    font-size: 50px;
}

.footer-social a {
    color: black;
    text-decoration: none;
    margin-right: 10px;
}

.footer-copyright {
    color: black;
    font-size: 14px;
    margin-bottom: 20px;
    text-align: center;
}

/* Header Styles */
#custom-header {
    position:relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 50px; /* Adjust height as needed */
    background-color: white;
}

.container-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0; /* Adjusted margin to remove left margin */
    padding: 10px 20px; /* Adjust padding as needed */
}

.custom-navbar-header {
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 1200px;
    margin-bottom: 40px; /* Adjust margin as needed */
}

.custom-navbar-brand {
    font-size: 20px;
    position: relative;
    top: -30px; /* Adjusted top position to move the logo up */
}

.custom-main-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    margin-bottom: 50px;
    margin-left: 40px;
}

.custom-main-menu li {
    margin-left: 20px;
}

.custom-main-menu li:first-child {
    margin-left: 0;
}

.custom-main-menu li a {
    color: black;
    text-decoration: none;
    
}

.custom-main-menu li a:hover {
    color: #CA2DBC;
}

.custom-dropdown {
    position: relative;
}

.custom-dropdown-content {
    display: none;
    position: absolute;
    backdrop-filter: blur(10px);
    background-color: rgba(255, 255, 255, 0.5);
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.custom-dropdown-content a {
    color: #000;
    padding: 12px 16px;
    display: block;
    text-decoration: none;
}

.custom-dropdown-content a:hover {
    background-color: #f1f1f1;
}

.custom-dropdown:hover .custom-dropdown-content {
    display: block;
}

#custom-nav {
    margin-left: auto;
}

.custom-logo {
    font-family: myFont2;
    font-size: 60px;
    text-decoration: none;
    color: black;
    margin-top: -10px; /* Adjusted margin-top to move the logo up */

    
}

  </style>
</head>
<body>
  
<header id="custom-header">
  <div class="container-nav">
      <div class="custom-navbar-header">
          <!-- Logo -->
          <div class="custom-navbar-brand">
              <a class="custom-logo" href="../main.php">(VIBE)</a>
          </div>
          <!-- Navigation -->
          <?php
    // Check if the user is logged in
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true):
?>
    <!-- Navigation -->
    <nav id="custom-nav">
        <ul class="custom-main-menu">
            <li><a href="../main.php">Home</a></li>
            <li class="custom-dropdown">
                <a class="custom-dropbtn" href="javascript:void(0)">Services <span>&#11167;</span></a>
                <div class="custom-dropdown-content">
                    <a href="http://127.0.0.1:5000">Career Prediction</a>
                    <a href="http://127.0.0.1:5001">Resume Analyzer</a>
                    <a href="../1-Job/index.php">Job Recommendations</a>
                    <a href="../1-Course/index.php">Course Recommendations</a>
                    <a href="../blog.php">Knowledge Network</a>
                </div>
            </li>
            <li><a href="../main.php#about">About Us</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="../logout.php">Log Out</a></li> <!-- Link to logout script -->
        </ul>
    </nav>
    <!-- /Navigation -->
<?php else: ?>
    <!-- Navigation -->
    <nav id="custom-nav">
        <ul class="custom-main-menu">
            <li><a href="../main.php">Home</a></li>
            <li class="custom-dropdown">
                <a class="custom-dropbtn" href="javascript:void(0)">Services <span>&#11167;</span></a>
                <div class="custom-dropdown-content">
                    <a href="../login.php">Career Prediction</a>
                    <a href="../login.php">Resume Analyzer</a>
                    <a href="../1-Job/index.php">Job Recommendations</a>
                    <a href="../1-Course/index.php">Course Recommendations</a>
                    <a href="../blog.php">Knowledge Network</a>
                </div>
            </li>
            <li><a href="../main.php#about">About Us</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="../login.php">Log In</a></li> <!-- Link to login page -->
        </ul>
    </nav>
    <!-- /Navigation -->
<?php endif; ?>

          <!-- /Navigation -->
      </div>
  </div>
</header>

  <header>
    <h1>Course Recommendations</h1>
  </header>
  <main>
    <div class="filter1">
    <div id="filters">
      <label for="category">Filter by Category:</label>
      <select id="category">
        <option value="all">All</option>
        <option value="AI/ML Specialist">AI ML Specialist</option>
        <option value="API Integration Specialist">API Integration Specialist</option>
        <option value="Application Support Engineer">Application Support Engineer</option>
        <option value="Business Analyst">Business Analyst</option>
        <option value="Customer Service Executive">Customer Service Executive</option>
        <option value="Cyber Security Specialist">Cyber Security Specialist</option>
        <option value="Data Scientist">Data Scientist</option>
        <option value="Database Administrator">Database Administrator</option>
        <option value="Graphics Designer">Graphics Designer</option>
        <option value="Hardware Engineer">Hardware Engineer</option>
        <option value="Helpdesk Engineer">Helpdesk Engineer</option>
        <option value="Information Security Specialist">Information Security Specialist</option>
        <option value="Networking Engineer">Networking Engineer</option>
        <option value="Project Manager">Project Manager</option>
        <option value="Software Developer">Software Developer</option>
        <option value="Software Tester">Software Tester</option>
        <option value="Technical Writer">Technical Writer</option>
        <option value="Chief Information Officer">Chief Information Officer</option>
        <option value="IT Support Specialist">IT Support Specialist</option>
      </select>
    </div>
</div>
    <div id="courses" class="card-container">
      <!-- Course cards will be dynamically added here -->
    </div>
  </main>
  <script src="script.js"></script>
  
<footer id="survey-footer" class="section">
  <div class="container-footer">
      <div class="row">
          <div class="col-md-6 col-sm-12">
              <div class="footer-logo">
                  <a class="logo" href="../main.php">(VIBE)</a>
              </div>
          </div>
          <div class="col-md-4 col-md-offset-2 col-sm-12">
              <div class="footer-social">
                  <!-- Add social media links or icons here -->
              </div>
          </div>
      </div>
      <div id="survey-bottom-footer" class="row">
          <div class="col-md-12 text-center">
              <div class="footer-copyright">
                  <span>&copy; 2024. All Rights Reserved.</span>
              </div>
          </div>
      </div>
  </div>
</footer>

</body>
</html>
