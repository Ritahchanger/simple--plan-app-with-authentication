const auto_logout = () => {

    let inactivityTime = 60 * 1000 * 5;

    let timer;

    let pageLoaded = false;

    const resetTimer=()=>{
        if(pageLoaded){
            timer=setTimeout(logoutUser,inactivityTime);
        }else{
            pageLoaded=true;
        }
    }
    const logoutUser=()=>{

        window.location.href="../logout.php";

    }

    document.addEventListener("mousemove",resetTimer);
    document.addEventListener("keypress",resetTimer)
}
auto_logout();