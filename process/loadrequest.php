<?php

    include('../include/connection.php');
    include('handlefunctions.php');
    if(isset($_POST['loadregisterform'])){
        ?>
        <fieldset class='content'>
                    <legend align='center'>Register Department</legend>
                    <div class="ui form">
                        <div class="two fields">
                            <div class="field">
                                <label>Name Of Department</label>
                                <input type="text" placeholder="Name Of Department" id='name_of_department'>
                            </div>
                            <div class="field">
                                <label>Title</label>
                                <input type="text" placeholder="Title" id='Title'>
                            </div>

                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Description</label>
                                <textarea   rows="1" id='Department_description'></textarea>
                            </div>
                            <div class="field">
                                <label>Why choose us</label>
                                <textarea name=""   rows="1" id='whychooseus'></textarea>
                            </div>
                        </div>
                        <div class="three fields">
                            <div class="field">
                                <label>Precaution</label>
                                <input type="text" placeholder="Precaution" id="Precaution">
                            </div>
                            <div class="field">
                                <label>Inteligence</label>
                                <input type="text" placeholder="Inteligence" id="Inteligence">
                            </div>
                            <div class="field">
                                <label>Specialization</label>
                                <input type="text" placeholder="Specialization" id='Specialization'>
                            </div>
                        </div>
                        <div class="one fields">
                            <div class="right field">
                                <div class="ui buttons">
                                    <button class="ui button">Cancel</button>
                                    <div class="or"></div>
                                    <button class="ui positive button" onclick="adddepartament()">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
        <?php
    }
    if(isset($_POST['adddepartament'])){
        $name_of_department = mysqli_real_escape_string($conn, $_POST['name_of_department']);
        $Title = mysqli_real_escape_string($conn, $_POST['Title']);
        $maelezoziadapppppppppp = mysqli_real_escape_string($conn, $_POST['maelezoziadapppppppppp']);
        $whychooseus = mysqli_real_escape_string($conn, $_POST['whychooseus']);
        $Precaution = mysqli_real_escape_string($conn, $_POST['Precaution']);
        $Inteligence = mysqli_real_escape_string($conn, $_POST['Inteligence']);
        $Specialization = mysqli_real_escape_string($conn, $_POST['Specialization']);
        $User_ID = $_SESSION['userinfo']['User_ID'];
        $Workstation_ID = $_SESSION['userinfo']['Workstation_ID'];

        $query1 = mysqli_query($conn, "INSERT INTO tbl_department (name_of_department, Title,Descriptions, whychooseus, Precaution, Inteligence, Specialization) VALUES('$name_of_department', '$Title','$maelezoziadapppppppppp', '$whychooseus', '$Precaution', '$Inteligence', '$Specialization')") or die(mysqli_error($conn));
        if($query1){
            echo "added";
        }else{
            echo "Failed to add";
        }
    }

    if(isset($_POST['loaddepartment'])){
        $Department_ID ="all";
        $status="all";
        $datarequest = array(
            "Department_ID"=> $Department_ID,
            "status"=>$status
        );
        $dataloaded = json_decode(getdepartment(json_encode($datarequest)) , true);
        $num=1;
        foreach($dataloaded as $data){
            $name_of_department = $data['name_of_department'];
            $Descriptions = $data['Descriptions'];
            $Department_ID = $data['Department_ID'];
            $Title = $data['Title'];
            echo "<tr>
                <td>{$num}</td>
                <td>{$name_of_department}</td>                
                <td>{$Title}</td>
                <td>{$Descriptions}</td>
                <td>";?>
                        <div class="ui small basic icon buttons">
                        <button class="ui blue button"><i class="eye icon"></i></button>
                        <button class="ui teal button"><i class="pencil icon"></i></button>
                        <button class="ui positive button" onclick="uploadimegese(<?php echo $Department_ID ?>)"><i class="upload icon"></i></button>
                        <button class="ui negative button"><i class="ban icon"></i></button>
                        </div>
           <?php echo "   </td>
            </tr>";
            $num++;
        }
    }

    if(isset($_POST['imageupload'])){
        $Department_ID = $_POST['Department_ID'];
        $status="all";
        $datarequest = array(
            "Department_ID"=> $Department_ID,
            "status"=>$status
        );
        $dataloaded = json_decode(getdepartment(json_encode($datarequest)) , true);
        ?>

                
        <fieldset class='content'>
            <legend align='center'> <b><?php echo strtoupper($dataloaded[0]['name_of_department']);?></b></legend>
                <div class="ui form">
                <div class="two fields">
                <div class="field">
                    <label>Image Description</label>
                    <input type="text" placeholder="Image Description" id="image_description">
                </div>
                <div class="field">
                    <label>Image Title</label>
                    <input type="text" placeholder="Image Title" id='image_title'>
                </div>
                </div>
                <div class="one fields">
                <div class="field">
                <label>Upload Department Images</label>
                    <input type="file" id='imageupload'>
                </div>
                </div>
                <div class="one fields">
                    <div class="right field">
                        <div class="ui buttons">
                            <button class="ui button">Cancel</button>
                            <div class="or"></div>
                            <button class="ui positive button" onclick="submituploadedimage(<?php echo $Department_ID; ?>)"><i class="upload icon"></i></button>
                          </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <?php
    }

    if(isset($_POST['imageuploaded'])){
        $image_description = $_POST['image_description'];
        $image_title = $_POST['image_title'];
        $responce_image_path = $_POST['responce_image_path'];
        $Department_ID = $_POST['Department_ID'];

        $query2 = mysqli_query($conn, "INSERT INTO tbl_images (image_description, image_title, image_path, Section_ID, section ) VALUES ('$image_description', '$image_title', '$responce_image_path' , '$Department_ID', 'Department')") or die(mysqli_error($conn));
        if($query2){
            echo "Added";
        }else{
            echo "Please try again";
        }
    }

    #================ load image by department ================
    if(isset($_POST['loadimagedepartment'])){
        $imagesection = $_POST['imagesection'];
        $Section_ID = $_POST['Department_ID'];
        $imagedata = array(
            "section"=>$imagesection,
            "Section_ID"=>$Section_ID
        );
        $status="all";
        $datarequest = array(
            "Department_ID"=> $Section_ID,
            "status"=>$status
        );
        $dataloaded = json_decode(getdepartment(json_encode($datarequest)) , true);
        // echo " <fieldset class='content'>
        // <legend align='center'>UPLOAD IMAGE FOR  <b>". strtoupper($dataloaded[0]['name_of_department'])."</b></legend>";
        $getimages = json_decode(getsectionimages(json_encode($imagedata)), true);
        foreach($getimages as $image){
            $image_path = $image['image_path'];
            $image_description = $image['image_description'];
            $Image_ID = $image['Image_ID'];
            $image_title = $image['image_title'];
            $added_date = $image['added_date'];
            
            echo "
                <div class='card'>
                <div class='blurring dimmable image'>
                <div class='ui dimmer'>
                    <div class='content'>
                    <div class='center'>
                        <div class='ui inverted button'>remove</div>
                    </div>
                    </div>
                </div>
                <img src='images/dept/$image_path''>
                </div>
                <div class='content'>
                <a class='header'>$image_title</a>
                <div class='meta'>
                    <span class='date'>Created in $added_date</span>
                </div>
                </div>
                <div class='extra content'>
                <a>
                    <i class='users icon'></i>
                    $image_description
                </a>
                </div>
            </div>
            ";
        }
        // echo "</fieldset>";
    }

    
?>