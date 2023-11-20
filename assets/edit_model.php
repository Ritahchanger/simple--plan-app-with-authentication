<?php include("../layouts/planheader.php") ?>
<?php session_start(); ?>
<link rel="stylesheet" href="../design/edit.css">
<div class="container">
    <div class="edit_container">
        <div class="form">

            <div class="input_box">
                <p class="input_lable">First Name</p>
                <input type="text" name="fname" class="form-control" value=" <?php echo $_SESSION["fname"]; ?> ">
            </div>
            <div class="input_box">
                <p class="input_lable">Second Name</p>
                <input type="text" name="lname" class="form-control" value=" <?php echo $_SESSION['lname'] ?> ">
            </div>
            <div class="input_box">
                <p class="input_lable">Phone</p>
                <input type="text" name="phone" class="form-control" value=" <?php echo $_SESSION['phone'] ?> ">
            </div>
            <div class="input_box">
                <p class="input_lable">Email</p>
                <input type="email" name="email" class="form-control" value=" <?php echo $_SESSION['email'] ?> ">
            </div>


            <div class="password_container">
                <div class="input_box">
                    <p class="input_lable">Password</p>
                    <input type="password" name="password">
                </div>
                <div class="input_box">
                    <p class="input_lable">Confirm password</p>
                    <input type="password" name="password">
                </div>
            </div>



            <div class="row">
                <input type="submit" class="btn cancel" value="CANCEL">
                <input type="submit" class="btn submit" value="SUBMIT" id="submit">
            </div>

        </div>

    </div>
</div>
<?php include("../layouts/planfooter.php") ?>