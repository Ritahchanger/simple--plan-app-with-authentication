<?php 
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
    exit;
}
include("../layouts/planheader.php");
?>
<link rel="stylesheet" href="../design/edit.css">
<div class="container">
    <div class="edit_container">
        <form id="edit_form" action="edit_button" method="POST" class="form">

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
                    <input type="password" name="password" id="password">
                    <span class="error" id="password_error" style="color:red;">Fill this field</span>
                </div>
                <div class="input_box">
                    <p class="input_lable">Confirm password</p>
                    <input type="password" name="password" id="confirm_password">
                    <span class="error" id="confirm_password_error" style="color:red;">Fill this Field</span>
                </div>
            </div>



            <div class="row">
                <input type="submit" class="btn cancel" value="CANCEL" id="cancel">
                <input type="submit" class="btn submit" value="SUBMIT" id="submit">
            </div>
        </form>

    </div>
</div>
<script>
    
    const editDocument = document.getElementById("edit_form");
    const cancel_button=document.getElementById("cancel");
    cancel_button.onclick=(e)=>{
        e.preventDefault();
        window.location="plan.php";
    }
    editDocument.addEventListener("submit",(e)=>{

        e.preventDefault();
    const password=document.getElementById("password").value;
    const passsword_error=document.getElementById("password_error");
    const confirm_password=document.getElementById("confirm_password").value;
    const confirm_password_error=document.getElementById("confirm_password_error");
    
    

    password_validator(password,passsword_error);password_validator(confirm_password,confirm_password_error);
    
    const password_validator=(password,inputError)=>{
    const pattern_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;
    if(password.length===0){
        inputError.style.display="block";
        inputError.innerText="Please fill this field";
        return false;
    }else if(!pattern_password.test(password)){
        inputError.style.display="block";
        inputError.innerText="Include uppercase,lowercase and numbers";
        return false;
    }else{
        inputError.style.display="none";
        inputError.innerText=" ";
        return true;
    }
}

    });


</script>
<?php include("../layouts/planfooter.php") ?>