<?php

    include('../include/connection.php');
    include('handlefunctions.php');
    if(isset($_POST['loadregisterdoctorform'])){
        ?>
         <fieldset class='content'>
            <legend align='center'>Register Doctor Info</legend>
            <div class="ui form">
                <div class="two fields">
                    <div class="field">
                        <label>Name Of Doctor</label>
                        <input type="text" placeholder="Name Of Doctor" id='name_of_Doctor'>
                    </div>
                    <div class="field">
                        <label>Title</label>
                        <input type="text" placeholder="Title" id='Title'>
                    </div>

                </div>
                <div class="one field">
                    <div class="field">
                        <label>Description</label>
                        <input   rows="1" id='Doctor_description' >
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label>Speciality</label>
                        <input type="text" placeholder="Speciality" id="Speciality">
                    </div>
                    <div class="field">
                        <label>Education</label>
                        <input type="text" placeholder="Education" id="Education">
                    </div>
                    <div class="field">
                        <label>Experience</label>
                        <input type="text" placeholder="Experience" id='Experience'>
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label>Address</label>
                        <input type="text" placeholder="Address" id="Address">
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <input type="text" placeholder="Phone" id="Phone_number">
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="text" placeholder="Email" id='Email'>
                    </div>
                </div>
                
                <div class="two fields">
                    <div class="field">
                    <label>SELECT PHOTO</label>
                        <input type="file" id='imageupload' onchange = 'readImage(this)'>
                    </div>
                    <div class="field">
                        <img src = 'images/index.jpeg' id = 'Patient_Picture' name = 'Patient_Picture' id = 'Patient_Picture' width = 50% height = 50%>

                    </div>
                </div>
                <div class="one field" >
                    
                </div>
                <div class="one fields">
                    <div class="right field">
                        <div class="ui buttons">
                            <button class="ui button">Cancel</button>
                            <div class="or"></div>
                            <button class="ui positive button" onclick="addDoctorInfo()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <?php
    }

    if(isset($_POST['savedoctorprfile'])){
        $Employee_Name = mysqli_real_escape_string($conn, $_POST['name_of_Doctor']);
        $Title = mysqli_real_escape_string($conn, $_POST['Title']);
        $responce_image_path = mysqli_real_escape_string($conn, $_POST['responce_image_path']);
        $Doctor_description = mysqli_real_escape_string($conn, $_POST['Doctor_description']);
        $Speciality = mysqli_real_escape_string($conn, $_POST['Speciality']);
        $Education = mysqli_real_escape_string($conn, $_POST['Education']);
        $Experience = mysqli_real_escape_string($conn, $_POST['Experience']);

        $Address = mysqli_real_escape_string($conn, $_POST['Address']);
        $Phone_number = mysqli_real_escape_string($conn, $_POST['Phone_number']);
        $Email = mysqli_real_escape_string($conn, $_POST['Email']);
        $User_ID = $_SESSION['userinfo']['User_ID'];

        $query1 = mysqli_query($conn, "INSERT INTO tbl_employee (Employee_Name, Title,Doctor_description, Speciality, Education, Experience, Address, Phone_number, Email, responce_image_path) VALUES('$Employee_Name', '$Title','$Doctor_description', '$Speciality', '$Education', '$Experience', '$Address', '$Phone_number', '$Email', '$responce_image_path')") or die(mysqli_error($conn));
        if($query1){
            echo "added";
        }else{
            echo "Failed to add";
        }
    }

    if(isset($_POST['doctorsregister'])){
        $Employee_ID ="all";
        $doctor_status="all";
        $datarequest = array(
            "Employee_ID"=> $Employee_ID,
            "doctor_status"=>$doctor_status
        );
        $dataloaded = json_decode(getdoctorts(json_encode($datarequest)) , true);
        $num=1;
        foreach($dataloaded as $data){
            $Employee_Name = $data['Employee_Name'];
            $Doctor_description = $data['Doctor_description'];
            $Employee_ID = $data['Employee_ID'];
            $Title = $data['Title'];
            echo "<tr>
                <td>{$num}</td>
                <td>{$Employee_Name}</td>                
                <td>{$Title}</td>
                <td>{$Doctor_description}</td>
                <td>";?>
                        <div class="ui small basic icon buttons">
                        <button class="ui blue button" onclick="previewdata(<?php echo $Employee_ID ?>)"><i class="eye icon"></i></button>
                        <button class="ui  button "><i class="pencil icon"></i></button>
                        <button class="ui positive button" ><i class="upload icon"></i></button>
                        <button class="ui negative button"><i class="ban icon"></i></button>
                        </div>
           <?php echo "   </td>
            </tr>";
            $num++;
        }
    }

    if(isset($_POST['doctorsPreview'])){
        $Employee_ID =$_POST['Employee_ID'];
        $doctor_status="all";
        $datarequest = array(
            "Employee_ID"=> $Employee_ID,
            "doctor_status"=>$doctor_status
        );
        $dataloaded = json_decode(getdoctorts(json_encode($datarequest)) , true);
        $Employee_Name = $dataloaded[0]['Employee_Name'];
        $Doctor_description = $dataloaded[0]['Doctor_description'];
        $responce_image_path = $dataloaded[0]['responce_image_path'];
        $Title = $dataloaded[0]['Title'];
        $added_date = $dataloaded[0]['added_date'];
        ?>
        <div class="image content">
            <div class="ui medium image">
                <img src="./images/dept/<?php echo $responce_image_path; ?>">
            </div>
            <div class="description">
                <div class="ui header"><?= $Title.' '.$Employee_Name?></div>
                    <p><?= $Doctor_description; ?></p>
                </div>
            </div>
            <div class="actions">
                <div class="ui black deny button">
                Nope
                </div>
                <div class="ui positive right labeled icon button">
                     Yep, that's me
                <i class="checkmark icon"></i>
                </div>
            </div>
        </div>
        <?php
    }