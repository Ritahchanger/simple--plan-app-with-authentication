document.getElementById("login_form").onsubmit=(e)=>{
    const email=document.getElementById("email").value;
    const password=document.getElementById("password").value;
    const password_error=document.getElementById("password_error");
    const email_error=document.getElementById("email_error");

    email_validator(email,email_error);password_validator(password,password_error);

    if(!email_validator(email,email_error) && !password_validator(password,password_error)){
     e.preventDefault()
    }else{
        return;
    }

}
const email_validator=(email,inputError)=>{
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if((email.trim()).length===0){
        inputError.style.display="block";
        inputError.innerText="Please fill this field";
        return false;
    }else if(!emailRegex.test(email)){
        inputError.style.display="block";
        inputError.innerText="Type valid email address";
        return false;
    }else{
        inputError.style.display="none";
        inputError.innerText=" ";
        return true;
    }
}
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