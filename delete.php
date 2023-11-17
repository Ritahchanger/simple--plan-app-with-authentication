<?php

include("dbconnect.php");

if(isset($_GET["id"])){

    $deleteid=$_GET['id'];

    $sql="DELETE FROM `plan` WHERE  plan_id='$deleteid' ";

    mysqli_select_db($conn,"plan_db");

    $result=mysqli_query($conn,$sql);

    if($result){
       require("functions.php");

       redirect("./assets/plan.php");
    }
    else{

        echo "WE ARE NOT ABLE TO FINISH YOUR REQUESTS";

    }

}


?>