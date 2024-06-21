<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "*Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ? AND email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_email);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "*This user is already available.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "*Please enter a email";     
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "*Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "*Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "*Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "*Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email , password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email ,$param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>

      body{
        background-image:url(img/r3.jpg); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
      }
      
      .error{
        color: red;
      }

        .singup {
  color: white;
  text-transform: uppercase;
  letter-spacing: 2px;
  display: block;
  font-weight: bold;
  font-size: x-large;
  margin-top: 1.5em;
}

.card {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 150px;
  width: 350px;
  flex-direction: column;
  gap: 35px;
  border-radius: 15px;
  /* background: ; */
  /* box-shadow: 16px 16px 32px #c8c8c8,
        -16px -16px 32px #fefefe; */
  border-radius: 8px white;
  padding: 10px;
  
}

.inputBox,
.inputBox1 {
  position: relative;
  width: 250px;
}

.inputBox input,
.inputBox1 input {
  width: 100%;
  padding: 10px;
  outline: none;
  border: none;
  color: white;
  font-size: 1em;
  background: transparent;
  border-left: 2px solid white;
  border-bottom: 2px solid white;
  transition: 0.1s;
  border-bottom-left-radius: 8px;
}

.inputBox span,
.inputBox1 span {
  margin-top: 5px;
  position: absolute;
  left: 0;
  transform: translateY(-4px);
  margin-left: 10px;
  padding: 10px;
  pointer-events: none;
  font-size: 12px;
  color: white;
  text-transform: uppercase;
  transition: 0.5s;
  letter-spacing: 3px;
  border-radius: 8px;
}

.inputBox input:valid~span,
.inputBox input:focus~span {
  transform: translateX(113px) translateY(-15px);
  font-size: 0.8em;
  padding: 5px 10px;
  background: #000;
  letter-spacing: 0.2em;
  color: #fff;
  border: 2px;
}

.inputBox1 input:valid~span,
.inputBox1 input:focus~span {
  transform: translateX(156px) translateY(-15px);
  font-size: 0.8em;
  padding: 5px 10px;
  background: #000;
  letter-spacing: 0.2em;
  color: #fff;
  border: 2px;
}

.inputBox input:valid,
.inputBox input:focus,
.inputBox1 input:valid,
.inputBox1 input:focus {
  border: 2px solid #000;
  border-radius: 8px;
}

.enter {
  height: 45px;
  width: 100px;
  border-radius: 5px;
  border: 2px solid #000;
  cursor: pointer;
  background-color: transparent;
  transition: 0.5s;
  text-transform: uppercase;
  font-size: 10px;
  letter-spacing: 2px;
  margin-bottom: 3em;
  color:white;  
}

.enter:hover {
  background-color: rgb(0, 0, 0);
  color: white;
}

.container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80%;
            padding: 20px;
            padding-top: 40px;
            padding-left: 400px;
            
        }

        @media screen and (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .card {
                width: 80%;
            }
        }

        @media screen and (max-width: 1024px) {
            body {
                background-image: url(r3.jpg); 
                background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
            }
        }

        
        @media screen and (max-width: 768px) {
            body {
                background-image: url(r3.jpg); 
                background-size: cover; 
            background-repeat: no-repeat; 
            background-attachment: fixed;
            }
        }
    </style>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
  <div class="container">
      <div class="card">
          <a class="singup">Sign Up</a>
          <div class="inputBox">
              <input type="text" name="username" required="required" value="<?php echo $username; ?>">
              <span>  Username</span>
          </div>
          <span class="error"><?php echo $username_err; ?></span>
          <div class="inputBox">
              <input type="text" name="email" required="required" value="<?php echo $email; ?>">
              <span>  Email</span>
          </div>
          <span class="error"><?php echo $email_err; ?></span>
          <div class="inputBox">
              <input type="password" name="password" id="password" required="required" value="<?php echo $password; ?>">
              <span>  Password</span>
          </div>
          <span class="error"><?php echo $password_err; ?></span>
          <div class="inputBox">
              <input type="password" name="confirm_password" id="confirm_password" required="required" value="<?php echo $confirm_password; ?>">
              <span>  Confirm Password</span>
          </div>
          <span class="error"><?php echo $confirm_password_err; ?></span>
          <br><br>
          
          <button class="enter" id="submit_button">Submit</button>
      </div>
  </div>
    </form>
  
  </body>
  </html>