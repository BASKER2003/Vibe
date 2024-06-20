<?php session_start() ?>

<html>
<head>
<link rel="stylesheet" href="stylehf.css">
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
    padding: 15px;
    border-bottom: 1px solid #ddd;
    color:white;
    
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
    </header><br><br>
    
<?php



$apiKey = '4e3bdb80e0f9306d02cd0241b830e556';
$appId = 'deacfef9';

$title = $_GET['title'];
$location = $_GET['location'];
$country = $_GET['country'];
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the page number from the query string, default to 1 if not provided

$url = "https://api.adzuna.com/v1/api/jobs/{$country}/search/{$page}?app_id={$appId}&app_key={$apiKey}&what=" . urlencode($title);

if (!empty($location)) {
    $url .= "&where=" . urlencode($location);
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error making API request: ' . curl_error($ch);
    exit();
}

$response = json_decode($result, true);
echo "<br> <br>";
if (isset($response['results'])) {
    echo "<div class='box'>";
    echo "<table class='table is-striped is-narrow is-hoverable is-fullwidth'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Job Title</th>";
    echo "<th>Company Name</th>";
    echo "<th>Location</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($response['results'] as $job) {
        echo "<tr>";
        echo "<td>{$job['title']}</td>";
        echo "<td>{$job['company']['display_name']}</td>";
        echo "<td>{$job['location']['display_name']}</td>";
        if (isset($job['redirect_url'])) {
            echo "<td><a href='{$job['redirect_url']}' class='apply-button' target='_blank'>Apply</a></td>";
        } else {
            echo "<td>No direct apply link provided. Please check with the employer for application details.</td>";
        }
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";

    // Pagination links
    // Pagination links
    if (isset($response['count']) && $response['count'] > 0) {
        $totalPages = ceil($response['count'] / 10); // Assuming 10 results per page
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        echo "<br><br><div class='pagination'>";

        // Previous Page link
        if ($currentPage > 1) {
            echo "<a href='search.php?title=" . urlencode($title) . "&location=" . urlencode($location) . "&country={$country}&page=" . ($currentPage - 1) . "'>Back</a>";
        }

        // Display page numbers
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $startPage + 9);

        for ($i = $startPage; $i <= $endPage; $i++) {
            if ($i == $currentPage) {
                echo "<a href='search.php?title=" . urlencode($title) . "&location=" . urlencode($location) . "&country={$country}&page={$i}' class='active'>$i</a>";
            } else {
                echo "<a href='search.php?title=" . urlencode($title) . "&location=" . urlencode($location) . "&country={$country}&page={$i}'>$i</a>";
            }
        }

        // Next Page link
        if ($currentPage < $totalPages) {
            echo "<a href='search.php?title=" . urlencode($title) . "&location=" . urlencode($location) . "&country={$country}&page=" . ($currentPage + 1) . "'>Next</a>";
        }

        echo "</div>";
    } else {
        echo '<p>No jobs found.</p>';
    }
}


curl_close($ch);
?>
<br><br><br><br>
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

</html>
