<?php 

function redirect($urlname){
    header("Location:{$urlname}");
}

function insert_image(){
    if(isset($_POST["submit_file"])){
        $file=$_FILES["file"];
        $original_file_name=$file["name"];
        $original_file_Size=$file["size"];
        $original_file_type=$file["type"];
        $file_temporary_name=$file["tmp_name"];
        $file_error=$file["error"];

        $fileNameExt=explode(".",$original_file_name);
        $fileActualExt=strtolower(end($fileNameExt));

        $filesExpected=array("jpg","jpeg","png");
        if(in_array($fileActualExt,$filesExpected)){
            if($file_error==0){
                if($original_file_Size>2000000){
                    echo "The file you just aploaded its too big";
                }else{
                    $file_new_name=uniqid("",true).".".$fileActualExt;
                    $fileDestination="uploads/".$file_new_name;
                    move_uploaded_file($file_temporary_name,$file)
                }
            }
        }

    }

}

?>