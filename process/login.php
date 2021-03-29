<?php
	//======+++++++ 100 means sussessful login ++++++===
    //======+++++++ 200 Invalid credential to login ++++++===
    //======+++++++ 300 empty field to login ++++++===
	session_start();
    session_destroy();
	include("../include/connection.php");
	
    if(isset($_POST['username'])){
    	$username = mysqli_real_escape_string($conn, $_POST['username']);
    }else{
    	$username = '';
    }

    if(isset($_POST['password'])){
    	$password = mysqli_real_escape_string($conn,trim(MD5($_POST['password'])));
    }else{
    	$password = '';
    }
    if(!empty($username) && !empty($password)){
        
        $select_crediential = mysqli_query($conn, "SELECT * FROM tbl_Users u,  tbl_working_station ws WHERE u.Workstation_ID=ws.Workstation_ID AND username='$username' AND u.Password='$password'") or die(mysqli_error($conn));
        if(mysqli_num_rows($select_crediential)>0){
            $row = mysqli_fetch_assoc($select_crediential);
            @session_start();	    
            $_SESSION['userinfo']=$row;
		    $Workstation_ID = $_SESSION['userinfo']['Workstation_ID'];
                echo "100";       
        }else{
            echo "200";
        }
    }else{
        echo "300";
    }

   