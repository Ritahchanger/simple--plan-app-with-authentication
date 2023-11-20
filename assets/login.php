<?php include("../layouts/header.php"); ?>
<div class="container">

    <a href="#" class="forms_title">LOGIN</a>

    <?php
  
    if(isset($_POST["login"])){

        include("../dbconnect.php");

        session_start();

        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="SELECT * FROM `users` WHERE email='$email'";

        mysqli_select_db($conn,"plan_db");

        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)===1){

            $row=mysqli_fetch_assoc($result);

            $hashed_password=$row["passwd"];

            if(password_verify($password,$hashed_password)){

                $user_id=$row["userid"];
                $user_fname=$row["fname"];
                $user_lname=$row["lname"];
                $phone=$row["phone"];
                $email_new=$row["email"];
                $passwd=$row["passwd"];
                $date_inserted=$row["dateinserted"];

                $_SESSION['id']=$user_id;
                $_SESSION['fname']=$user_fname;
                $_SESSION['lname']=$user_lname;
                $_SESSION['phone']=$phone;
                $_SESSION['email']=$email_new;
                $_SESSION['password']=$passwd;
                $_SESSION["date_entered"]=$date_inserted;


                require("../functions.php");

                redirect("plan.php");
            }
            else{

                echo "<p>Wrong credentials</p>";

            }

        }



    }

    
    ?>

    <form action="login.php" method="POST" class="form login-form" id="login_form" autocomplete="off" novalidate>

        <div class="input_box">

            <input type="email" name="email" id="email" class="email" placeholder="Enter your email"value="<?php echo isset($_POST["email"]) ? htmlspecialchars($_POST["email"]): ' '; ?>">
            <span class="error" id="email_error">Fill this field</span>
        </div>
        <div class="input_box">

            <input type="password" name="password" id="password" class="password" placeholder="Enter your password">
            <span class="error" id="password_error">Fill this field</span>
        </div>
        <input type="submit" value="LOGIN" name="login" class="submit_btn" id="submit_btn" style="Margin-top:2rem;">

        <span class="forms_linker"><a href="#">Forgot password.?</a>-<a href="signup.php">create account</a></span>
       

    </form>


</div>

<script src="../design/login.js"></script>

<?php include("../layouts/footer.php"); ?>