<?php

// if($_POST['uploadconsent']){
    /* Getting file name */
    $filename = $_FILES['file']['name'];

    /* Location */
    $location = "../images/dept/".$filename;
    $uploadOk = 1;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);

    /* Valid Extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf", 'txt', "xls","csv");
    /* Check file extension */
    if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
    $uploadOk = 0;
    }
    if($uploadOk == 0){
        echo 'Nothing';
    }else{
    /* Upload file */
    // echo 1;


    $ext=substr(strrchr($_FILES['file']['name'],'.'),1);
    $picName=date('YmdHis').''.$ext;
    if(move_uploaded_file($_FILES['file']['tmp_name'],"../images/dept/".$picName)){
        echo $picName;
    }else{
        echo 'Nothing';
    }
    }
// }