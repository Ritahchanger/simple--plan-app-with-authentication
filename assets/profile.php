<?php include("../layouts/planheader.php") ?>

<?php session_start(); ?>

    <div class="profile_wrapper">

         <div class="container">

         <div class="passport_image">
            <img src="../profile_images/suzzie.jpg" alt="" class="wrapper">
         </div>

         <div class="details">

          
         <div class="profile_detail">
            <div>
                <a href="#" class="person_name detail">NAME</a>
            </div>
            <div>
                <a href="#" class="person_name detail"><?php echo $_SESSION["fname"] . $_SESSION["lname"]; ?></a>
            </div>
         </div>
              
         <div class="profile_detail">
            <div>
                <a href="#" class="person_name detail">Email</a>
            </div>
            <div>
                <a href="#" class="person_name detail"><?php echo $_SESSION["email"];?></a>
            </div>
         </div>

              
         <div class="profile_detail">
            <div>
                <a href="#" class="person_name detail">Phone No</a>
            </div>
            <div>
                <a href="#" class="person_name detail"><?php echo $_SESSION["phone"];?></a>
            </div>
         </div>
         </div>

         <div>
            <a href="edit_model.php" class="profile_btn">EDIT PROFILE</a>
         </div>

         </div>
       
    </div>

<?php include("../layouts/planfooter.php") ?>