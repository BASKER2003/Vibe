<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="stylehf.css">
    
    <title>Job Search</title>
    <style>
        /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    
    background-image: url(b1.jpg);
    background-repeat:no-repeat;
    
    padding: 20px;
}

h1,p {
    text-align: center;
    color:white;
}

/* Container Styles */
.container {
    max-width: 800px;
    margin: 0 auto;
}

/* Form Styles */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 25px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 800px;
    margin-left: 300px;
    
}

.fc{
    display: flex;
    flex-direction: row;
    justify-content: space-between;  
}
label {
    font-weight: bold;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

.apply-button{
    color:green;
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;


}

/* Loading Styles */
.loading {
    display: none; /* Initially hide the loading spinner */
    margin-top: 80px;
    margin-left:2%;
}


/* Job Listings Styles */
#jobListings {
    margin-top: 20px;
    color:white;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    
}

.table th {
    background-color: #f2f2f2;
    text-align: left;
    color:black;
}

/* Pagination Styles */
/* Pagination Styles */
.pagination {
    margin-top: 20px;
    margin-left:25%;
}

.pagination a {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px; /* Adjusted margin for spacing */
    gap:30px 30px;
}

.pagination a.active {
    background-color: #4caf50;
    color: white;
    border: 1px solid #4caf50;
}

.pagination a.hover {
    background-color: greenyellow;
    color: white;
    border: 1px solid #4caf50;
}


button{
    justify-content: center;
}

.fp{
  margin-top:90px;
}


/* ------------------------------------------------------------------------------------------ */

.spinnerContainer {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.spinner {
  width: 56px;
  height: 56px;
  display: grid;
  border: 4px solid #0000;
  border-radius: 50%;
  border-right-color: #299fff;
  animation: tri-spinner 1s infinite linear;
}

.spinner::before,
.spinner::after {
  content: "";
  grid-area: 1/1;
  margin: 2px;
  border: inherit;
  border-radius: 50%;
  animation: tri-spinner 2s infinite;
}

.spinner::after {
  margin: 8px;
  animation-duration: 3s;
}

@keyframes tri-spinner {
  100% {
    transform: rotate(1turn);
  }
}

.loader {
  color: #4a4a4a;
  font-family: "Poppins",sans-serif;
  font-weight: 500;
  font-size: 25px;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
  height: 40px;
  padding: 10px 10px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  border-radius: 8px;
}

.words {
  overflow: hidden;
}

.word {
  display: block;
  height: 100%;
  padding-left: 6px;
  color: #299fff;
  animation: cycle-words 5s infinite;
}

@keyframes cycle-words {
  10% {
    -webkit-transform: translateY(-105%);
    transform: translateY(-105%);
  }

  25% {
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
  }

  35% {
    -webkit-transform: translateY(-205%);
    transform: translateY(-205%);
  }

  50% {
    -webkit-transform: translateY(-200%);
    transform: translateY(-200%);
  }

  60% {
    -webkit-transform: translateY(-305%);
    transform: translateY(-305%);
  }

  75% {
    -webkit-transform: translateY(-300%);
    transform: translateY(-300%);
  }

  85% {
    -webkit-transform: translateY(-405%);
    transform: translateY(-405%);
  }

  100% {
    -webkit-transform: translateY(-400%);
    transform: translateY(-400%);
  }
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
                    <a href="//login.php">Resume Analyzer</a>
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
    
<div class="fp">
<h1>Job Search</h1><br><br>
<p>Please enter your search criteria below:</p>

<form id="jobSearchForm">
    <div class="fc">
    <div>
        <label for="title">Job Title or Company Name:</label><br>
        <input type="text" id="title" name="title" required><br>
    </div>
    <div>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location"> <br>
    </div>
    <div class="select">
        <label for="country">Country:</label><br>
        <select id="country" name="country" required>
            <option value="gb">United Kingdom (Great Britain)</option>
            <option value="us">United States</option>
            <option value="at">Austria</option>
            <option value="au">Australia</option>
            <option value="be">Belgium</option>
            <option value="br">Brazil</option>
            <option value="ca">Canada</option>
            <option value="ch">Switzerland</option>
            <option value="de">Germany</option>
            <option value="es">Spain</option>
            <option value="fr">France</option>
            <option value="in">India</option>
            <option value="it">Italy</option>
            <option value="mx">Mexico</option>
            <option value="nl">Netherlands</option>
            <option value="nz">New Zealand</option>
            <option value="pl">Poland</option>
            <option value="sg">Singapore</option>
            <option value="za">South Africa</option>
        </select>
    </div>
</div>
<br>
    <button type="submit">Search</button>
</form>
</div>
<div class="loading">
<div class="spinnerContainer">
  <div class="spinner"></div>
  <div class="loader">
    <p>loading</p>
    <div class="words">
      <span class="word">Jobs</span>
      <span class="word">Jobs</span>
      <span class="word">Jobs</span>
      <span class="word">Jobs</span>
      <span class="word">Jobs</span>
    </div>
  </div>
</div>
</div>

<div id="jobListings" class="box"></div>



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
   

<script>
    document.getElementById('jobSearchForm').addEventListener('submit', function (event) {
    event.preventDefault();
    var form = this;
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();

    // Show loading spinner
    document.querySelector('.loading').style.display = 'block'; // Show the loading spinner

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Hide loading spinner when the search results are loaded
            document.querySelector('.loading').style.display = 'none'; // Hide the loading spinner
            if (xhr.status === 200) {
                document.getElementById('jobListings').innerHTML = xhr.responseText;
            } else {
                alert('Error: ' + xhr.status);
            }
        }
    };

    xhr.open('GET', 'search.php?' + new URLSearchParams(formData).toString(), true);
    xhr.send();
});

</script>

</body>
</html>
