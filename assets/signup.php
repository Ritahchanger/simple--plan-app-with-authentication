<?php include("../layouts/header.php"); ?>
<div class="container">
    <a href="#" class="forms_title">SIGN UP</a>
<hr>
    <?php
    
    if (isset($_POST["submit"])) {
        include("../dbconnect.php");
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        mysqli_select_db($conn, "plan_db");
        $tableQuery = "CREATE TABLE IF NOT EXISTS users(
         userid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
         fname varchar(200) not null,
         lname varchar(200) not null,
         phone varchar(200) not null,
         email varchar(200) not null,
         passwd varchar(200) not null,
         dateInserted DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
         )";
        mysqli_query($conn, $tableQuery);
        
        $sql="SELECT email FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
    
            echo "<p style='text-align:start;color:red;'>The email is already used, enter your details again! </p>";

            sleep(120);
            
            echo "\033[2J";
    
        }else{
    
            $stored_password=password_hash($password,PASSWORD_BCRYPT);
    
            $insert_into_table="INSERT INTO users(fname,lname,phone,email,passwd) VALUES('$fname','$lname','$phone','$email','$stored_password')";
    
            mysqli_query($conn,$insert_into_table);

            require("../functions.php");

            redirect("signup.php");
           
        }
    
    }
    
    
    
    ?>

    <form action="signup.php" class="form sign-form" id="sign-form" method="POST" autocomplete="off" novalidate>

        <div class="row">

            <div class="input_box">

                <input type="text" name="fname" id="fname" class="fname" placeholder="Enter your first name">
                <span class="error" id="fname_error">Fill this field</span>
            </div>

            <div class="input_box">

                <input type="text" name="lname" id="lname" class="lname" placeholder="Enter your last name">
                <span class="error" id="lname_error">Fill this field</span>

            </div>

        </div>

        <div class="input_box">

            <input type="text" name="phone" id="phone" class="phone" placeholder="Enter your phone number(+254)">
            <span class="error" id="phone_error">Fill this field</span>

        </div>

        <div class="input_box">

            <input type="email" name="email" id="email" class="email" placeholder="Enter your email">
            <span class="error" id="email_error">Fill this field</span>

        </div>

        <div class="input_box">

            <input type="password" name="password" id="password" class="password" placeholder="Enter your password">
            <span class="error" id="password_error">Fill this field</span>

        </div>
        <div class="input_box">

            <input type="password" name="confirm_password" id="confirm_password" class="password" placeholder="Confirm your password">
            <span class="error" id="confirm_password_error">Fill this field</span>

        </div>
        <input type="submit" value="SIGN UP" name="submit" class="submit_btn" id="signup_btn">

        <span class="forms_linker"><a href="#">Have an account</a>-<a href="login.php">Login</a></span>

    </form>


</div>
<script src="../design/authenticate.js"></script>
<?php include("../layouts/footer.php"); ?>